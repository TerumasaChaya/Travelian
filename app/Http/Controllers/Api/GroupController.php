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
        $requestMembers = GroupMember::where('group_id',$groupId)->where('requestFlg',true)->get();
        $requestMember = [];

        foreach ($requestMembers as $item){
            $requestMember[] = [
                'user_id' => $item->users->id,
                'user_name' => $item->users->name,
                'leaderFlg' => $item->leaderFlg,
                'requestFlg' => $item->requestFlg
            ];
        }

        //承認済みグループメンバー
        $acceptMembers = GroupMember::where('group_id',$groupId)->where('requestFlg',false)->get();
        $acceptMember = [];

        foreach ($acceptMembers as $item){
            $acceptMember[] = [
                'user_id' => $item->users->id,
                'user_name' => $item->users->name,
                'leaderFlg' => $item->leaderFlg,
                'requestFlg' => $item->requestFlg
            ];
        }

        return Response::json(
            array(
                'status' => 'Success',
                'request_member' => $requestMember,
                'accept_member' => $acceptMember
            )
        );

    }

    public function close(Request $request){

        $json = base64_decode(str_replace(' ', '+', $request->input('json')));

        $json = json_decode($json);

        $groupId = $json->group_id;

        $group = Group::where('id',$groupId)->first();

        $group->deadLineFlg = false;

        $group->save();

        return Response::json(
            array(
                'status' => 'Success',
            )
        );

    }

    public function check(Request $request){

        $json = base64_decode(str_replace(' ', '+', $request->input('json')));

        $json = json_decode($json);

        $groupId = $json->group_id;
        $userId = $json->user_id;

        //グループメンバー
        $groupMember =  GroupMember::where('user_id',$userId)->where('group_id',$groupId)->first();

        //グループ
        $group = Group::where('id',$groupId)->first();

        $message = "";

        //締め切れてなければTrue
        if($group->deadLineFlg == true){

            //承認されてなければTrue
            if($groupMember->requestFlg == true){
                $message = "unApp";
            }else{
                $message = "app";
            }

        }else{

            //承認されてなければTrue
            if($groupMember->requestFlg == true){
                $message = "closeUnApp";
            }else{
                $message = "closeApp";
            }

        }

        return Response::json(
            array(
                'status' => 'Success',
                'message' => $message
            )
        );

    }

    public function memberAccept(Request $request){

        $json = base64_decode(str_replace(' ', '+', $request->input('json')));

        $json = json_decode($json);

        $groupId = $json->group_id;
        $userId = $json->user_id;

        //グループメンバー
        $groupMember =  GroupMember::where('user_id',$userId)->where('group_id',$groupId)->first();

        $groupMember->requestFlg = false;

        $groupMember->save();

        return Response::json(
            array(
                'status' => 'Success',
            )
        );

    }

    public function memberDenial(Request $request){

        $json = base64_decode(str_replace(' ', '+', $request->input('json')));

        $json = json_decode($json);

        $groupId = $json->group_id;
        $userId = $json->user_id;

        //グループメンバー
        $groupMember =  GroupMember::where('user_id',$userId)->where('group_id',$groupId)->first();

        $groupMember->requestFlg = true;

        $groupMember->save();

        return Response::json(
            array(
                'status' => 'Success',
            )
        );

    }

}