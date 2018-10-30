<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Category extends Model
{
    protected $table = 'category';
    public $timestamps = false;

    public function product(){
    	return $this->hasMany('App\Product', 'categoryId', 'categoryId');
    }
    
}
