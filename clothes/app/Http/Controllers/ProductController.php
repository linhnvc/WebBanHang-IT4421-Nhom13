<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
       $category = Category::where('name',$category_para)->first();
       $products = $category->product()->paginate(9);
       foreach($products as $product){
            $product->firm;
            $product->image;
            $product->category;
       }

       $dressGroup = Category::where('group','Dress')->get();
       $commonGoup = Category::where('group','Common')->get();
       $beachGroup = Category::where('group','Beach')->get();

       $groupCategory = $category->group;
       $categories = Category::where('group', $groupCategory)->get();
       $collection = collect([]);
       foreach($categories as $categ){
           $products_related = $categ->product;
           foreach($products_related as $pro_relate){
            $pro_relate->firm;
            $pro_relate->image;
            $pro_relate->category;
           }
        $collection = $collection->concat($products_related);
       }
       $random_products_related = $collection->random(12);
        return view('products', ['products'=>$products, 'dressGroup'=>$dressGroup, 
        'commonGroup'=>$commonGoup, 'beachGroup'=>$beachGroup, 'category'=>$category_para,
         'products_related'=>$random_products_related]);
        // return  $collection;
=======
        //
>>>>>>> ae73710098b4a3d085221b017db6a720e0e05998
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showproductlist($kind){
        if($kind == 'Dresses'){
            $category_name = 'Dresses';
        }

        if($kind == 'PartyDresses'){
            $category_name = 'Party Dresses';
        }

        if($kind == 'T-Shirts'){
            $category_name = 'T-Shirts';
        }

        if($kind == 'Skirts'){
            $category_name = 'Skirts';
        }

        if($kind == 'Shorts'){
            $category_name = 'Shorts';
        }

        if($kind == 'Swimwear'){
            $category_name = 'Swimwear';
        }

        if($kind == 'Beachwear'){
            $category_name = 'Beachwear';
        }

        $product_list = Product::getProductByCategory($category_name);

        return view('ad-showproductlist')->with('product_list', $product_list);
    }
}
