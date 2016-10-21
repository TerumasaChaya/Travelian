<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    protected $table = "groups";

    protected $fillabel = [
        "id","name",
    ];

    //hasMany設定
    public function users()
    {
        return $this->hasMany('App\User');

    }
}
