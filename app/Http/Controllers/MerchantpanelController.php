<?php

namespace App\Http\Controllers;
use App\BiCategory;
use App\BiProduct;
use App\BiMerchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\BiOrderItem;
class MerchantpanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer_id = Auth::guard('customer')->user()->id;
       
        $merchant = BiMerchant::where('customer_id',$customer_id)->first();
       // dd($merchant->pre_discount);
       
       
        $orderItem = BiOrderItem::where('bi_merchant_id', $merchant->id)->get();

        $totalSell = $orderItem->sum(function ($item) {
            return $item->price * $item->code_used_count;
        });
        
        if(!empty($merchant->pre_discount) && $merchant->pre_discount == 1){

            $boninja = $orderItem->sum(function ($item) {
                return ($item->product->price*($item->product->boninja_percent/100))* $item->code_used_count;
            });

        }else{

            $boninja = $orderItem->sum(function ($item) {
                return ($item->price*($item->product->boninja_percent/100))* $item->code_used_count;
            });
        }

        
        
        $totalRevenue = $totalSell - $boninja ;
        $allcategories = BiCategory::orderBy('sort_order', 'asc')->get();
        return view('layouts/dashboard/merchant-panel')->with([
            'totalSell' => $totalSell,
            'totalRevenue' => $totalRevenue,
            'allcategories' => $allcategories,
            'orderitem' => $orderItem
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
        //
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
    
    public function products(Request $request)
    {
        $customer_id = Auth::guard('customer')->user()->id;
        $merchant = BiMerchant::where('customer_id',$customer_id)->first();
        //$products = BiProduct::where('bi_merchant_id', $merchant->id)->orderBy('id', 'desc')->get();
        $order_items = BiOrderItem::where('bi_merchant_id', $merchant->id)->where('code_used_count','>','0')->orderBy('id', 'desc')->get();
       // dd($products);
        return view('layouts/dashboard/ajax-merchant-products')->with([
            'order_items' => $order_items,
            'merchant' => $merchant
        
        ])->render();
    }

    public function orders()
    {

        $allcategories = BiCategory::orderBy('sort_order', 'asc')->get();
        return view('layouts/dashboard/merchant-orders')->with('allcategories', $allcategories);


    }
}
