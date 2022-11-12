<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

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

Route::get('/user', [App\Http\Controllers\HomeController::class, 'user'])->name('auth.user');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/products/search', [App\Http\Controllers\ProductController::class, 'search'])->name('products.search');
Route::get('/products/product-details/{itemId}', [App\Http\Controllers\ProductController::class, 'show'])->name('product-details');

Route::resource('products', ProductController::class);

Route::get('/add-to-cart/{product}', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add')->middleware('auth');

Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart.index')->middleware('auth');
Route::get('/cart/destroy/{itemId}', [App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy')->middleware('auth');
Route::get('/cart/update/{itemId}', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update')->middleware('auth');
Route::get('/cart/checkout', [App\Http\Controllers\CartController::class, 'checkout'])->name('cart.checkout')->middleware('auth');

Route::resource('orders', OrderController::class)->middleware('auth');
Route::resource('shops', ShopController::class)->middleware('auth');

Route::get('paypal/checkout/{order}', [PayPalController::class, 'getExpressCheckout'])->name('paypal.checkout')->middleware('auth');
Route::get('paypal/checkout-success/{order}', [PayPalController::class, 'getCheckoutSuccess'])->name('paypal.success')->middleware('auth');
Route::get('paypal/checkout-cancel', [PayPalController::class, 'cancelPage'])->name('paypal.cancel')->middleware('auth');


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Voyager::routes();
});


