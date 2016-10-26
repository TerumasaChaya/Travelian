<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use App\Travel;
use Auth;
use Hash;
use Response;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function login(Request $request)
    {

        $user = User::where('id', $request->input("id"))->first();

        if(Hash::check($request->input("password"), $user->password)){
            // データがあればSuccessを返す
            return Response::json(array('status' => 'Success'));
        }else{
            // データが空ならFailedを返す
            return Response::json(array('status' => 'Failed'));
        }

    }

    public function create(Request $request){

        $user = User::where('email',$request->input("email"))->first();

        if(Hash::check($request->input("password"), $user->password)){
            // データがあればFailedを返す
            return Response::json(array('status' => 'Failed'));
        }else{



        }

    }

}