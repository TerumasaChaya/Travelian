<?php
namespace App\Http\Controllers\User;

use App\Genre;
use App\Http\Controllers\Controller;
use App\User;
use App\Travel;
use App\TravelDetail;
use App\Http\Requests\UserTravelPostRequest;
use Auth;
use Response;
use Illuminate\Http\Request;

class TravelSearchController extends Controller
{

    public function index()
    {

        $genre = Genre::orderBy('genrePoint','DESC')->limit(5)->get();

        //view に 値を渡す
        return view("user.travels.search.search")->with('popGenre',$genre);
    }

    public function result(Request $request){

        $region = [
            [
                '北海道'
            ],
            [
                '青森県', '岩手県', '宮城県', '秋田県', '山形県', '福島県'
            ],
            [
                '茨城県', '栃木県', '群馬県', '埼玉県', '千葉県', '東京都', '神奈川県'
            ],
            [
                '新潟県', '富山県', '石川県', '福井県', '山梨県', '長野県', '岐阜県', '静岡県', '愛知県'
            ],
            [
                '三重県', '滋賀県', '京都府', '大阪府', '兵庫県', '奈良県', '和歌山県'
            ],
            [
                '鳥取県', '島根県', '岡山県', '広島県', '山口県'
            ],
            [
                '徳島県', '香川県', '愛媛県', '高知県'
            ],
            [
                '福岡県', '佐賀県', '長崎県', '熊本県', '大分県', '宮崎県', '鹿児島県', '沖縄県'
            ]

        ];

        $keyword = $request->input('keyword');

        $pres = $request->input('pres');

        $region = $request->input('region');

        $genreId = $request->input('genre');

        $keyword = $json->keyword;

        $genreId = "";

        $keywordTravel = Travel::where('id',"");

        $genres = [];

        $pres = [];

        //json内のキーワードが空じゃなかったらテーブル検索
        if($json->keyword != ""){

            $keywordTravel = Travel::where('name','like',"%{$keyword}%");

            //ジャンルを部分一致検索
            $keywordGenre = Genre::where('name','like',"%{$keyword}%")->get();
            foreach ($keywordGenre as $genre){
                $genres[] = $genre->id;
            }

            //都道府県を部分一致検索
            $keywordPre = Prefecture::where('name','like',"%{$keyword}%")->get();
            foreach ($keywordPre as $pre){
                foreach ($pre->travelPrefectures as $travelPrefecture){
                    $pres[] =  $travelPrefecture->travel_id;
                }
            }
        }

        //json内のジャンルが空じゃなかったらテーブル検索
        //検索結果が存在すればgenreIdに値を代入
        if($json->genre != ""){
            $genreId = Genre::where('name',$json->genre)->first();
            if($genreId != null){
                $genreId = $genreId->id;
            }
        }

        $region = Prefecture::whereIn('name', $json->region)->get();

        $regions = [];

        foreach ($region as $pre){
            foreach ($pre->travelPrefectures as $travelPrefecture){
                $regions[] =  $travelPrefecture->travel_id;
            }
        }

        $keywordGenre = Travel::whereIn('genre_id',$genres);

        $keywordPre = Travel::whereIn('id',$pres);

        $genre = Travel::where('genre_id',$genreId);

        $region = Travel::whereIn('id',$regions);

        $travel = Travel::where('id',"")
            ->union($keywordGenre)
            ->union($keywordTravel)
            ->union($keywordPre)
            ->union($genre)
            ->union($region)
            ->get();

        for ($i=0; $i <count($travel); $i++){
            $travel[$i]->genre_id = $travel[$i]->genres->name;
        }

    }


}