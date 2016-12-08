<?php
namespace App\Http\Controllers\User;

use App\Genre;
use App\Http\Controllers\Controller;
use App\User;
use App\Travel;
use App\TravelDetail;
use App\Http\Requests\UserTravelPostRequest;
use App\Prefecture;
use Auth;
use Response;
use Illuminate\Http\Request;

class TravelSearchController extends Controller
{

    public function index()
    {

        $genre = Genre::orderBy('genrePoint', 'DESC')->limit(5)->get();

        //view に 値を渡す
        return view("user.travels.search.search")->with('popGenre', $genre);
    }

    public function result(Request $request)
    {

        $regions = [
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

        $tiiki = [
            "北海道",
            "東北",
            "関東",
            "中部",
            "近畿",
            "中国",
            "四国",
            "九州"
        ];

        $keyword = $request->input('keyword');

        $region = [];

        if ($request->input('pres') != "") {
            $region = $regions[$request->input('pres')];
        }

        if ($request->input('region') != "") {
            $region = [$request->input('region')];
        }

        $genreId = $request->input('genre');

        $genres = [];

        $pres = [];

        $keywordRegion = [];

        //json内のキーワードが空じゃなかったらテーブル検索
        if ($keyword != "") {

            $keywordRegion = [0];

            //キーワードに地域が含まれているか
            foreach ($tiiki as $key => $i) {

                if (stristr($i, $keyword)) {

                    $tmpRegion = Prefecture::whereIn('name', $regions[$key])->get();

                    foreach ($tmpRegion as $pre) {
                        foreach ($pre->travelPrefectures as $travelPrefecture) {
                            $keywordRegion[] = $travelPrefecture->travel_id;
                        }
                    }
                }
            }

            //ジャンルを部分一致検索
            $keywordGenre = Genre::where('name', 'like', "%{$keyword}%")->get();
            foreach ($keywordGenre as $genre) {
                $genres[] = $genre->id;
            }

            //都道府県を部分一致検索
            $keywordPre = Prefecture::where('name', 'like', "%{$keyword}%")->get();
            foreach ($keywordPre as $pre) {
                foreach ($pre->travelPrefectures as $travelPrefecture) {
                    $pres[] = $travelPrefecture->travel_id;
                }
            }
        }

        $regionGet = Prefecture::whereIn('name', $region)->get();

        if ($request->input('region') != "" || $request->input('pres') != "") {
            $regions = [0];

            foreach ($regionGet as $pre) {
                foreach ($pre->travelPrefectures as $travelPrefecture) {
                    $regions[] = $travelPrefecture->travel_id;
                }
            }

        } else {
            $regions = [];
        }

        $travels = Travel::where('releaseFlg', true)
            ->where(function ($query) use ($genres, $pres, $keyword,$keywordRegion) {
                if (!(empty($keyword))) {
                    $query->orwhere('name', 'like', "%{$keyword}%");
                }
                if (!(empty($pres))) {
                    $query->orwhereIn('id', $pres);
                }
                if (!(empty($genres))) {
                    $query->orwhereIn('genre_id', $genres);
                }
                if (!(empty($keywordRegion))) {
                    $query->orwhereIn('id', $keywordRegion);
                }
            })
            ->where(function ($query) use ($genreId, $regions) {
                if (!(empty($regions))) {
                    $query->whereIn('id', $regions);
                }
                if (!(empty($genreId))) {
                    $query->where('genre_id', $genreId);
                }
            })
            ->orderBy('created_at', 'DESC')
            ->get();

        $keyMes = "";
        $genreMes = "";
        $regionMes = "";

        if ($request->input('keyword') != "") {
            $keyMes = "キーワード: " . $keyword;
        }

        if ($request->input('genre') != "") {
            $tmpGenre = Genre::where('id', $request->input('genre'))->first();
            $genreMes = "ジャンル: " . $tmpGenre->name;
        }

        if ($request->input('pres') != "") {
            $regionMes = "都道府県: ";
            foreach ($region as $re) {
                $regionMes = $regionMes . $re . ",";
            }
        }

        if ($request->input('region') != "") {
            $regionMes = "都道府県: " . $request->input('region');
        }

        return view('user.travels.search.result')
            ->with('travels', $travels)
            ->with('keyMes', $keyMes)
            ->with('genreMes', $genreMes)
            ->with('regionMes', $regionMes);


    }

    public function release($id)
    {

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

        if($travelDetails[0]->travels->users->id == Auth::user()->id){
            return view('user.travels.detail')->with('details',$details)->with('travel',$travel);
        }else{
            return view('user.travels.search.detail')->with('details',$details)->with('travel',$travel);
        }

    }


}