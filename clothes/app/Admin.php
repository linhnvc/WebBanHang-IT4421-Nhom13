<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public $timestamps = false;
    protected $table = "admin";
    protected $primaryKey = "adminId";

    public static function findAdminByInfor($email, $password){
    	$admin =  Admin::Where([['email', $email], ['password', $password]])->first();
    	return $admin;
    }
}
