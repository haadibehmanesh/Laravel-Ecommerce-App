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

Route::get('/my-account', 'CostumerpanelController@index')->name('costumerpanel.index');
Route::get('/my-account/orders', 'CostumerpanelController@orders')->name('costumerpanel.orders');
Route::get('/my-account/editaccount', 'CostumerpanelController@edit')->name('costumerpanel.edit');

Route::get('/dashboard', 'MerchantpanelController@index')->name('merchantpanel.index');
Route::get('/dashboard/orders', 'MerchantpanelController@orders')->name('merchantpanel.orders');
Route::get('/dashboard/products', 'MerchantpanelController@products')->name('merchantpanel.products');
Route::get('/dashboard/editaccount', 'MerchantpanelController@edit')->name('merchantpanel.edit');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/getcategory/{category}','AjaxController@getCategory');
