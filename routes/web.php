<?php

use Illuminate\Support\Facades\Route;
use App\ProductCategory;

Route::Auth();


Route::get('/logout',function(){
    Auth::logout();
    return redirect()->route('/');
});

//Google login
Route::get('login/{social}', 'Auth\LoginController@redirectToProvider')->where('social','twitter|facebook|google');;
Route::get('login/{social}/callback', 'Auth\LoginController@handleProviderCallback')->where('social','twitter|facebook|google');;

Route::get('/','HomePageController@index')->name('/');
Route::get('/shop','ShopController@index')->name('shop.index');
Route::get('/shop/{product}','ShopController@show')->name('shop.show');
Route::get('/search/{discount}','ShopController@discount')->name('shop.discount');
//For Search
Route::get('/search','ShopController@search')->name('search');

    //Wishlist
    Route::get('/wishlist','WishListController@index')->name('wishlist.index')->middleware('auth');
    Route::post('/wishlist','WishListController@store')->name('wishlist.store')->middleware('auth');
    Route::post('/wishlist/destroy/{id}','WishListController@destroy')->name('wishlist.destroy')->middleware('auth');

//Order List
Route::get('/order','WishListController@order')->name('wishlist.order')->middleware('auth');

//For Cart
Route::get('/cart','CartController@index')->name('cart.index');
Route::get('/cart-update','CartController@update')->name('cart.update');
Route::get('/cart/destroy','CartController@destroy')->name('cart.destroy');
Route::post('/cart','CartController@store')->name('cart.store');
Route::post('/cart/{id}','CartController@remove')->name('cart.remove');



//For Checkout
Route::get('/checkout','CheckoutController@index')->name('checkout.index')->middleware('auth');
Route::post('/checkout','CheckoutController@store')->name('checkout.store')->middleware('auth');

//For User Setting
Route::get('/setting', 'UserController@index')->name('setting');
Route::patch('/updateUser/{id}', 'UserController@updateUser')->name('updateUser');
Route::post('/updatePassword/{id}', 'UserController@updatePassword')->name('updatePassword');

//For category dropdown
Route::get('/json-subcategories','Voyager\ProductsController@subcategories');
Route::get('/json-childcategories','Voyager\ProductsController@childcategories');
//User Upload
Route::view('/upload','userUpload');

//Other Pages
Route::view('/contact','contact')->name('contact');
Route::view('/help','help')->name('help');
Route::view('/about','about')->name('about');
Route::view('/emergency','emergency')->name('emergency');


//Worldcup 2018
Route::get('/worldcup','WorldcupController@index')->name('worldcup.index');
Route::post('/worldcup','WorldcupController@store')->name('worldcup.store');
Route::get('/group', function(){
	return view('group');
})->name('group');
Route::get('/wallchart', function(){
	return view('wallchart');
})->name('wallchart');
Route::get('/winner', 'WorldcupController@winner')->name('winner');




Route::group(['prefix' => 'helpme'], function () {
    Voyager::routes();
});

Auth::routes();

