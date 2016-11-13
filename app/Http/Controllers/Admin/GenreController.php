<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = Genre::where('id','!=',0)->orderBy('genrePoint','desc')->paginate(10);

        return view('admin.genre')->with('genres',$genres);
    }
}
