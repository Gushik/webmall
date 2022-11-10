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

Route::redirect('/', '/home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/my_account','HomeController@my_account')->name('my_account');

//Route::get('/my_account','HomeController@allUser')->name('allUser');
Route::get ('product-card','HomeController@product-card')->name('product-card');
Route::get ('/hot-offers','HomeController@hotOffers')->name('hot-offers');

Route::get ('/product/_single_product','HomeController@attribute')->name('product._single_product');
Route::get ('/test','AttributeController@index')->name('test');
Route::get('/products/filter', 'ProductController@filter')->name('products.filter');
Route::get('/products/search', 'ProductController@search')->name('products.search');
Route::get('/products/searchBrend', 'ProductController@searchBrend')->name('products.searchBrend');
Route::get('/products/show', 'ProductController@show')->name('products.show');
Route::resource('products', 'ProductController');



//Route::get('/index', 'AttributeController@index')->name('index');
Route::resource('attribute','AttributeController');
Route::resource('categories','CategoryController');

Route::get('/add-to-cart/{product}', 'CartController@add')->name('cart.add')->middleware('auth');
Route::get('/cart', 'CartController@index')->name('cart.index')->middleware('auth');
Route::get('/cart/destroy/{itemId}', 'CartController@destroy')->name('cart.destroy')->middleware('auth');
Route::get('/cart/update/{itemId}', 'CartController@update')->name('cart.update')->middleware('auth');
Route::get('/cart/checkout', 'CartController@checkout')->name('cart.checkout')->middleware('auth');
Route::get('/cart/apply-coupon', 'CartController@applyCoupon')->name('cart.coupon')->middleware('auth');

Route::resource('orders', 'OrderController')->only('store')->middleware('auth');

Route::resource('shops','ShopController')->middleware('auth');


Route::get('paypal/checkout/{order}', 'PayPalController@getExpressCheckout')->name('paypal.checkout');
Route::get('paypal/checkout-success/{order}', 'PayPalController@getExpressCheckoutSuccess')->name('paypal.success');
Route::get('paypal/checkout-cancel', 'PayPalController@cancelPage')->name('paypal.cancel');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('/order/pay/{suborder}', 'SubOrderController@pay')->name('order.pay');
});


Route::group(['prefix' => 'seller', 'middleware' => 'auth', 'as' => 'seller.', 'namespace' => 'Seller'], function () {

    Route::redirect('/','seller/orders');

    Route::resource('/orders',  'OrderController');

    Route::get('/orders/delivered/{suborder}',  'OrderController@markDelivered')->name('order.delivered');
});
