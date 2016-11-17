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

    //belongsTo設定
    public function users()
    {
        return $this->belongsTo('App\User','user_id');

    }

    //hasMany設定
    public function genres()
    {
        return $this->belongsTo('App\Genre','genre_id');

    }

    //hasMany設定
    public function details()
    {
        return $this->hasMany('App\TravelDetail');

    }

    //hasMany設定
    public function travelPrefectures()
    {
        return $this->hasMany('App\TravelPrefecture');

    }

    public function delete()
    {
        // delete all related photos
        $this->details()->delete();
        // as suggested by Dirk in comment,
        // it's an uglier alternative, but faster
        // Photo::where("user_id", $this->id)->delete()

        // delete the user
        return parent::delete();
    }

}
