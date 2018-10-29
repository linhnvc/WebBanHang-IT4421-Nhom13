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

Route::get('/', function () {
    return view('index');
})->name('home');

Route::post('checklogin', 'UserController@checklogin');

Route::post('/register', 'UserController@register');

Route::get('logout', ['as'=>'logout', function(){
    session()->flush();
    return redirect()->Route('home');
}]);

Route::post('/update', 'UserController@update');

Route::get('/about', function () {
    return view('about');
});

Route::get('/short_codes', function () {
    return view('short-codes');
});

Route::get('/mail', function () {
    return view('mail');
});

Route::get('products/{category_para}','ProductController@displayProductList');
// Route::get('/products/{category}',function () {
//     return view('dresses');
// });
// Route::get('/products/sweaters', function () {
//     return view('sweaters');
// });

Route::get('/shorts_and_skirts', function () {
    return view('sweaters');
});

Route::get('/salwars', function () {
    return view('salwars');
});

Route::get('/sandals', function () {
    return view('sandals');
});

Route::get('/boots', function () {
    return view('sandals');
});

Route::get('/hrrls', function () {
    return view('sandals');
});

Route::get('/flats', function () {
    return view('sandals');
});
Route::get('/checkout', function() {
    return view('checkout');
});
Route::resource('products','ProductController');