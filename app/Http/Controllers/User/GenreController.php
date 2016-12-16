<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use App\Genre;
use App\Travel;
use Auth;
use Response;

class GenreController extends Controller
{

    public function index()
    {

    }

    public function detail($id){

        $genre = Genre::where('id', $id)->first();
        $genreMes = "ジャンル: " . $genre->name;

        $travels = Travel::where('genre_id',$genre->id)->where('releaseFlg',true)->orderBy('created_at','DESC')->get();

        return view('user.genre.result')->with('travels',$travels)->with('genreMes',$genreMes);

    }

}