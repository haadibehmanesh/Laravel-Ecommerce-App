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
Route::any('captcha-test', function()
{
    if (Request::getMethod() == 'POST')
    {
        $rules = ['captcha' => 'required|captcha'];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
        {
            echo '<p style="color: #ff0000;">Incorrect!</p>';
        }
        else
        {
            echo '<p style="color: #00ff30;">Matched :)</p>';
        }
    }

    $form = '<form method="post" action="captcha-test">';
    $form .= '<input type="hidden" name="_token" value="' . csrf_token() . '">';
    $form .= '<p>' . captcha_img() . '</p>';
    $form .= '<p><input type="text" name="captcha"></p>';
    $form .= '<p><button type="submit" name="check">Check</button></p>';
    $form .= '</form>';
    return $form;
});

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
Route::get('/my-account', 'CostumerpanelController@index')->name('costumerpanel.index');
Route::post('/my-account/{id}', 'CostumerpanelController@dashboard')->name('costumerpanel.dashboard');
Route::post('/my-account/orders/{id}', 'CostumerpanelController@orders')->name('costumerpanel.orders');
Route::post('/my-account/editaccount/{id}', 'CostumerpanelController@edit')->name('costumerpanel.edit');
Route::post('/my-account/editprofile/{id}', 'CostumerpanelController@editprofile')->name('costumerpanel.editprofile');

Route::get('/dashboard', 'MerchantpanelController@index')->name('merchantpanel.index');
Route::post('/ajax/codeValidation', 'AjaxController@codeValidation')->name('merchantpanel.codeValidation');
Route::get('/dashboard/orders', 'MerchantpanelController@orders')->name('merchantpanel.orders');
Route::get('/dashboard/products', 'MerchantpanelController@index')->name('merchantpanel.products');
Route::get('/dashboard/editaccount', 'MerchantpanelController@edit')->name('merchantpanel.edit');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/getcategory/{category}','AjaxController@getCategory');
Route::post('/getlist/{category}','AjaxController@getList');
Route::post('/ajax/products', 'AjaxController@getProduct');
Route::post('/ajax/products/main', 'AjaxController@getProductMain');
Route::post('/ajax/search', 'AjaxController@search');
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
