<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use App\Category;
use App\Image;
use App\Firm;

class Product extends Model
{
    
    protected $table = 'product';
    public $primaryKey = "productId";
    public $timestamps = false;
    // use Searchable;
    // public function searchableAs()
    // {
    //     return 'productId';
    // }
    // public function toSearchableArray()
    // {
    //     $array = $this->toArray();
    //     $array["firm"]= $this->firm;
    //     $array["category"]= $this->category;
    //     return $array;
    // }

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

        public static function updateProduct($product_id, $product_name, $product_size, $product_color, $product_quantity, $product_description, $product_price, $category_name, $firm_name){
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
        
        $product = Product::find($id);
        $product->quantity = -1;
        $product->save();

    }

    public static function addProduct($product_name, $product_size, $product_color, $product_quantity, $product_description, $product_price, $category_id, $firm_id, $image1, $image2, $image3, $image4){

        $new_product = new Product();
        $new_product->name = $product_name;
        $new_product->size = (int)$product_size;
        $new_product->color = strtoupper($product_color);
        $new_product->quantity = (int)$product_quantity;
        $new_product->description = $product_description;
        $new_product->price = (int)$product_price;
        $new_product->categoryId = $category_id;
        $new_product->FirmId = $firm_id;
        $new_product->save();


        $max_id = Product::max('productId');
        $id = $max_id;
        $name_img = (string)$id;


        $new_name1 = $name_img.'_1.'.$image1->getClientOriginalExtension();
        $image1->move(public_path('Dresses'), $new_name1);

       
        $new_name2 = $name_img.'_2.'.$image2->getClientOriginalExtension();
        $image2->move(public_path('Dresses'), $new_name2);

        
        $new_name3 = $name_img.'_3.'.$image3->getClientOriginalExtension();
        $image3->move(public_path('Dresses'), $new_name3);

        
        $new_name4 = $name_img.'_4.'.$image4->getClientOriginalExtension();
        $image4->move(public_path('Dresses'), $new_name4);

        $new_name1 = 'Dresses/'.$new_name1;
        $new_name2 = 'Dresses/'.$new_name2;
        $new_name3 = 'Dresses/'.$new_name3;
        $new_name4 = 'Dresses/'.$new_name4;

        $new_image1 = new Image();
        $new_image1->productId = $id;
        $new_image1->link = $new_name1;
        $new_image1->save();

        $new_image2 = new Image();
        $new_image2->productId = $id;
        $new_image2->link = $new_name2;
        $new_image2->save();

        $new_image3 = new Image();
        $new_image3->productId = $id;
        $new_image3->link = $new_name3;
        $new_image3->save();


        $new_image4 = new Image();
        $new_image4->productId = $id;
        $new_image4->link = $new_name4;
        $new_image4->save();

    }

}
