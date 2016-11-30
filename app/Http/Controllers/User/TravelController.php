<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use App\Travel;
use App\TravelDetail;
use App\Http\Requests\UserTravelPostRequest;
use Auth;
use Response;
use Illuminate\Http\Request;

class TravelController extends Controller
{

    public function index()
    {

        $releaseTravels = Travel::where('user_id',Auth::user()->id)->where('releaseFlg',true)->paginate(6);

        $hideTravels = Travel::where('user_id',Auth::user()->id)->where('releaseFlg',false)->paginate(6);

        //view に 値を渡す
        return view("user.travels.travel")->with('releaseTravels',$releaseTravels)->with('hideTravels',$hideTravels);
    }

    public function detail($id){

        $travelDetails = TravelDetail::where('travel_id',$id)->get();

        $travel = Travel::where('id',$travelDetails[0]->travel_id)->first();

        $details = [];

        foreach ($travelDetails as $detail){
            $details[] =
                [
                    'id'   => $detail->id,
                    'name' => $detail->photo,
                    'lat'  => $detail->latitude,
                    'lng'  => $detail->longitude,
                    'icon' => $detail->photo
                ];
        }

        return view('user.travels.detail')->with('details',$details)->with('travel',$travel);


    }

    public function confirm(UserTravelPostRequest $request){

        $travel = Travel::where('id',$request->input('id'))->first();

        $travel->name = $request->input('name');
        $travel->genre_id = $request->input('genre');
        $travel->comment = $request->input('comment');
        $travel->releaseFlg = $request->input('release');

        if($travel->update()){
            return redirect('/user/travel');
        }else{

        }


    }

}