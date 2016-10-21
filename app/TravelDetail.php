<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TravelDetail extends Model
{

    protected $table = "travelDetails";

    protected $fillabel = [
        'id',
        'travel_id',
        'photo',
        'longitude',
        'latitude'
    ];

    //hasMany設定
    public function travels()
    {
        return $this->hasMany('App\User','travel_id');

    }

}
