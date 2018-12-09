<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// })->name('home');
Route::get('/','ProductController@homePage')->name('home');

Route::get('myorders/{id}', 'BillController@showOrders');
Route::get('myorders/test/{id_bill}', 'BillController@showbilldetailofcm');
Route::get('/admin', 'AdminController@index');
Route::post('checklogin', 'UserController@checklogin');
Route::get('/billlist/thong_ke', 'BillController@thong_ke');

Route::post('/register', 'UserController@register');

Route::get('logout', ['as'=>'logout', function(){
    session()->flush();
    return redirect()->Route('home');
}]);

Route::post('/update', 'UserController@update');

Route::get('/about', function () {
    return view('about');
});

Route::get('/short_codes_2345', function () {
    return view('short-codes');
});

Route::get('/mail', function () {
    return view('mail');
});

Route::get('/dresses', function () {
    return view('dresses');
});

Route::get('/sweaters', function () {
    return view('sweaters');
});

Route::get('/shorts_and_skirts', function () {
    return view('skirts');
});

Route::get('/salwars', function () {
    return view('single');
});

Route::get('/sandals', function () {
    return view('sandals');
});

Route::get('/boots', function () {
    return view('sarees');
});

Route::get('/hrrls', function () {
    return view('sandals');
});

Route::get('/flats', function () {
    return view('sandals');
});

 ### ADMIN #####
Route::get('/ad-index', 'AdminController@index');
Route::post('/checkloginadmin', 'AdminController@checklogin');
Route::get('/logoutadmin', 'AdminController@logout');

Route::get('/productlist/{kind}', 'ProductController@showproductlist');

Route::get('/detailproduct/{id}', 'ProductController@showproductdetail');

Route::get('/productupdate/{id}', 'ProductController@showproductupdate');

Route::post('/update/{id}', 'ProductController@update');

Route::get('/deleteproduct/{id}', 'ProductController@delete');

Route::get('/ad-addproduct', 'ProductController@showaddform');

Route::post('/addproduct', 'ProductController@addproduct');

Route::get('/billlist', 'BillController@showbilllist');

Route::get('/userslist', 'UserController@showuserslist');

Route::get('/feedbackslist', 'ProductController@showfeedbackslist');

Route::get('/detailbill/{id}', 'BillController@showbilldetail');

Route::get('/orderdetail/{id}', 'BillController@showorderdetail');

Route::get('/billlist/update_checked', 'BillController@update_checked');

Route::get('/products/{category_para}/{id}/update_rating', 'ProductController@update_rating');

Route::get('/products/{category_para}/{id}/update_comment', 'ProductController@update_comment');

###############

##### MAIN PAGE ##############

Route::get('/products/{category_para}', 'ProductController@index');
Route::get('/products/{category_para}/{id}', 'ProductController@show');
Route::get('/search', 'ProductController@search');
Route::post('/addCart', 'CartController@addCart');
Route::get("/displayCart", "CartController@displayCart");
Route::post("/updateCart", "CartController@updateCart");
Route::post("/deleteProductCart", "CartController@deleteProductCart");

Route::post('/checkout/sendrequest', 'CheckoutController@sendRequest');
Route::get('/checkout/getresponse', 'CheckoutController@getResponse');