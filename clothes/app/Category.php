<?php

namespace App;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use App\Product;

class Category extends Model
{ 
    use Searchable;
    protected $table = 'category';
    public $timestamps = false;

    public function product(){
    	return $this->hasMany('App\Product', 'categoryId', 'categoryId');
    }
    
}
