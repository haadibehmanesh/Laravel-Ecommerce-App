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
        $merchant_id = Auth::guard('customer')->user()->id;
        $products = BiProduct::where('bi_merchant_id', $merchant_id)->get();
        $totalSell = $products->sum(function ($product) {
            return $product->price * $product->sold;
        });
        $boninja = $products->sum(function ($product) {
            return ($product->price*($product->boninja_percent/100))* $product->sold;
        });
        $totalRevenue = $totalSell - $boninja ;
       // dd($totalRevenue);
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
        $merchant_id = Auth::guard('customer')->user()->id;
        $products = BiProduct::where('bi_merchant_id', $merchant_id)->orderBy('id', 'desc')->get();
        return view('layouts/dashboard/ajax-merchant-products')->with('products', $products)->render();
    }

    public function orders()
    {

        $allcategories = BiCategory::orderBy('sort_order', 'asc')->get();
        return view('layouts/dashboard/merchant-orders')->with('allcategories', $allcategories);


    }
}
