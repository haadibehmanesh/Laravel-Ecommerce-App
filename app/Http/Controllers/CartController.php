<?php

namespace App\Http\Controllers;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\BiProduct;
use App\BiCoupon;
use App\BiCategory;
use App\BiOrder;
use App\BiOrderItem;
use App\Wallet;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        if(Auth::guard('customer')->check()){
            $customer_id = Auth::guard('customer')->user()->id;
            $wallet_last = Wallet::where('customer_id', $customer_id)->where('status','completed')->orderBy('id','desc')->first();
        }
        if(!empty($wallet_last)){
            $total = $wallet_last->total;
        }else{
            $total = 0 ;
        }
        
        $allcategories = BiCategory::orderBy('sort_order', 'asc')->get();
        return view('layouts/cart/cart')->with([
            'allcategories' => $allcategories,
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
    public function store(Request $request)
    {
        $product = BiProduct::where('id', $request->id)->get();
        
        $id = $request->id;

        $orders = BiOrder::where('order_status_id', 1)->with(['items' => function ($q) use ($id) {
            $q->where('bi_product_id', $id);
        }])->get();

        $processingRequests = 0;

        foreach ($orders as $order) {
            
            if (isset($order->items[0]->quantity))
                $processingRequests += $order->items[0]->quantity;                
        } 

        $orderLimit = $product[0]->quantity - $product[0]->sold - $processingRequests;

        if ($orderLimit > 0) {
            Cart::add($request->id, $product[0]->name, 1, presentPrice($product[0]->price, $product[0]->discount), [
                'order_limit' => $orderLimit,
                'bi_merchant_id' => $product[0]->bi_merchant_id
            ])->associate('App\BiProduct');
            return redirect()->route('cart.index')->with('success_message', 'بن شما با موفقیت اضافه شد');
        }
        return redirect()->route('cart.index')->with('error_message', 'موجودی به اتمام رسیده است');
        
    }
    public function addtocart(Request $request){
        $product = BiProduct::where('id', $request->id)->get();
        
        $id = $request->id;

        $orders = BiOrder::where('order_status_id', 1)->with(['items' => function ($q) use ($id) {
            $q->where('bi_product_id', $id);
        }])->get();

        $processingRequests = 0;

        foreach ($orders as $order) {
            
            if (isset($order->items[0]->quantity))
                $processingRequests += $order->items[0]->quantity;                
        } 

        $orderLimit = $product[0]->quantity - $product[0]->sold - $processingRequests;

        if ($orderLimit > 0) {
            Cart::add($request->id, $product[0]->name, 1, presentPrice($product[0]->price, $product[0]->discount), [
                'order_limit' => $orderLimit,
                'bi_merchant_id' => $product[0]->bi_merchant_id
            ])->associate('App\BiProduct');
            $message = "بن شما با موفقیت به سبد خرید اضافه شد";
           return view('layouts/product/ajax-addtocart')->with([
                'message' => $message
            ])->render();
        }
        $message = "موجودی به اتمام رسیده است";
        return view('layouts/product/ajax-addtocart')->with([
            'message' => $message
        ])->render();
        
        //redirect()->route('cart.index')->with('error_message', 'موجودی به اتمام رسیده است');
    }

    /**
     * Display the specified resource.
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
        $messages = [
            'required' => 'پر کردن این فیلد اجباری است!',
        ];
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between:1,100'
        ],$messages);

        if ($validator->fails()) {
            session()->flash('errors', collect(['تعداد بیش از 100 عدد است']));
            return response()->json(['success' => false], 400);
        }

        Cart::update($id, $request->quantity);
        session()->flash('success_message', 'تعداد به خوبی بروز رسانی شد');
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        Cart::remove($id);

        return back()->with('success_message', 'حذف با موفقیت انجام شد!');
    }
    public function checkCoupon(Request $request){

        $validator = Validator::make($request->all(), [
            'coupon_code' => 'required'
        ]);

        if ($validator->fails()) {
            
            return back()->with('coupon_message', 'لطفا کد تخفیف را وارد کنید!');
        }else{
            $coupon = BiCoupon::where('code', $request->coupon_code)->first();
            if(!empty($coupon)){
                $categoriesForCoupon = $coupon->categories()->get();
                foreach (Cart::content() as $item ){
                    $product = BiProduct::where('id',$item->id)->first();
                    $categoriesForProduct = $product->categories()->get();
                    $result = array_intersect($categoriesForCoupon, $array2);
                    dd($result);
                    foreach($categoriesForProduct as $categoriesForProduct){
                       
                        //$check = $coupon->categories()->find($productCat->id);
                        dd($check);
                    }
                    
                    //dd($check);

                }
                
                //dd($categoriesForCoupon);
                return back()->with(['coupon_message' => $coupon->code]);
            }else{
                return back()->with('coupon_message', 'کد تخفیف معتبر نیست!');
            }
            

        }
    }
}
