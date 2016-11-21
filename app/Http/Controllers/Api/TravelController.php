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

    public function alpha(){

        $genre = Genre::orderBy('kana','ASC')->get();

        return Response::json(
            array(
                'status' => 'Success',
                'travel' => $genre
            )
        );

    }

    public function genrePoint(){

        $genre = Genre::orderBy('genrePoint','DESC')->get();

        return Response::json(
            array(
                'status' => 'Success',
                'travel' => $genre
            )
        );

    }

    public function travelPoint(){

        $travel = Travel::orderBy('travelPoint','DESC')->get();

        for ($i=0; $i <count($travel); $i++){
            $travel[$i]->genre_id = $travel[$i]->genres->name;
        }

        return Response::json(
            array(
                'status' => 'Success',
                'travel' => $travel
            )
        );

    }

    public function searchName($name)
    {

        $travel = Travel::where('name','like',"%{$name}%")->where('releaseFlg',true)->get();

        for ($i=0; $i <count($travel); $i++){
            $travel[$i]->genre_id = $travel[$i]->genres->name;
        }

        return Response::json(
            array(
                'status' => 'Success',
                'travel' => $travel
            )
        );

    }

    public function searchGenreASC($name)
    {

        $genre = Genre::where('name',$name)->first();

        $travel = Travel::where('genre_id',$genre->id)->orderBy('travelPoint','ASC')->get();

        for ($i=0; $i <count($travel); $i++){
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

        $genre = Genre::where('name',$name)->first();

        if(!isset($genre)) {
            return Response::json(
                array(
                    'status' => 'Success',
                    'travel' => []
                )
            );
        }


        $travel = Travel::where('genre_id',$genre->id)->orderBy('created_at','DESC')->get();

        for ($i=0; $i <count($travel); $i++){
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

        $genre = Genre::where('name',$name)->first();

        $travel = Travel::where('genre_id',$genre->id)->orderBy('travelPoint','DESC')->get();

        for ($i=0; $i <count($travel); $i++){
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
        $travel = Travel::where('id',$id)->first();

        if($travel->releaseFlg == false){
            //公開されてない
            return Response::json(
                array(
                    'status' => 'Failed',
                    'reason' => 'this travel is undocumented'
                )
            );
        }

        $detail = TravelDetail::where('travel_id',$travel->id)->get();

        return Response::json(
            array(
                'status' => 'Success',
                'detail' => $detail
            )
        );

    }

    public function searchRegion(Request $request){

        $json = base64_decode($request->input('region'));

        $json = json_decode($json);

        $pres = Prefecture::whereIn('name', $json->region)->get();

        $travels = [];

        foreach ($pres as $pre){
            foreach ($pre->travelPrefectures as $travelPrefecture){
                $travels[] =  $travelPrefecture->travels;
            }
        }

        foreach ($travels as $travel){
            $travel->genre_id = $travel->genres->name;
        }

        return Response::json(
            array(
                'status' => 'Success',
                'travel' => $travels
            )
        );


    }

}