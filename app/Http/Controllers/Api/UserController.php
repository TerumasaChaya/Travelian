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

        $user = User::where('login_key', $request->input("login_key"))->first();

        if(isset($user)){
            // データがあればSuccessを返す
            return Response::json(array('status' => 'Success'));
        }else{
            // データが空ならFailedを返す
            return Response::json(array('status' => 'Failed'));
        }

    }

    public function create(Request $request){

        $user = User::where('email',$request->input("email"))->first();

        if(isset($user)){
            // データがあればFailedを返す
            return Response::json(array('status' => 'Failed'));
        }else{

            $user = new User();

            //ユーザー登録
            $user->name =  $request->input("name");
            $user->email =  $request->input("email");
            $user->password = bcrypt($request->input("email"));

            if($user->save()){

                // 登録できればSuccessとユーザーデータを返す
                return Response::json(
                    array(
                        'status' => 'Success',
                        'user'   => $user
                    )
                );
            }
        }

    }

}