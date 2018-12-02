<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = false;
    protected $table = "user";
    protected $primaryKey = "userId";
    public static function getUsers(){
        $users_list = User::all();
    	return $users_list;
    }
}
