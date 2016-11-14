<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Travel;
use App\Http\Controllers\Controller;
use App\TravelDetail;
use App\User;

class TravelController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function privateIndex()
    {
        $travels = Travel::where('releaseFlg',false)->orderBy('created_at','desc')->paginate(10);

        return view('admin.travels.private')->with('travels',$travels);
    }

    public function publicIndex()
    {
        $travels = Travel::where('releaseFlg',true)->orderBy('created_at','desc')->paginate(10);

        return view('admin.travels.public')->with('travels',$travels);
    }

    public function privateDetail($id){

        $travelDetails = TravelDetail::where('travel_id',$id)->get();

        $details = [];

        foreach ($travelDetails as $detail){
            $details[] =
                [
                    'name' => $detail->photo,
                    'lat'  => $detail->latitude,
		            'lng'  => $detail->longitude,
		            'icon' => $detail->photo
                ];
        }

        return view('admin.travels.private-detail')->with('details',$details);

    }

}
