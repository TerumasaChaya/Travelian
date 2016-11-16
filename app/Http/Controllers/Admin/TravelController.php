<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Travel;
use App\Http\Controllers\Controller;
use App\TravelDetail;
use App\User;

class TravelController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function privateIndex()
    {
        $travels = Travel::where('releaseFlg',false)->orderBy('created_at','desc')->paginate(10);

        return view('admin.travels.private')->with('travels',$travels);
    }

    public function publicIndex()
    {
        $travels = Travel::where('releaseFlg',true)->orderBy('created_at','desc')->paginate(10);

        return view('admin.travels.public')->with('travels',$travels);
    }

    public function privateDetail($id){

        $travelDetails = TravelDetail::where('travel_id',$id)->get();

        $travel = Travel::where('id',$travelDetails[0]->travel_id)->first();

        $details = [];

        foreach ($travelDetails as $detail){
            $details[] =
                [
                    'id'   => $detail->id,
                    'name' => $detail->photo,
                    'lat'  => $detail->latitude,
		            'lng'  => $detail->longitude,
		            'icon' => $detail->photo
                ];
        }

        return view('admin.travels.private-detail')->with('details',$details)->with('travel',$travel);

    }

    public function publicDetail($id){

        $travelDetails = TravelDetail::where('travel_id',$id)->get();

        $travel = Travel::where('id',$travelDetails[0]->travel_id)->first();

        $details = [];

        foreach ($travelDetails as $detail){
            $details[] =
                [
                    'id'   => $detail->id,
                    'name' => $detail->photo,
                    'lat'  => $detail->latitude,
                    'lng'  => $detail->longitude,
                    'icon' => $detail->photo
                ];
        }

        return view('admin.travels.public-detail')->with('details',$details)->with('travel',$travel);

    }

    public function detail($id)
    {

        $detail = TravelDetail::where('id', $id)->first();

        $x = $detail->longitude;
        $y = $detail->latitude;

        // API
        $url = "http://geoapi.heartrails.com/api/json/?method=searchByGeoLocation&x=".$x."&y=".$y;

        // セッションを初期化
        $conn = curl_init();

        // オプション
        curl_setopt($conn, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($conn, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($conn, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($conn, CURLOPT_URL, $url);

        //プロキシ設定(実行サーバー環境しだいで不要)
        curl_setopt($conn, CURLOPT_HTTPPROXYTUNNEL, 1);
        curl_setopt($conn, CURLOPT_PROXY, 'http://proxy.ecc.ac.jp:8080');
        curl_setopt($conn, CURLOPT_PROXYPORT, '8080');
        //プロキシ設定　ここまで


        // 実行
        $res = curl_exec($conn);

        $json = json_decode($res);

        $location = $json->response->location[0];

        // close
        curl_close($conn);

        return view('admin.travels.detail')->with('detail', $detail)->with('location',$location);

    }

}
