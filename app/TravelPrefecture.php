<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TravelPrefecture extends Model
{

    protected $table = "travelPrefectures";

    protected $fillabel = [
        "id","travel_id","prefecture_id"
    ];

    //hasMany設定
    public function travels()
    {
        return $this->belongsTo('App\Travel','travel_id');

    }

    //hasMany設定
    public function prefectures()
    {
        return $this->belongsTo('App\Prefecture','prefecture_id');

    }

}
