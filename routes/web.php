<?php
use App\BiOrder;
use App\BiOrderItem;
use App\BiProduct;
use App\BiCategory;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Request;
//use Melipayamak;
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

Route::any('callback/from/bank',function(){
  $allcategories = BiCategory::orderBy('sort_order', 'asc')->get();
  try {
    $gateway = \Gateway::verify();
    $trackingCode = $gateway->trackingCode();
    $refId = $gateway->refId();
    $cardNumber = $gateway->cardNumber();
    $order_status = 'completed';
    $order = BiOrder::where('ref_id', $refId)->first();
    $order->update(['status' => $order_status]);     
    $order_items = BiOrderItem::where('bi_order_id', $order->id)->get();
    
    if($order->status == 'completed'){
      foreach (Cart::content() as $item) {
        $product = BiProduct::find($item->id);
        $productSold = (($product->quantity-$product->sold) - $item->qty) >= 0 ? $product->sold + $item->qty : -1 ;
        if( $productSold >= 0) {
                $product->sold = $productSold;
                $product->save();     
            } 
      }
    }
    
    foreach($order_items as $order_item){ 
          $ydate = date('Y', strtotime($order_item->product->date_available));  
          $mdate = date('m', strtotime($order_item->product->date_available));  
          $ddate = date('d', strtotime($order_item->product->date_available));  
          $date = g2p($ydate,$mdate ,$ddate);
      try{
        $sms = \Melipayamak::sms();
        $to = Auth::guard('customer')->user()->phone;
       
        $from = '200020001090';
        if(!empty($order_item->product->parent->name)){
          $text = $order_item->name."\n".$order_item->product->parent->name."\n"."تعداد : ".$order_item->quantity."\n"."کد تخفیف شما : ".$order_item->code."\n"."مهلت استفاده : ".$date[0]."/".$date[1]."/".$date[2]."\n"."بن اینجا"."\n"."https://www.boninja.com/my-account";

        }else{
          $text = $order_item->name."\n"."تعداد : ".$order_item->quantity."\n"."کد تخفیف شما : ".$order_item->code."\n"."مهلت استفاده : ".$date[0]."/".$date[1]."/".$date[2]."\n"."بن اینجا"."\n"."https://www.boninja.com/my-account";
        }
        
       // $text = $order_item->product->parent->name;
        $response = $sms->send($to,$from,$text);
        $json = json_decode($response);
        //dd($json);
        //echo $json->Value; //RecId or Error Number 
      }catch(Exception $e){
        echo $e->getMessage();
      }    
    }
    Cart::destroy();  
    $message = 'پرداخت با موفقیت انجام شد!<br> 
     کد پیگیری بانکی شما : '.$trackingCode.' <br>
     برای پیگیری های  بانکی بعدی این کد را نزد خود نگه دارید. 
     ';

     return view('layouts/checkout/bankresult')->with([
      'allcategories' => $allcategories,
      'message' => $message
      ]);
    
  } catch (Exception $e) {
    $error = $e->getMessage();
    return view('layouts/checkout/bankresult')->with([
      'allcategories' => $allcategories,
      'error' => $error
      ]);
  }
});
Route::get('/', 'MainpageController@index')->name('mainpage.index');
Route::get('/rules', 'RulesController@index')->name('rules.index');
Route::get('/aboutus', 'AboutusController@index')->name('aboutus.index');
Route::get('/contactus', 'ContactusController@index')->name('contactus.index');
Route::get('/cooperation', 'CooperationController@index')->name('cooperation.index');
Route::post('/cooperation', 'CooperationController@store')->name('cooperation.store');

Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.store');
Route::post('/ajax/addtocart', 'CartController@addtocart')->name('cart.addtocart');
Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');


Route::get('/products', 'ShopController@index')->name('shop.index');
Route::get('/products/{product}/{category?}', 'ShopController@show')->name('shop.show');

Route::any('/category/{category}', 'ShopController@showCategory')->name('shop.showCategory');


Route::group(['prefix' => 'admin'], function () {
  Voyager::routes();
});

Route::group(['middleware' => 'customer' ], function() {
Route::get('/checkout', 'CheckoutController@index')->name('checkout.index');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');
Route::post('/product/review', 'AjaxController@createReview')->name('review.create');
Route::get('/my-account', 'CostumerpanelController@index')->name('costumerpanel.index');
Route::get('/my-account/customer', 'CostumerpanelController@showsold')->name('costumerpanel.showsold');
//Route::post('/my-account/{id}', 'CostumerpanelController@dashboard')->name('costumerpanel.dashboard');
Route::get('/my-account/orders', 'CostumerpanelController@orders')->name('costumerpanel.orders');
Route::post('/my-account/orderDetail', 'CostumerpanelController@orderitem')->name('costumerpanel.orderitem');
//Route::post('/my-account/order-info', 'CostumerpanelController@orderInfo')->name('costumerpanel.orderinfo');
//Route::post('/my-account/order-item-info/{id}', 'CostumerpanelController@orderitemInfo')->name('costumerpanel.orderiteminfo');
Route::post('/my-account/editaccount/{id}', 'CostumerpanelController@edit')->name('costumerpanel.edit');
Route::post('/my-account/editprofile/{id}', 'CostumerpanelController@editprofile')->name('costumerpanel.editprofile');

Route::get('/dashboard', 'MerchantpanelController@index')->name('merchantpanel.index');
Route::post('/ajax/codeValidation', 'AjaxController@codeValidation')->name('merchantpanel.codeValidation');
Route::post('/ajax/couponshow', 'AjaxController@couponShow')->name('merchantpanel.couponShow');
Route::get('/dashboard/orders', 'MerchantpanelController@orders')->name('merchantpanel.orders');
Route::any('/dashboard/products', 'MerchantpanelController@products')->name('merchantpanel.products');
Route::get('/dashboard/editaccount', 'MerchantpanelController@edit')->name('merchantpanel.edit');
Route::get('/dashboard/withdraw', 'MerchantpanelController@withdraw')->name('merchantpanel.withdraw');
Route::post('/dashboard/withdraw', 'MerchantpanelController@sendwithdraw')->name('merchantpanel.sendwithdraw');

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

  //Route::post('/password/email', 'CustomerAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password', 'CustomerAuth\ForgotPasswordController@sendResetSms')->name('password.request');
  Route::get('/password', 'CustomerAuth\ForgotPasswordController@redirection')->name('password.redirection');
 // Route::post('/password/reset', 'CustomerAuth\ResetPasswordController@reset')->name('password.email');
  Route::post('/password/reset', 'CustomerAuth\ForgotPasswordController@passChange')->name('password.change');
  Route::get('/password/reset', 'CustomerAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'CustomerAuth\ResetPasswordController@showResetForm');
});
Route::redirect('/login', 301);
Route::redirect('/register', 301);
Route::redirect('/home', 301);
