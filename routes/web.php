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


Route::get('/products', 'ShopController@index')->name('shop.index');
Route::get('/products/{product}/{category?}', 'ShopController@show')->name('shop.show');

Route::get('/category/{category}', 'ShopController@showCategory')->name('shop.showCategory');


Route::group(['prefix' => 'admin'], function () {
  Voyager::routes();
});

Route::group(['middleware' => 'customer' ], function() {
Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');
Route::post('/product/review', 'AjaxController@createReview')->name('review.create');
Route::get('/my-account', 'CostumerpanelController@index')->name('costumerpanel.index');
Route::post('/my-account/{id}', 'CostumerpanelController@dashboard')->name('costumerpanel.dashboard');
Route::post('/my-account/orders/{id}', 'CostumerpanelController@orders')->name('costumerpanel.orders');
Route::post('/my-account/order-info/{id}', 'CostumerpanelController@orderInfo')->name('costumerpanel.orderinfo');
Route::post('/my-account/order-item-info/{id}', 'CostumerpanelController@orderitemInfo')->name('costumerpanel.orderiteminfo');
Route::post('/my-account/editaccount/{id}', 'CostumerpanelController@edit')->name('costumerpanel.edit');
Route::post('/my-account/editprofile/{id}', 'CostumerpanelController@editprofile')->name('costumerpanel.editprofile');

Route::get('/dashboard', 'MerchantpanelController@index')->name('merchantpanel.index');
Route::post('/ajax/codeValidation', 'AjaxController@codeValidation')->name('merchantpanel.codeValidation');
Route::get('/dashboard/orders', 'MerchantpanelController@orders')->name('merchantpanel.orders');
Route::post('/dashboard/products', 'MerchantpanelController@products')->name('merchantpanel.products');
Route::get('/dashboard/editaccount', 'MerchantpanelController@edit')->name('merchantpanel.edit');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/getcategory/{category}','AjaxController@getCategory');
Route::post('/getcategory-slider/{category}','AjaxController@getCategorySlider');
Route::post('/getlist/{category}','AjaxController@getList');
Route::any('/ajax/products', 'AjaxController@getProduct');
Route::any('/ajax/products/main', 'AjaxController@getProductMain');
Route::any('/ajax/search', 'AjaxController@search');
Route::any('/search', 'SearchController@index')->name('search.index');


Route::group(['prefix' => 'customer'], function () {
  Route::get('/login', 'CustomerAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'CustomerAuth\LoginController@login');
  Route::post('/logout', 'CustomerAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'CustomerAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'CustomerAuth\RegisterController@register');

  Route::post('/password/email', 'CustomerAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'CustomerAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'CustomerAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'CustomerAuth\ResetPasswordController@showResetForm');
});
