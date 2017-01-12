<?php
namespace App\Http\Controllers\Api;

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

}