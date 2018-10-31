<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Product extends Model
{
    protected $table = 'product';
    public $primaryKey = "productId";
    public $timestamps = false;

    public function firm(){
    	return $this->belongsTo('App\Firm', 'FirmId', 'firmId');
    }

    public function category(){
    	return $this->belongsTo('App\Category', 'categoryId', 'categoryId');
    }

    public function image(){
        return $this->hasMany('App\Image', 'productId', 'productId');
    }

    public static function getProductByCategory($category_name){
        $product_list = Product::whereHas('category', function($q) use($category_name){
            $q->where('name', $category_name);
        })->get();

    	return $product_list;
    }

    public static function getProductById($id){
        $product = Product::where("productId", "=", $id)
                            ->first();
        return $product;
    }


}
