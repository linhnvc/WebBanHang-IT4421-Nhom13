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
        //
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
