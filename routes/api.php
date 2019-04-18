<?php

use Illuminate\Http\Request;
use App\Http\Resources\Checkout as CheckoutResource;
use App\BiOrder;
use App\BiOrderItem;
use App\Wallet;
use App\BiProduct;
use App\Score;
use App\Invitation;
use App\Customer;

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
Route::group(['middleware' => 'auth:api'], function () {
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
///for all products in categories
Route::get('/allfeaturedProducts', 'ApiController@allfetchFeatured')->name('Api.allfetchFeatured');
Route::get('/allrestaurants', 'ApiController@allfetchRestaurants')->name('Api.allfetchRestaurants');
Route::get('/allentertainments', 'ApiController@allfetchEntertainments')->name('Api.allfetchEntertainments');
Route::get('/allhealth', 'ApiController@allfetchHealth')->name('Api.allfetchHealth');
Route::get('/allbeauty', 'ApiController@allfetchBeauty')->name('Api.allfetchBeauty');
Route::get('/alltraining', 'ApiController@allfetchTraining')->name('Api.allfetchTraining');
Route::get('/allcinema', 'ApiController@allfetchCinema')->name('Api.allfetchCinema');
Route::get('/allservice', 'ApiController@allfetchService')->name('Api.allfetchService');
Route::get('/allshops', 'ApiController@allfetchShops')->name('Api.allfetchShops');
Route::get('/sendtobank', 'ApiController@sendToBank')->name('Api.sendToBank');
Route::get('/sendtobankwallet', 'ApiController@sendToBankCharge')->name('Api.sendToBankCharge');


Route::post('children', 'ApiController@fetchChildren');
Route::post('userinfo', 'ApiController@fetchUserInfo');
Route::post('productinfo', 'ApiController@fetchProductInfo');
Route::post('order', 'ApiController@fetchOrders');
Route::post('search', 'ApiController@fetchSearch');
Route::post('charge', 'ApiController@addToWallet');
Route::any('callback/from/bank/charge', function () {
  //$allcategories = BiCategory::where('state','MainMenu')->orderBy('sort_order', 'asc')->get();
  try {
    $gateway = \Gateway::verify();
    $trackingCode = $gateway->trackingCode();
    $refId = $gateway->refId();
    $cardNumber = $gateway->cardNumber();
    $wallet_status = 'completed';
    $wallet = Wallet::where('ref_id', $refId)->first();
    $customer_id = $wallet->customer_id;
    $customer = Customer::where('id',$customer_id)->first();
    $wallet->status = $wallet_status;
    $wallet->tracking_code = $trackingCode;
    $wallet->save();
    //dd($wallet);   
     if($wallet->status == 'completed'){
      try{
        $sms = \Melipayamak::sms();
        $to = $customer->phone;
       
        $from = '200020001090';
        
        $text = "شارژ شما به مبلغ :"." ".$wallet->balance." تومان "."\n"."با موفقیت انجام شد"."\n"."سامانه خرید و تخفیف گروهی بن اینجا"."\n"."https://www.boninja.com/my-account";
        $response = $sms->send($to,$from,$text);
        $json = json_decode($response);
      
      }catch(Exception $e){
        echo $e->getMessage();
      }
    }

    $message = 'شارژ کیف پول با موفقیت انجام شد!<br> 
     کد پیگیری بانکی شما : ' . $trackingCode . ' <br>
     برای پیگیری های  بانکی بعدی این کد را نزد خود نگه دارید. 
     ';

    return view('layouts/api/callback')->with([

      'message' => $message
    ]);
  } catch (Exception $e) {
    $error = $e->getMessage();
    return view('layouts/api/callback')->with([

      'error' => $error
    ]);
  }
});

Route::post('checkout', 'ApiController@checkout');
Route::any('callback/from/bank', function () {
  //  $allcategories = BiCategory::where('state','MainMenu')->orderBy('sort_order', 'asc')->get();
  try {
    $gateway = \Gateway::verify();
    $trackingCode = $gateway->trackingCode();
    $refId = $gateway->refId();
    $cardNumber = $gateway->cardNumber();
    // dd($trackingCode);

    $order_status = 'completed';
    $order = BiOrder::where('ref_id', $refId)->first();
    $customer_id = $order->customer_id;
    $customer = Customer::where('id',$customer_id)->first();
    $order->update(['status' => $order_status]);
    $order_items = BiOrderItem::where('bi_order_id', $order->id)->get();
    
      if($order->status == 'completed'){
        /*
        if(session()->has('coupon')){
          $customer_id = session()->get('coupon')['customer_id'];
          $coupon_id = session()->get('coupon')['coupon_id'];
          $customerCouponNew = new CustomerBiCoupon;
          $customerCouponNew->customer_id = $customer_id;
          $customerCouponNew->bi_coupon_id = $coupon_id;
          $customerCouponNew->save();
  
        }
        */
        foreach ($order_items as $item) {
          $product = BiProduct::find($item->id);
          $productSold = (($product->quantity-$product->sold) - $item->qty) >= 0 ? $product->sold + $item->qty : -1 ;
          if( $productSold >= 0) {
                  $product->sold = $productSold;
                  $product->save();     
              } 
        }
      }
     
      foreach($order_items as $order_item){ 
        if(empty($order_item->product->date_available)){ 
          if(empty($order_item->product->end_date)){
              if($order_item->product->parent_id != 0){
                  if(empty($order_item->product->parent->date_available)){
                  $dbdate = $order_item->product->parent->end_date;
                  $dbdate = date('Y/m/d', strtotime($dbdate));
                  $dbdate = date('Y/m/d', strtotime($dbdate. ' + 10 days'));
                  $ydate = date('Y', strtotime($dbdate));  
                  $mdate = date('m', strtotime($dbdate));  
                  $ddate = date('d', strtotime($dbdate)); 
                  $date = g2p($ydate,$mdate ,$ddate); 
                  }else{
                  $dbdate = $order_item->product->parent->date_available;
                  $dbdate = date('Y/m/d', strtotime($dbdate));
                  //$dbdate = date('Y/m/d', strtotime($dbdate. ' + 10 days'));
                  $ydate = date('Y', strtotime($dbdate));  
                  $mdate = date('m', strtotime($dbdate));  
                  $ddate = date('d', strtotime($dbdate)); 
                  $date = g2p($ydate,$mdate ,$ddate);
                  }  
              }
          }else{
              $dbdate = $order_item->product->end_date;
              $dbdate = date('Y/m/d', strtotime($dbdate));
              $dbdate = date('Y/m/d', strtotime($dbdate. ' + 10 days'));
              $ydate = date('Y', strtotime($dbdate));  
              $mdate = date('m', strtotime($dbdate));  
              $ddate = date('d', strtotime($dbdate)); 
              $date = g2p($ydate,$mdate ,$ddate);
          }
        }else{
          $dbdate = $order_item->product->date_available;
          $dbdate = date('Y/m/d', strtotime($dbdate));
          //$dbdate = date('Y/m/d', strtotime($dbdate. ' + 10 days'));
          $ydate = date('Y', strtotime($dbdate));  
          $mdate = date('m', strtotime($dbdate));  
          $ddate = date('d', strtotime($dbdate)); 
          $date = g2p($ydate,$mdate ,$ddate);
        }
  
        try{
          $sms = \Melipayamak::sms();
          $to = $customer->phone;
         
          $from = '200020001090';
          if(!empty($order_item->product->parent->name)){
            $text = $order_item->name."\n".$order_item->product->parent->name."\n"."تعداد : ".$order_item->quantity."\n"."کد تخفیف شما : ".$order_item->code."\n"."مهلت استفاده : ".$date[0]."/".$date[1]."/".$date[2]."\n"."سامانه خريد و تخفيف گروهی بن اينجا"."\n"."https://www.boninja.com/my-account";
  
          }else{
            $text = $order_item->name."\n"."تعداد : ".$order_item->quantity."\n"."کد تخفیف شما : ".$order_item->code."\n"."مهلت استفاده : ".$date[0]."/".$date[1]."/".$date[2]."\n"."سامانه خريد و تخفيف گروهی بن اينجا"."\n"."https://www.boninja.com/my-account";
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
      $wallet_status = 'completed';
      
      $id = $customer->id;
      
      $wallet_last = Wallet::where('customer_id', $id)->where('ref_id', $refId)->orderBy('id','desc')->first();
      //dd($wallet_last);
      if(!empty($wallet_last)){
        $wallet_last->status = $wallet_status;     
        $wallet_last->tracking_code = $trackingCode;     
        $wallet_last->save();
      }
      $total = $order->total;
      $portion = floor($total/10000);
      if($portion > 0){
        $score = Score::firstOrNew(['customer_id' => $customer->id]);
        $score->value = $score->value + (5*$portion);
        $score->save();
    
        $invitation = Invitation::where('customer_id',$customer->id)->first();
        if(!empty($invitation->code)){
            $inviter = Customer::where('invitation_code', $invitation->code)->first();
            if(!empty($inviter->id)){
                $score = Score::firstOrNew(['customer_id' => $inviter->id]);
                $score->value = $score->value + (5*$portion);
                $score->save();
            }
        }
      } 
      /*Cart::destroy();  
      if(session()->has('coupon')){
        session()->forget('coupon');
      }
*/
    $message = 'پرداخت با موفقیت انجام شد!<br> 
       کد پیگیری بانکی شما : ' . $trackingCode . ' <br>
       برای پیگیری های  بانکی بعدی این کد را نزد خود نگه دارید. 
       ';
    return view('layouts/api/callback')->with([

      'message' => $message
    ]);
    /*
       return view('layouts/checkout/bankresult')->with([
        'allcategories' => $allcategories,
        'message' => $message
        ]);
    */
    // return CheckoutResource::collection($message);

  } catch (Exception $e) {
    $error = $e->getMessage();
    return view('layouts/api/callback')->with([

      'error' => $error
    ]);
    /* return view('layouts/checkout/bankresult')->with([
        'allcategories' => $allcategories,
        'error' => $error
        ]);*/
    //  dd($error);
    // return CheckoutResource::collection($error);
  }
});



Route::post('subcat', 'ApiController@fetchSubCats');
Route::post('subcatproducts', 'ApiController@fetchSubCatProducts')->name('Api.fetchSubCatProducts');