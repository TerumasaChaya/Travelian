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

}