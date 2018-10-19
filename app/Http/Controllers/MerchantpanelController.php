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
       
        $orderItem = BiOrderItem::where('bi_merchant_id', $merchant->id)->get();

        $totalSell = $orderItem->sum(function ($item) {
            return $item->price * $item->code_used_count;
        });
        $boninja = $orderItem->sum(function ($item) {
            return ($item->product->price*($item->product->boninja_percent/100))* $item->code_used_count;
        });
        
        $totalRevenue = $totalSell - $boninja ;
        $allcategories = BiCategory::orderBy('sort_order', 'asc')->get();
        return view('layouts/dashboard/merchant-panel')->with([
            'totalSell' => $totalSell,
            'totalRevenue' => $totalRevenue,
            'allcategories' => $allcategories,
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
        $products = BiProduct::where('bi_merchant_id', $merchant->id)->orderBy('id', 'desc')->get();
        return view('layouts/dashboard/ajax-merchant-products')->with('products', $products)->render();
    }

    public function orders()
    {

        $allcategories = BiCategory::orderBy('sort_order', 'asc')->get();
        return view('layouts/dashboard/merchant-orders')->with('allcategories', $allcategories);


    }
}
