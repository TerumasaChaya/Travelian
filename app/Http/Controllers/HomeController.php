<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Travel;
use Illuminate\Http\Request;
use App\Genre;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $popularGenres = Genre::orderBy('genrePoint','DESC')->limit(10)->get();

        $popularGenre = [];

        foreach ($popularGenres as $popular){

            $travel = Travel::where('genre_id',$popular->id)->where('releaseFlg',true)->orderBy('travelPoint','desc')->first();

            if($travel == null){
                $popularGenre[] = [
                    'id' => $popular->id,
                    'name' => $popular->name,
                    'photo' => 'dummy.jpeg'
                ];
            }else{
                $popularGenre[] = [
                    'id' => $popular->id,
                    'name' => $popular->name,
                    'photo' => $travel->thumbnail
                ];
            }

        }
        return view('user.home')->with('popularGenre',$popularGenre);
    }
}
