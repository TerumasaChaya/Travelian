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

class TravelSearchController extends Controller
{

    public function index()
    {
        //view に 値を渡す
        return view("user.travels.search.search");
    }

}