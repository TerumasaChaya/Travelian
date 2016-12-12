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

        return view('admin.genre.genre')->with('genres',$genres);
    }

    public function confirm(Request $request){

        $name = $request->input('name');

        $kana_name = $request->input('kana_name');

        return view('admin.genre.confirm')->with('name',$name)->with('kana_name',$kana_name);


    }

    public function complete(Request $request){

        $name = $request->input('name');

        $kana_name = $request->input('kana_name');

        $genre = new Genre;

        $genre->name = $name;
        $genre->kana = $kana_name;
        $genre->genrePoint = 20;

        $genre->save();

        return redirect('/admin/genres');

    }


}
