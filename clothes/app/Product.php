<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use App\Category;

class Product extends Model
{
    
    protected $table = 'product';
    public $primaryKey = "productId";
    public $timestamps = false;
    use Searchable;
    public function searchableAs()
    {
        return 'productId';
    }
    public function toSearchableArray()
    {
        $array = $this->toArray();
        $array["firm"]= $this->firm;
        $array["category"]= $this->category;
        return $array;
    }

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

        public static function updateproduct($product_id, $product_name, $product_size, $product_color, $product_quantity, $product_description, $product_price, $category_name, $firm_name){
        $product = Product::find($product_id);

        $category = Category::where('name', '=', $category_name)->first();
        $category_id = $category->categoryId;

        $firm = Firm::where('name', '=', $firm_name)->first();
        if(!empty($firm)){
            $firm_id = $firm->firmId;
        } else {
            $firm_id = $product->FirmId;
        }

        // $product->update([  'name'          => $product_name,
        //                     'size'          => $product_size,
        //                     'color'         => $product_color,
        //                     'quatity'       => $product_quantity,
        //                     'description'   => $product_description,
        //                     'price'         => $product_price,
        //                     'categoryId'    => $category_id,
        //                     'FirmId'        => $firm_id]);

        $product->name = $product_name;
        $product->size = (int)$product_size;
        $product->color = strtoupper($product_color);
        $product->quantity = (int)$product_quantity;
        $product->description = $product_description;
        $product->price = (int)$product_price;
        $product->categoryId = $category_id;
        $product->FirmId = $firm_id;
        
        $product->save();
    }

    public static function deleteproduct($id){
        $images = Image::where('productId', '=', $id)->get();

        foreach ($images as $image) {
            $image->delete();
        }

        Product::destroy($id);
    }


}
