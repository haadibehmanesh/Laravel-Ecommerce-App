<?php

namespace App\Http\Controllers;
use App\Customer;
use App\BiOrder;
use App\BiCategory;
use App\BiOrderItem;
use App\BiProduct;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use App\Wallet;
use App\Score;
use App\Invitation;


class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            return redirect()->route('shop.index');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $allcategories = BiCategory::where('state','MainMenu')->orderBy('sort_order', 'asc')->get();
        $customer_id = Auth::guard('customer')->user()->id;
        $total = Cart::subtotal();
        $portion = floor($total/10000);
        if($request->wallet == "on"){
            $wallet = Wallet::where('customer_id', $customer_id)->where('status','completed')->orderBy('id','desc')->first();
            if($wallet->total >= $total){
                $order_code = randomDigits(8);
                $invoice_no = randomDigits(6);
                $order_status = 'pending';
              
                
                    $order = BiOrder::create([
                    'invoice_no' => $invoice_no,
                    'status' => $order_status,
                    'total' => $total,
                    'order_code' => $order_code,
                    'customer_id' => $customer_id,
                ]);
                
/*
                $order = BiOrder::firstOrNew(
                    ['status' => $order_status], ['customer_id' => $customer_id]
                );
                $order->invoice_no =  $invoice_no;
                $order->status = $order_status;
                $order->total = $total;
                $order->order_code = $order_code;
                $order->customer_id = $customer_id;
                $order->save();
                */
                foreach (Cart::content() as $item) {
                    
                    $code = randomDigits(8);
                    $product = BiProduct::find($item->id);
                    $productSold = (($product->quantity-$product->sold) - $item->qty) >= 0 ? $product->sold + $item->qty : -1 ;
                    
                    if( $productSold >= 0) {
                        /*
                        $orderitem = BiOrderItem::create([
                            'bi_order_id' => $order->id,
                            'code' => $code,
                            'name' => $item->name,
                            'price' => $item->price,
                            'quantity' => $item->qty,
                            'total' => $item->subtotal,
                            'bi_product_id' => $item->id,
                            'bi_merchant_id' => $item->options['bi_merchant_id']
                            ]);
                            */
                            $orderitem = BiOrderItem::firstOrNew(
                                ['bi_order_id' => $order->id,
                                    'name' => $item->name,
                                    'quantity' => $item->qty
                                ]
                            );
                            $orderitem->bi_order_id = $order->id;
                            $orderitem->code = $code;
                            $orderitem->name = $item->name;
                            $orderitem->price = $item->price;
                            $orderitem->quantity =  $item->qty;
                            $orderitem->total = $item->subtotal;
                            $orderitem->bi_product_id = $item->id;
                            $orderitem->bi_merchant_id = $item->options['bi_merchant_id'];
                            $orderitem->save();
                            
                        } else {
                            $success_message = null;
                            $error_message = 'موجودی بن کافی نیست';
                            return view('layouts/cart/cart')->with([
                                'allcategories' => $allcategories,
                                'success_message' => $success_message,
                                'error_message' => $error_message
                            ]);
                        } 
                    }
                    $order_status = 'completed_W';
                    $order->update(['status' => $order_status]);     
                    $order_items = BiOrderItem::where('bi_order_id', $order->id)->get();
                    if($order->status == 'completed_W'){
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
                            $to = Auth::guard('customer')->user()->phone;                    
                            $from = '200020001090';
                            if(!empty($order_item->product->parent->name)){
                                $text = $order_item->name."\n".$order_item->product->parent->name."\n"."تعداد : ".$order_item->quantity."\n"."کد تخفیف شما : ".$order_item->code."\n"."مهلت استفاده : ".$date[0]."/".$date[1]."/".$date[2]."\n"."سامانه خريد و تخفيف گروهی بن اينجا"."\n"."https://www.boninja.com/my-account";
                    
                            }else{
                                $text = $order_item->name."\n"."تعداد : ".$order_item->quantity."\n"."کد تخفیف شما : ".$order_item->code."\n"."مهلت استفاده : ".$date[0]."/".$date[1]."/".$date[2]."\n"."سامانه خريد و تخفيف گروهی بن اينجا"."\n"."https://www.boninja.com/my-account";
                            }
                        
                            $response = $sms->send($to,$from,$text);
                            $json = json_decode($response);
                        }catch(Exception $e){
                        echo $e->getMessage();
                        }    
                    }
                    Cart::destroy();
                    $message = 'پرداخت با موفقیت انجام شد!';
                    $wallet->total = $wallet->total - $total;
                    $wallet->save();
                    if($portion > 0){
                        $score = Score::firstOrNew(['customer_id' => $customer_id]);
                        $score->value = $score->value + 5;
                        $score->save();
                    
                        $invitation = Invitation::where('customer_id',$customer_id)->first();
                        if(!empty($invitation->code)){
                            $inviter = Customer::where('invitation_code', $invitation->code)->first();
                            if(!empty($inviter->id)){
                                $score = Score::firstOrNew(['customer_id' => $inviter->id]);
                                $score->value = $score->value + 5;
                                $score->save();
                            }
                        }
                    }
                    //dd($wallet->total);
                    return view('layouts/checkout/bankresult')->with([
                        'allcategories' => $allcategories,
                        'message' => $message
                    ]);



            }else{
                $diff = $total - $wallet->total;

                $order_code = randomDigits(8);
                $invoice_no = randomDigits(6);
                $order_status = 'pending';
                
                $order = BiOrder::create([
                    'invoice_no' => $invoice_no,
                    'status' => $order_status,
                    'total' => $diff,
                    'order_code' => $order_code,
                    'customer_id' => $customer_id,
                ]);
                
                /*
                $order = BiOrder::firstOrNew(
                    ['status' => $order_status], ['customer_id' => $customer_id]
                );
                $order->invoice_no =  $invoice_no;
                $order->status = $order_status;
                $order->total = $total;
                $order->order_code = $order_code;
                $order->customer_id = $customer_id;
                $order->save();
                */
                foreach (Cart::content() as $item) {
                    
                    $code = randomDigits(8);
                    $product = BiProduct::find($item->id);
                    $productSold = (($product->quantity-$product->sold) - $item->qty) >= 0 ? $product->sold + $item->qty : -1 ;
                    
                    if( $productSold >= 0) {
                        /*
                        $orderitem = BiOrderItem::create([
                            'bi_order_id' => $order->id,
                            'code' => $code,
                            'name' => $item->name,
                            'price' => $item->price,
                            'quantity' => $item->qty,
                            'total' => $item->subtotal,
                            'bi_product_id' => $item->id,
                            'bi_merchant_id' => $item->options['bi_merchant_id']
                            ]);
                            */
                            $orderitem = BiOrderItem::firstOrNew(
                                ['bi_order_id' => $order->id,
                                'name' => $item->name,
                                'quantity' => $item->qty
                                ]
                            );
                            $orderitem->bi_order_id = $order->id;
                            $orderitem->code = $code;
                            $orderitem->name = $item->name;
                            $orderitem->price = $item->price;
                            $orderitem->quantity =  $item->qty;
                            $orderitem->total = $item->subtotal;
                            $orderitem->bi_product_id = $item->id;
                            $orderitem->bi_merchant_id = $item->options['bi_merchant_id'];
                            $orderitem->save();
                            
                            //$product->sold = $productSold;
                            //$product->save();
                            
                            //  $success_message = 'درحال انتقال به درگاه بانک';
                            //  $error_message = null;
                            //Cart::destroy();
                            
                        } else {
                            $success_message = null;
                            $error_message = 'موجودی بن کافی نیست';
                            return view('layouts/cart/cart')->with([
                                'allcategories' => $allcategories,
                                'success_message' => $success_message,
                                'error_message' => $error_message
                            ]);
                            //Cart::destroy();
                        } 
                    }
                    $walletNew = new Wallet();
                    $walletNew->customer_id = $customer_id; 
                    $walletNew->total = 0 ;
                    $walletNew->status = 'difference';
                    $walletNew->save();
                    try {
                        $gateway = \Gateway::mellat();
                        $gateway->setCallback(url('callback/from/bank'));
                        $gateway->price($diff*10)->ready();
                        $refId =  $gateway->refId();
                        $transID = $gateway->transactionId();
                        // Your code here
                        $walletNew->update(['ref_id' => $refId]); 
                        $order->update(['ref_id' => $refId]); 
                        return $gateway->redirect();
                    } catch (Exception $e) {
                        $message = $e->getMessage();
                        return view('layouts/checkout/bankresult')->with([
                            'allcategories' => $allcategories,
                            'message' => $message
                        ]);
                    }
                //dd($diff);
            }            
           
        }else{
            //dd("off");
            $order_code = randomDigits(8);
            $invoice_no = randomDigits(6);
            $order_status = 'pending';
            
            $order = BiOrder::create([
                'invoice_no' => $invoice_no,
                'status' => $order_status,
                'total' => $total,
                'order_code' => $order_code,
                'customer_id' => $customer_id,
            ]);
            
            /*
            $order = BiOrder::firstOrNew(
                ['status' => $order_status], ['customer_id' => $customer_id]
            );
            $order->invoice_no =  $invoice_no;
            $order->status = $order_status;
            $order->total = $total;
            $order->order_code = $order_code;
            $order->customer_id = $customer_id;
            $order->save();
            */
            foreach (Cart::content() as $item) {
                
                $code = randomDigits(8);
                $product = BiProduct::find($item->id);
                $productSold = (($product->quantity-$product->sold) - $item->qty) >= 0 ? $product->sold + $item->qty : -1 ;
                
                if( $productSold >= 0) {
                    /*
                    $orderitem = BiOrderItem::create([
                        'bi_order_id' => $order->id,
                        'code' => $code,
                        'name' => $item->name,
                        'price' => $item->price,
                        'quantity' => $item->qty,
                        'total' => $item->subtotal,
                        'bi_product_id' => $item->id,
                        'bi_merchant_id' => $item->options['bi_merchant_id']
                        ]);
                        */
                        $orderitem = BiOrderItem::firstOrNew(
                            ['bi_order_id' => $order->id,
                            'name' => $item->name,
                            'quantity' => $item->qty
                            ]
                        );
                        $orderitem->bi_order_id = $order->id;
                        $orderitem->code = $code;
                        $orderitem->name = $item->name;
                        $orderitem->price = $item->price;
                        $orderitem->quantity =  $item->qty;
                        $orderitem->total = $item->subtotal;
                        $orderitem->bi_product_id = $item->id;
                        $orderitem->bi_merchant_id = $item->options['bi_merchant_id'];
                        $orderitem->save();
                        
                        //$product->sold = $productSold;
                        //$product->save();
                        
                        //  $success_message = 'درحال انتقال به درگاه بانک';
                        //  $error_message = null;
                        //Cart::destroy();
                        
                    } else {
                        $success_message = null;
                        $error_message = 'موجودی بن کافی نیست';
                        return view('layouts/cart/cart')->with([
                            'allcategories' => $allcategories,
                            'success_message' => $success_message,
                            'error_message' => $error_message
                        ]);
                        //Cart::destroy();
                    } 
                } 
                
                try {
                $gateway = \Gateway::mellat();
                $gateway->setCallback(url('callback/from/bank'));
                $gateway->price($total*10)->ready();
                $refId =  $gateway->refId();
                $transID = $gateway->transactionId();
                // Your code here
                $order->update(['ref_id' => $refId]); 
                return $gateway->redirect();
            } catch (Exception $e) {
                $message = $e->getMessage();
                return view('layouts/checkout/bankresult')->with([
                    'allcategories' => $allcategories,
                    'message' => $message
                ]);
            }

        }
        
    }



    public function callback(){
        
        try {
        $gateway = \Gateway::verify();
        $trackingCode = $gateway->trackingCode();
        $refId = $gateway->refId();
        $cardNumber = $gateway->cardNumber();
        
        // عملیات خرید با موفقیت انجام شده است
        // در اینجا کالا درخواستی را به کاربر ارائه میکنم
        $order_status = 'completed';
        
        $order = BiOrder::where('ref_id', $refId)->update(['status' => $order_status]);
        Cart::destroy();

        } catch (Exception $e) {
            $order_status = 'notverified';
            $order = BiOrder::where('ref_id', $refId)->update(['status' => $order_status]);
            echo $e->getMessage();
        }
    }
    /**
     * Display the specifieuse App\BiOrderBiProduct;d resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    protected function addToOrdersTables($request, $error)
    {
        // Insert into orders table
        $order = Order::create([
            'user_id' => auth()->user() ? auth()->user()->id : null,
            'billing_email' => $request->email,
            'billing_name' => $request->name,
            'billing_address' => $request->address,
            'billing_city' => $request->city,
            'billing_province' => $request->province,
            'billing_postalcode' => $request->postalcode,
            'billing_phone' => $request->phone,
            'billing_name_on_card' => $request->name_on_card,
            'billing_discount' => getNumbers()->get('discount'),
            'billing_discount_code' => getNumbers()->get('code'),
            'billing_subtotal' => getNumbers()->get('newSubtotal'),
            'billing_tax' => getNumbers()->get('newTax'),
            'billing_total' => getNumbers()->get('newTotal'),
            'error' => $error,
        ]);

        // Insert into order_product table
        foreach (Cart::content() as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->model->id,
                'quantity' => $item->qty,
            ]);
        }

        return $order;
    }
}
