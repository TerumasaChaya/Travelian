<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use App\Group;
use App\GroupMember;
use App\Travel;
use App\TravelDetail;
use Auth;
use Response;

class GroupController extends Controller
{

    public function index()
    {

        $groupMembers = GroupMember::where('user_id', Auth::user()->id)->get();

        //view に 値を渡す
        return view("user.groups.list")->with('groupMembers', $groupMembers);
    }

    public function detail($id)
    {

        $travel = Travel::where('id', $id)->first();

        $check = GroupMember::where('user_id', Auth::user()->id)->where('group_id', $travel->group_id)->first();

        if ($check->id == null) {
            return redirect()->back();
        }

        $travelDetails = TravelDetail::where('travel_id', $travel->id)->get();

        $group = Group::where('id',$travel->group_id)->first();

        $leader = GroupMember::where('group_id',$travel->group_id)->where('leaderFlg',true)->first();

        $leaderCheck = false;

        if($leader->leaderFlg){
            $leaderCheck = true;
        }

        $details = [];

        foreach ($travelDetails as $detail) {
            $details[] =
                [
                    'id' => $detail->id,
                    'name' => $detail->photo,
                    'lat' => $detail->latitude,
                    'lng' => $detail->longitude,
                    'icon' => $detail->photo
                ];
        }

        return view('user.groups.detail')
            ->with('details', $details)
            ->with('travel', $travel)
            ->with('group',$group)
            ->with('leaderCheck',$leaderCheck);
    }
}