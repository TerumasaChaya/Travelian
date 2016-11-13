<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Travel;
use App\Http\Controllers\Controller;
use App\TravelDetail;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $travels = TravelDetail::where('photo','!=','')->paginate(16);

        return view('admin.photos')->with('travels',$travels);
    }
}
