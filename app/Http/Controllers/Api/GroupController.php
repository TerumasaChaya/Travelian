<?php
namespace App\Http\Controllers\Api;

use App\GroupMember;
use App\Http\Controllers\Controller;
use App\User;
use App\Travel;
use App\Group;
use Auth;
use Hash;
use Response;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function groupList()
    {

        $groups = Group::where('deadLineFlg',true)->get();

        $response = [];

        foreach ($groups as $group) {

            foreach ($group->groupMembers as $item){

                if($item->leaderFlg){
                    $response[] = [
                        'group_id' => $item->groups->id,
                        'group_name' => $item->groups->name,
                        'leader_name' => $item->users->name
                    ];
                }

            }
        }

        return Response::json(
            array(
                'status' => 'Success',
                'list'   => $response
            )
        );
    }

    public function makeGroup(Request $request){

        $json = base64_decode(str_replace(' ', '+', $request->input('json')));

        $json = json_decode($json);

        $groupName = $json->group_name;
        $user = User::where('id',$json->user_id)->first();

        //グループ作成
        $newGroup = new Group;

        $newGroup->name = $groupName;
        $newGroup->deadLineFlg = true;

        $newGroup->save();

        //グループメンバー登録
        $newGroupMembers = new GroupMember;

        $newGroupMembers->user_id = $user->id;
        $newGroupMembers->group_id = $newGroup->id;
        $newGroupMembers->leaderFlg = true;
        $newGroupMembers->requestFlg = false;

        $newGroupMembers->save();

        return Response::json(
            array(
                'status' => 'Success',
                'group'   => $newGroup
            )
        );

    }

    public function request(Request $request){

        $json = base64_decode(str_replace(' ', '+', $request->input('json')));

        $json = json_decode($json);

        $groupId = $json->group_id;
        $userId = $json->user_id;

        //グループメンバー登録
        $newGroupMembers = new GroupMember;

        $newGroupMembers->user_id = $userId;
        $newGroupMembers->group_id = $groupId;
        $newGroupMembers->leaderFlg = false;
        $newGroupMembers->requestFlg = true;

        $newGroupMembers->save();

        return Response::json(
            array(
                'status' => 'Success',
            )
        );

    }

    public function requestCancel(Request $request){

        $json = base64_decode(str_replace(' ', '+', $request->input('json')));

        $json = json_decode($json);

        $groupId = $json->group_id;
        $userId = $json->user_id;

        //グループメンバー削除
        GroupMember::where('user_id',$userId)->where('group_id',$groupId)->delete();

        return Response::json(
            array(
                'status' => 'Success',
            )
        );

    }

    public function memberList(Request $request){

        $json = base64_decode(str_replace(' ', '+', $request->input('json')));

        $json = json_decode($json);

        $groupId = $json->group_id;

        //未承認グループメンバー
        $requestMember = GroupMember::where('group_id',$groupId)->where('requestFlg',true)->get();

        //承認済みグループメンバー
        $acceptMember = GroupMember::where('group_id',$groupId)->where('requestFlg',false)->get();

        return Response::json(
            array(
                'status' => 'Success',
                'request_member' => $requestMember,
                'accept_member' => $acceptMember
            )
        );

    }

}