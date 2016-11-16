<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Travel;
use App\Http\Controllers\Controller;
use App\TravelDetail;
use App\User;
use Illuminate\Http\Request;

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

        $travels = Travel::where('user_id',$id)->get();

        return view('admin.users-detail')->with('user',$user)->with('travels',$travels);
    }

    public function delete(Request $request)
    {

        $user = User::where('id', $request->input("id"))->first();

        if ($user->delete()) {
            return redirect('/admin/users');
        } else {
            return redirect()->back();
        }

    }

}
