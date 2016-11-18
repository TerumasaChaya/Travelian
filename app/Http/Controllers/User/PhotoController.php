<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\TravelDetail;
use Auth;
use Response;

class PhotoController extends Controller
{

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

        return view('user.travels.photo')->with('detail', $detail)->with('location',$location);
    }

}