<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{

    protected $table = "prefectures";

    protected $fillabel = [
        "id","name",
    ];

    //hasMany設定
    public function travelPrefectures()
    {
        return $this->hasMany('App\TravelPrefecture');

    }

}
