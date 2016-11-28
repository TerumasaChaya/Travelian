<?php
namespace App\Http\Controllers\User;

use App\Genre;
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

        $genre = Genre::orderBy('genrePoint','DESC')->limit(5)->get();

        //view に 値を渡す
        return view("user.travels.search.search")->with('popGenre',$genre);
    }

}