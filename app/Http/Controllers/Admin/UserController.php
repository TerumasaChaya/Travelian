<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Travel;
use App\Http\Controllers\Controller;
use App\TravelDetail;
use App\User;

class UserController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id','!=',0)->orderBy('created_at','desc')->paginate(10);

        return view('admin.users')->with('users',$users);
    }

    public function detail($id)
    {
        $user = User::where('id',$id)->first();

        return view('admin.users-detail')->with('user',$user);
    }

}
