<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = false;
    protected $table = "user";
    protected $primaryKey = "userId";

    public static function findUserByEmail($email){
    	$user = User::where('email', $email)->first();
    	return $user;
    }

    public static function findUserByInfor($email, $password){
    	$user =  User::Where([['email', $email], ['password', $password]])->first();
    	return $user;
    }

    public static function registerUser($name, $password, $email){
		$new_user = new User;
        $new_user->userName = $name;
        $new_user->password = $password;
        $new_user->email = $email;
        $new_user->save();
    }

    public static function updateUser($id, $name, $email, $password){
    	$updated_user = User::find($id);
        $updated_user->userName = $name;
        $updated_user->email = $email;
        $updated_user->password = $password;
        $updated_user->save();

        return $updated_user;
    }
}
