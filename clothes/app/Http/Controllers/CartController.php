<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Image;
use App\Firm;
use App\Bill;

class CartController extends Controller
{

    public function displayCart(){
       $dressGroup = Category::where('group','Dress')->get();
       $commonGoup = Category::where('group','Common')->get();
       $beachGroup = Category::where('group','Beach')->get();
       $billId = count(Bill::all()) + 1;
       $products_cart = collect([]);
       $cart = 0;
       if(!empty(session('cart'))){
            $cart = session('cart');
       }
       if(!empty($cart)){
           foreach($cart as $key => $quantity){
                 $product = Product::where('productId', $key)->first();
                 $product->firm;
                 $product->image;
                 $product->category;
                 $product->quantity = $quantity;
                 $products_cart = $products_cart->concat([$product]);
                //  break;
           }
          
       }
        // return $products_cart[0]->image[0]->link;

       return view('checkout', ['dressGroup'=>$dressGroup,'commonGroup'=>$commonGoup, 'beachGroup'=>$beachGroup,
       "products"=>$products_cart, 'billId'=>$billId]);
    }


    public function  addCart(Request $request){
    $id = $request->id;
    $message = 'false';
    $count=0;
    if (!empty(session('user_id'))){
        $message = 'true';
        if(!empty(session('cart.'.$id))){
            session()->put('cart.'.$id, session('cart.'.$id) + 1 );

        }else{
            session()->put('cart.'.$id, 1);
        }
        $count= count(session('cart'));
    }
    
    $response = array(
        'msg' => $message,
        'count'=>$count,
    );
    return response()->json($response); 
   }



   
   public function updateCart(Request $request){
       $id = $request->id;
       $quantity = $request->quantity;
       session()->put("cart.".$id, $quantity);
    //    $quantity = session('cart.'.$id);
       $response = array(
        'msg' => $quantity,
        // 'msg'=>$quantity
    );
    return response()->json($response); 
   }
   public function deleteProductCart(Request $request){
       $id = $request->id;
       session()->forget('cart.'.$id);
       $count= count(session('cart'));
       $response = array(
        'msg' => $id,
        'count'=>$count,
    );
    return response()->json($response); 
   }
}
