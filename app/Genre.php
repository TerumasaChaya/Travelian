<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{

    protected $table = "genres";

    protected $fillabel = [
        "id","name",'genrePoint'
    ];

    //belongsTo設定
    public function travels()
    {
        return $this->belongsTo('App\Travel','id');

    }

}
