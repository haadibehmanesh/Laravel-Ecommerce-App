<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'API\CustomerController@login');
Route::post('register', 'API\CustomerController@register');
Route::group(['middleware' => 'auth:api'], function(){
Route::post('details', 'API\CustomerController@details');
});

//Route::get('/aboutus', 'AboutusController@index')->name('Api.index');
Route::get('/featuredProducts', 'ApiController@fetchFeatured')->name('Api.fetchFeatured');
Route::get('/restaurants', 'ApiController@fetchRestaurants')->name('Api.fetchRestaurants');
Route::get('/entertainments', 'ApiController@fetchEntertainments')->name('Api.fetchEntertainments');
Route::get('/health', 'ApiController@fetchHealth')->name('Api.fetchHealth');
Route::get('/beauty', 'ApiController@fetchBeauty')->name('Api.fetchBeauty');
Route::get('/training', 'ApiController@fetchTraining')->name('Api.fetchTraining');
Route::get('/cinema', 'ApiController@fetchCinema')->name('Api.fetchCinema');
Route::get('/service', 'ApiController@fetchService')->name('Api.fetchService');
Route::get('/shops', 'ApiController@fetchShops')->name('Api.fetchShops');
