<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use App\Travel;
use App\TravelDetail;
use Auth;
use Hash;
use Response;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request)
    {

        $user = User::where('login_key',$request->input("login_key"))->first();
        
        return Response::json(
            array(
                'status' => 'Success',
                'user'   => $user
            )
        );
    }

    public function manualLogin(Request $request)
    {

        $user = User::where('email',$request->input("email"))->first();

        if(isset($user)){

            if(Hash::check($request->input("password"), $user->password)){

                return Response::json(
                    array(
                        'status' => 'Success',
                        'user'   => $user
                    )
                );
            }else{

                return Response::json(
                    array(
                        'status' => 'Failed',
                        'reason' => 'this password is dose not match'
                    )
                );
            }

        }else{

            return Response::json(
                array(
                    'status' => 'Failed',
                    'reason' => 'this email is not exist'
                )
            );

        }

    }

    public function create(Request $request){

        $user = User::where('email',$request->input("email"))->first();

        if(isset($user)){
            // データがあればFailedを返す
            return Response::json(
                array(
                    'status' => 'Failed',
                    'reason' => 'this email is already exist',
                )
            );
        }else{

            $user = new User();

            //ユーザー登録
            $user->name =  $request->input("name");
            $user->email =  $request->input("email");
            $user->password = bcrypt($request->input("password"));
            $user->login_key = str_random(50);

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

    public function sync(Request $request){

        $json = base64_decode(str_replace(' ', '+', $request->input('json')));

        $json = json_decode($json);

        $userId = $json->user_id;

        $travel = Travel::where('user_id',$userId)->whereNotIn('id',$json->travels)->get();

        foreach ($travel as $item){
            $regions = [];
            foreach ($item->travelPrefectures as $pres){
                $regions[] = $pres->prefectures->name;
            }
            $item->regions = $regions;
        }

        return Response::json(
            array(
                'status' => 'Success',
                'travels'   => $travel
            )
        );

    }


    public function syncDetail(Request $request){

        $json = base64_decode(str_replace(' ', '+', $request->input('json')));

        $json = json_decode($json);

        $travelId = $json->travel_id;

        $travel = Travel::where('id', $travelId)->first();

        $detail = TravelDetail::where('travel_id', $travel->id)->get();

        return Response::json(
            array(
                'status' => 'Success',
                'detail' => $detail
            )
        );

    }

}