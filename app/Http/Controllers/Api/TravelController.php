<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use App\Travel;
use App\TravelDetail;
use App\Genre;
use Auth;
use Hash;
use Response;
use Illuminate\Http\Request;

class TravelController extends Controller
{

    public function searchName($name)
    {

        $travel = Travel::where('name','like',"%{$name}%")->where('releaseFlg',true)->get();

        for ($i=0; $i <count($travel); $i++){
            $travel[0]->genre_id = $travel[0]->genres->name;
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
            $travel[0]->genre_id = $travel[0]->genres->name;
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
            $travel[0]->genre_id = $travel[0]->genres->name;
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
            $travel[0]->genre_id = $travel[0]->genres->name;
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

}