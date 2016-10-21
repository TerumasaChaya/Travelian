<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use App\Travel;
use Auth;
use Response;

class TravelController extends Controller
{

    public function index()
    {

        $all = Travel::all();

        var_dump(Response::json($all));

        $travels = Travel::where('user_id',Auth::user()->id)->get();

        //view に 値を渡す
        return view("user.travel")->with('travels',$travels);
    }

}