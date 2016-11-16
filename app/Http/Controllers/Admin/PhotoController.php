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
        $travels = TravelDetail::where('photo', '!=', '')->paginate(16);

        return view('admin.photos')->with('travels', $travels);
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
//        curl_setopt($conn, CURLOPT_HTTPPROXYTUNNEL, 1);
//        curl_setopt($conn, CURLOPT_PROXY, 'http://proxy.ecc.ac.jp:8080');
//        curl_setopt($conn, CURLOPT_PROXYPORT, '8080');
        //プロキシ設定　ここまで

        // 実行
        $res = curl_exec($conn);

        $json = json_decode($res);

        $location = $json->response->location[0];

        // close
        curl_close($conn);

        return view('admin.photos-detail')->with('detail', $detail)->with('location',$location);

    }

    public function delete(Request $request){

        $detail = TravelDetail::where('id',$request->input("id"))->first();

        $travel = $detail->travels;

        if($detail->delete()){
            if(!isset($travel->details[0]->id)){
                if($travel->delete()){
                    return redirect('/admin/photos');
                }else{
                    return redirect()->back();
                }
            }
            return redirect('/admin/photos');
        }else{
            return redirect()->back();
        }

    }

}
