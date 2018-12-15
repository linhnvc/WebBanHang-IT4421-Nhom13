<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Feedback;
use App\Category;
use App\Image;
use App\Firm;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function homePage(){
       $dressGroup = Category::where('group','Dress')->get();
       $commonGoup = Category::where('group','Common')->get();
       $beachGroup = Category::where('group','Beach')->get();
       $products_new= Product::orderBy('productId', 'desc')->limit(4)->get();
       foreach($products_new as $prod){
        $prod->firm;
        $prod->image;
        $prod->category;
       }

       return view('index', ['dressGroup'=>$dressGroup,'commonGroup'=>$commonGoup, 'beachGroup'=>$beachGroup,
       'products_new'=>$products_new]);
    }
    public function index($category_para)
    {
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
        // return  $products;
    }

    public function search(Request $request){
       $dressGroup = Category::where('group','Dress')->get();
       $commonGoup = Category::where('group','Common')->get();
       $beachGroup = Category::where('group','Beach')->get();

      
       $key_search =  $request->Search;
       $products_searched = Product::search( $key_search)->paginate(9);
       foreach($products_searched as $prod){
        $prod->firm;
        $prod->image;
        $prod->category;
   }
    //    return Product::all()->first()->toSearchableArray();
    //   return $products_searched;
       return view('products', ['products'=>$products_searched, 'dressGroup'=>$dressGroup, 
        'commonGroup'=>$commonGoup, 'beachGroup'=>$beachGroup, 'category'=>'Search', 'products_related'=>[]]);
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

    public function showfeedbackslist(){
        $feedbacks_list = Feedback::getFeedbacks();
        return view('ad-showfeedback')->with('feedbacks_list', $feedbacks_list);
    }

    public function update_rating(Request $request)
    {   
        Feedback::update_feedback_star(session('user_id'), $request->get('id'), $request->get('rating'), $request->get('time'));
        return 'success';
        
    }

    public function update_comment(Request $request)
    {   
        $feedback_star = Feedback::update_feedback_comment(session('user_id'), $request->get('id'), $request->get('comment'), $request->get('time'));
        return $feedback_star;
        
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
    public function show(Request $request, $category_para, $id)
    {
       $dressGroup = Category::where('group','Dress')->get();
       $commonGoup = Category::where('group','Common')->get();
       $beachGroup = Category::where('group','Beach')->get();


        $product = Product::find($id);
        $product->firm;
        $product->image;
        $product->category;
        // return $product;
        $category = Category::where('name',$category_para)->first();
        $products_related = $category->product()->take(12)->get();
        foreach($products_related as $pro){
            $pro->firm;
            $pro->image;
            $pro->category;
        }

       $dressGroup = Category::where('group','Dress')->get();
       $commonGoup = Category::where('group','Common')->get();
       $beachGroup = Category::where('group','Beach')->get();
       $comment_star = Feedback::getCommentAndStarOfUsers(session('user_id'), $id);

        return view('single', ['comment_star'=>$comment_star ,'category'=>$category_para, "product"=>$product, "products_related"=>$products_related,
        'dressGroup'=>$dressGroup, 'commonGroup'=>$commonGoup, 'beachGroup'=>$beachGroup,]);
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
        $product_id = $id;
        

        $product_name = $request->input('product_name');
        $product_size = $request->input('product_size');
        $product_color = $request->input('product_color');
        $product_quantity = $request->input('product_quantity');
        $product_description = $request->input('product_description');
        $product_price = $request->input('product_price');
        $category_name = $request->input('category_name');
        $firm_name = $request->input('firm_name');

        // $category = Category::where('name', '=', $category_name)->first();
        // $category_id = $category->categoryId;

        // $firm = Firm::where('name', '=', $firm_name)->first();
        // $firm_id = $firm->firmId;

        Product::updateProduct($product_id, $product_name, $product_size, $product_color, $product_quantity, $product_description, $product_price, $category_name, $firm_name);

        // $product->name = $product_name;
        // $product->size = (int)$product_size;
        // $product->color = strtoupper($product_color);
        // $product->quantity = (int)$product_quantity;
        // $product->description = $product_description;
        // $product->price = (int)$product_price;
        // $product->categoryId = $category_id;
        // $product->FirmId = $firm_id;
        // $product->save();

        $message = 'Product updated successfully';
        $url = '/detailproduct/'.$product_id;

        return redirect($url)->with('message', $message);

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

    public function delete($id)
    {   
        $product = Product::find($id);
        $category_name = $product->category->name;

        Product::deleteproduct($id);
        $url = '/productlist/'.$category_name;
        $message = 'Product deleted successfully';
        return redirect($url)->with('message', $message);
    }



    public function showproductlist($kind){
        $category_name = $kind;

        $product_list = Product::getProductByCategory($category_name);

        return view('ad-showproductlist')->with('product_list', $product_list);
    }

    public function showproductdetail($id){
        $id_product = $id;

        $product = Product::getProductById($id);

        return view('ad-showproductdetail')->with('product', $product);
    }

    public function showproductupdate($id){
        $id_product = $id;

        $product = Product::getProductById($id);
        $category_name = Category::select('name')->get();
        $firm_name = Firm::select('name')->get();

        return view('ad-showproductupdate')->with(['product' => $product, 
                                                   'category_name' => $category_name,
                                                   'firm_name' => $firm_name]);
    }

    public function showaddform(){
        $categories = Category::select('name')->get();
        $firms = Firm::select('name')->get();
        return view('ad-addproduct')->with(['categories' => $categories,
                                            'firms'     => $firms]);
    }


    public function addproduct(Request $request){

        
        $accepted_kind = array('jpg', 'jepg', 'png');

         $image1 = $request->file('image1');
         $kind1 = $image1->getClientOriginalExtension();

         $image2 = $request->file('image2');
         $kind2 = $image2->getClientOriginalExtension();
        
        $image3 = $request->file('image3');
         $kind3 = $image3->getClientOriginalExtension();
        
        $image4 = $request->file('image4');
         $kind4 = $image4->getClientOriginalExtension();
        
        
        if(in_array($kind1, $accepted_kind) && in_array($kind2, $accepted_kind)  && in_array($kind3, $accepted_kind)  && in_array($kind4, $accepted_kind)){
            $product_name = $request->input('product_name');
            $product_size = $request->input('product_size');
            $product_color = $request->input('product_color');
            $product_quantity = $request->input('product_quantity');
            $product_description = $request->input('product_description');
            $product_price = $request->input('product_price');
            $category_name = $request->input('category_name');
            $firm_name = $request->input('firm_name');

            $category = Category::where('name', '=', $category_name)->first();
            $category_id = $category->categoryId;

            $firm = Firm::where('name', '=', $firm_name)->first();
            $firm_id = $firm->firmId;

            $image1 = $request->file('image1');
            $image2 = $request->file('image2');
            $image3 = $request->file('image3');
            $image4 = $request->file('image4');
            
            Product::addProduct($product_name, $product_size, $product_color, $product_quantity, $product_description, $product_price, $category_id, $firm_id, $image1, $image2, $image3, $image4);

            $message = 'Product added successfully';
            $url = '/productlist/'.$category_name;

            return redirect($url)->with('message', $message);
        } else {
            $url = '/ad-addproduct';
            $message = 'Please upload images';
            return redirect($url)->with('message', $message);
        }
    }



}
