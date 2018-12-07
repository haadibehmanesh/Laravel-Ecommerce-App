<?php

namespace App\Http\Controllers;

use App\BiOrder;
use App\BiCategory;
use App\Wallet;
use App\BiOrderItem;
use App\BiProduct;
use Validator;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allcategories = BiCategory::orderBy('sort_order', 'asc')->get();
        $customer_id = Auth::guard('customer')->user()->id;
        $wallets = Wallet::where('customer_id', $customer_id)->orderBy('id','desc')->get();
        $wallet_last = Wallet::where('customer_id', $customer_id)->where('status','completed')->orderBy('id','desc')->first();
        if(!empty($wallet_last)){
            $total = $wallet_last->total;
        }else{
            $total = 0 ;
        }
        return view('layouts/my-account/wallet')->with([
        'allcategories' => $allcategories,
        'wallets' => $wallets,
        'total' => $total
        ]);
        
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
    public function charge(Request $request)
    {  
        $customer_id = Auth::guard('customer')->user()->id;
        $messages = [
            'required' => 'پر کردن این فیلد اجباری است!',
            'numeric' => 'ورودی باید به صورت عدد باشد',
            'integer' => 'ورودی باید به صورت عدد باشد',
            'min' => 'ورودی نمی تواند 0 یا منفی باشد',
        ];
        $validatedData = Validator::make($request->all(), [
            'price' => 'required|numeric|integer|min:1'
        ],$messages);
        if(!$validatedData->fails()){
            $wallet = Wallet::where('customer_id', $customer_id)->where('status','completed')->orderBy('updated_at', 'desc')->first();
            
            if(!empty($wallet)){
                $total = $wallet->total;

            }else{
                $total = 0 ;
            }
            $wallet = new Wallet();
            $wallet->customer_id = $customer_id;
            $wallet->status = 'processing';
            $wallet->balance =  $request->price;
            $wallet->total = $total + $request->price;
            $wallet->save();

            try {
                $gateway = \Gateway::mellat();
                $gateway->setCallback(url('callback/from/bank/charge'));
                $gateway->price($wallet->balance*10)->ready();
                $refId =  $gateway->refId();
                $transID = $gateway->transactionId();
                // Your code here
                $wallet->update(['ref_id' => $refId]); 
                return $gateway->redirect();
            } catch (Exception $e) {
                $message = $e->getMessage();
                return view('layouts/checkout/bankresult')->with([
                    'allcategories' => $allcategories,
                    'message' => $message
                ]);
            }
          
               
            $message="";
            return redirect()->back()->withErrors([
            'message' => $message
            ]);

        }else{
            return redirect()->back()->withErrors($validatedData);
        }
       
       /* $allcategories = BiCategory::orderBy('sort_order', 'asc')->get();
            $wallet_status = 'pending';
            $wallet = BiOrder::create([
                'customer_id' => $customer_id,
                'status' => $order_status,
                'balance' => $total,
                'order_code' => $order_code,
                'customer_id' => $customer_id,
            ]);
        foreach (Cart::content() as $item) {
            
            $code = randomDigits(8);
            $product = BiProduct::find($item->id);
            $productSold = (($product->quantity-$product->sold) - $item->qty) >= 0 ? $product->sold + $item->qty : -1 ;
            
            if( $productSold >= 0) {
                
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
        }*/
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
   
}
