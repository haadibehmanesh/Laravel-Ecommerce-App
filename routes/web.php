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


Route::get('/', 'MainpageController@index')->name('mainpage.index');

Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
Route::get('/empty', function () {
    Cart::destroy();
});

Route::get('/products', 'ShopController@index')->name('shop.index');
Route::get('/products/{product}/{category?}', 'ShopController@show')->name('shop.show');

Route::get('/category/{category}', 'ShopController@showCategory')->name('shop.showCategory');

Route::get('/checkout', 'CheckoutController@store')->name('checkout.store');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
