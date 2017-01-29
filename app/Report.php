<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{

    protected $table = "reports";

    protected $fillabel = [
        "id","travel_id",
    ];

    //hasMany設定
    public function travels()
    {
        return $this->belongsTo('App\Travel','travel_id','id');

    }

}
