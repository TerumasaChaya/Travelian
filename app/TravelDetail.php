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

    //belongs設定
    public function travels()
    {
        return $this->belongsTo('App\Travel','travel_id');

    }

}
