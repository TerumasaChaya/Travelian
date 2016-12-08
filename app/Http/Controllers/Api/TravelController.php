<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use App\Travel;
use App\TravelDetail;
use App\Genre;
use App\Prefecture;
use Auth;
use Hash;
use Response;
use Illuminate\Http\Request;

class TravelController extends Controller
{

    public function alpha()
    {

        $genre = Genre::orderBy('kana', 'ASC')->get();

        return Response::json(
            array(
                'status' => 'Success',
                'travel' => $genre
            )
        );

    }

    public function genrePoint()
    {

        $genre = Genre::orderBy('genrePoint', 'DESC')->get();

        return Response::json(
            array(
                'status' => 'Success',
                'travel' => $genre
            )
        );

    }

    public function travelPoint()
    {

        $travel = Travel::orderBy('travelPoint', 'DESC')->get();

        for ($i = 0; $i < count($travel); $i++) {
            $travel[$i]->genre_id = $travel[$i]->genres->name;
        }

        return Response::json(
            array(
                'status' => 'Success',
                'travel' => $travel
            )
        );

    }

    public function searchTravel(Request $request)
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

        $json = base64_decode(str_replace(' ', '+', $request->input('json')));

        $json = json_decode($json);

        $keyword = $json->keyword;

        $genreId = "";

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
        //json内のジャンルが空じゃなかったらテーブル検索
        //検索結果が存在すればgenreIdに値を代入
        if ($json->genre != "") {
            $genreId = Genre::where('name', $json->genre)->first();
            if ($genreId != null) {
                $genreId = $genreId->id;
            }
        }

        $regionGet = Prefecture::whereIn('name', $json->region)->get();

        if (!(empty($json->region))) {
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

        for ($i = 0; $i < count($travels); $i++) {
            $travels[$i]->genre_id = $travels[$i]->genres->name;
        }

        return Response::json(
            array(
                'status' => 'Success',
                'travel' => $travels
            )
        );

    }

    public function searchGenreASC($name)
    {

        $genre = Genre::where('name', $name)->first();

        $travel = Travel::where('genre_id', $genre->id)->orderBy('travelPoint', 'ASC')->get();

        for ($i = 0; $i < count($travel); $i++) {
            $travel[$i]->genre_id = $travel[$i]->genres->name;
        }

        return Response::json(
            array(
                'status' => 'Success',
                'travel' => $travel
            )
        );

    }

    public function searchGenre($name)
    {

        $genre = Genre::where('name', $name)->first();

        if (!isset($genre)) {
            return Response::json(
                array(
                    'status' => 'Success',
                    'travel' => []
                )
            );
        }


        $travel = Travel::where('genre_id', $genre->id)->orderBy('created_at', 'DESC')->get();

        for ($i = 0; $i < count($travel); $i++) {
            $travel[$i]->genre_id = $travel[$i]->genres->name;
        }

        return Response::json(
            array(
                'status' => 'Success',
                'travel' => $travel
            )
        );

    }

    public function searchGenreDESC($name)
    {

        $genre = Genre::where('name', $name)->first();

        $travel = Travel::where('genre_id', $genre->id)->orderBy('travelPoint', 'DESC')->get();

        for ($i = 0; $i < count($travel); $i++) {
            $travel[$i]->genre_id = $travel[$i]->genres->name;
        }

        return Response::json(
            array(
                'status' => 'Success',
                'travel' => $travel
            )
        );

    }

    public function travelDetail($id)
    {
        $travel = Travel::where('id', $id)->first();

        if ($travel->releaseFlg == false) {
            //公開されてない
            return Response::json(
                array(
                    'status' => 'Failed',
                    'reason' => 'this travel is undocumented'
                )
            );
        }

        $detail = TravelDetail::where('travel_id', $travel->id)->get();

        return Response::json(
            array(
                'status' => 'Success',
                'detail' => $detail
            )
        );

    }

    public function searchRegion(Request $request)
    {

        $json = base64_decode($request->input('region'));

        $json = json_decode($json);

        $pres = Prefecture::whereIn('name', $json->region)->get();

        $travels = [];

        foreach ($pres as $pre) {
            foreach ($pre->travelPrefectures as $travelPrefecture) {
                $travels[] = $travelPrefecture->travels;
            }
        }

        foreach ($travels as $travel) {
            $travel->genre_id = $travel->genres->name;
        }

        return Response::json(
            array(
                'status' => 'Success',
                'travel' => $travels
            )
        );


    }

    public function sendTravel(Request $request){

        $json = base64_decode(str_replace(' ', '+', $request->input('json')));

        $json = json_decode($json);

        //ジャンルID取得
        $genreId =  Genre::where('name',$json->travel[0]->genre_name)->first();
        $genreId = $genreId->id;

        //ユーザーID取得
        $userID = $json->travel[0]->user_id;

        //旅名取得
        $travelName = $json->travel[0]->name;

        //画像ファイル名取得
        $imageName = $json->travel[0]->thumbnail_name;

        //サムネイル画像取得
        $miniImage = str_replace(' ', '+',$json->travel[0]->thumbnail_mini);
        $image = str_replace(' ', '+',$json->travel[0]->thumbnail);

        //画像取得
        $travelImage = storage_path().'/image/travelImage/' . $imageName;
        $thumbnailImage = storage_path().'/image/thumbnailImage/' . $imageName;

        file_put_contents($travelImage, base64_decode($image));
        file_put_contents($thumbnailImage,base64_decode($miniImage));

        $thumbnail = $imageName;

        //コメント取得
        $comment = $json->travel[0]->comment;

        //公開フラグ取得
        $releaseFlg = $json->travel[0]->releaseFlg;

        //新規旅作成
        $newTravel = new Travel;

        $newTravel->genre_id = $genreId;
        $newTravel->user_id = $userID;
        $newTravel->name = $travelName;
        $newTravel->thumbnail = $thumbnail;
        $newTravel->comment = $comment;
        $newTravel->travelPoint = 20;
        $newTravel->releaseFlg = $releaseFlg;

        $newTravel->save();

        foreach ($json->details as $details) {

            //旅ID取得
            $travelId = $newTravel->id;

            //画像ファイル名取得
            $imageName = $json->travel[0]->thumbnail_name;

            //サムネイル画像取得
            $miniImage = str_replace(' ', '+',$details->photo_mini);
            $image = str_replace(' ', '+',$details->photo);

            //画像取得
            $travelImage = storage_path().'/image/travelImage/' . $imageName;
            $thumbnailImage = storage_path().'/image/thumbnailImage/' . $imageName;

            file_put_contents($travelImage, base64_decode($image));
            file_put_contents($thumbnailImage,base64_decode($miniImage));

            $thumbnail = $imageName;

            //経度取得
            $longitude = $details->longitude;

            //緯度取得
            $latitude = $details->latitude;

            //旅詳細行登録
            $newTravelDetail = new TravelDetail;

            $newTravelDetail->travel_id = $travelId;
            $newTravelDetail->photo = $thumbnail;
            $newTravelDetail->longitude = $longitude;
            $newTravelDetail->latitude = $latitude;

            $newTravelDetail->save();

        }

        return Response::json(
            array(
                'status' => 'Success'
            )
        );

    }


}