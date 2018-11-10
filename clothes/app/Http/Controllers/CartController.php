<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function  addCart(Request $request){
    $id = $request->id;
    $message = 'false';
    if (!empty(session('user_id'))){
        $message = 'true';
        if(!empty(session('cart.'.$id))){
            session()->put('cart.'.$id, session('cart.'.$id) + 1 );

        }else{
            session()->put('cart.'.$id, 1);
        }
    }
    // $message = session('cart');
    $response = array(
        'msg' => $message,
    );
    return response()->json($response); 
   }
}
