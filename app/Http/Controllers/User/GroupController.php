<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use App\Group;
use App\GroupMember;
use Auth;
use Response;

class GroupController extends Controller
{

    public function index()
    {

        $groupMembers = GroupMember::where('user_id',Auth::user()->id)->get();
        
        //view に 値を渡す
        return view("user.group")->with('groupMembers',$groupMembers);
    }

}