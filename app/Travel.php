<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{

    protected $table = "travels";

    protected $fillabel = [
        "id",
        'genre_id',
        'user_id',
        'name',
        'thumbnail',
        'prefecture',
        'travelPoint',
        'comment',
        'releaseFlg'
    ];

    //hasMany設定
    public function users()
    {
        return $this->belongsTo('App\User','user_id');

    }

    //hasMany設定
    public function genres()
    {
        return $this->belongsTo('App\Genre','genre_id');

    }

}
