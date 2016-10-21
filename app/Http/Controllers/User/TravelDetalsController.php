<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use App\TravelDetail;
use Auth;
use Response;

class TravelDetailsController extends Controller
{

    public function index()
    {

        $travels = TravelDetail::where('user_id',Auth::user()->id)->get();

        //view に 値を渡す
        return view("user.travel")->with('travels',$travels);
    }

}