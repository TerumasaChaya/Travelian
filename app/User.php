<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','login_key'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //hasMany設定
    public function travels()
    {
        return $this->hasMany('App\Travel');

    }

    //hasMany設定
    public function groupMembers()
    {
        return $this->hasMany('App\GroupMember');

    }

    public function delete()
    {
        // delete all related
        $this->travels()->delete();
        $this->groupMembers()->delete();

        // delete the user
        return parent::delete();
    }


}
