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
    return view('layouts/home');
});


Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');

Route::get('/products', 'ShopController@index')->name('shop.index');
Route::get('/products/{product}/{category?}', 'ShopController@show')->name('shop.show');
Route::get('/category/{category}', 'ShopController@showCategory')->name('shop.showCategory');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
