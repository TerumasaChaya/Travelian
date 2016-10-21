<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupMember extends Model
{

    protected $table = "groupMembers";

    protected $fillabel = [
        "id","user_id","group_id","leaderFlg"
    ];

    //hasMany設定
    public function users()
    {
        return $this->belongsTo('App\User','user_id');

    }

    //hasMany設定
    public function groups()
    {
        return $this->belongsTo('App\Group','group_id');

    }

}
