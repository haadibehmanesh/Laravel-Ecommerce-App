<?php

namespace App\Http\Controllers;

use App\BiOrder;
use App\BiCategory;
use App\BiOrderItem;
use App\BiProduct;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

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
    public function store()
    {  
        $customer_id = Auth::guard('customer')->user()->id;
        $allcategories = BiCategory::orderBy('sort_order', 'asc')->get();
        foreach (Cart::content() as $item) {
            $code = randomDigits(8);
            $total = Cart::subtotal();
            $product = BiProduct::find($item->id);
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
