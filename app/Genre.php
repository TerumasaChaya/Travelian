<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{

    protected $table = "genres";

    protected $fillabel = [
        "id","name",'genrePoint'
    ];

}
