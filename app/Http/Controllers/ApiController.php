<?php
namespace App\Http\Controllers;

use App\BiProduct;
use App\BiCategory;
use Illuminate\Http\Request;
use App\BiOrder;
use App\BiOrderItem;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\FeaturedProducts as FeaturedProductsResource;
use App\Http\Resources\FetchRestaurants as FetchRestaurantsResource;
use App\Http\Resources\FetchEntertainments as FetchEntertainmentsResource;
use App\Http\Resources\FetchHealth as FetchHealthResource;
use App\Http\Resources\FetchBeauty as FetchBeautyResource;
use App\Http\Resources\FetchTraining as FetchTrainingResource;
use App\Http\Resources\FetchCinema as FetchCinemaResource;
use App\Http\Resources\FetchService as FetchServiceResource;
use App\Http\Resources\FetchShops as FetchShopsResource;
use App\Http\Resources\Children as ChildrenResource;
use App\Http\Resources\Order as OrderResource;
use App\Http\Resources\Search as SearchResource;
use App\Http\Resources\Checkout as CheckoutResource;
use App\Http\Resources\ProductInfo as ProductInfoResource;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { }
    public function fetchFeatured()
    {


        if (\Request::isJson()) {

            $featuredProducts = BiProduct::where('status', 1)->where('parent_id', 0)->where('featured', '1')->orderBy('id', 'asc')->get();
            return FeaturedProductsResource::collection($featuredProducts);
        }
    }
    public function fetchRestaurants()
    {
        $slug = 'رستوران-و-کافی-شاپ';

        if (\Request::isJson()) {
            $category = BiCategory::where('slug', $slug)->firstOrFail();
            $productsForCategories = $category->products()->orderBy('id', 'desc')->where('parent_id', 0)->where('status', 1)->take(7)->get();
            // $featuredProducts = BiProduct::where('status',1)->where('parent_id', 0)->where('featured','1')->orderBy('id', 'asc')->get();
            return FetchRestaurantsResource::collection($productsForCategories);
        }
    }
    public function fetchEntertainments()
    {

        $slug = 'تفریح-و-ورزش';

        if (\Request::isJson()) {
            $category = BiCategory::where('slug', $slug)->firstOrFail();

            $productsForCategories = $category->products()->orderBy('id', 'desc')->where('parent_id', 0)->where('status', 1)->take(7)->get();
            // $featuredProducts = BiProduct::where('status',1)->where('parent_id', 0)->where('featured','1')->orderBy('id', 'asc')->get();
            return FetchEntertainmentsResource::collection($productsForCategories);
        }
    }
    public function fetchHealth()
    {

        $slug = 'پزشکی-و-سلامت';

        if (\Request::isJson()) {
            $category = BiCategory::where('slug', $slug)->firstOrFail();

            $productsForCategories = $category->products()->orderBy('id', 'desc')->where('parent_id', 0)->where('status', 1)->take(7)->get();
            // $featuredProducts = BiProduct::where('status',1)->where('parent_id', 0)->where('featured','1')->orderBy('id', 'asc')->get();
            return fetchHealthResource::collection($productsForCategories);
        }
    }
    public function fetchBeauty()
    {

        $slug = 'آرایشی-و-زیبایی';

        if (\Request::isJson()) {
            $category = BiCategory::where('slug', $slug)->firstOrFail();

            $productsForCategories = $category->products()->orderBy('id', 'desc')->where('parent_id', 0)->where('status', 1)->take(7)->get();
            // $featuredProducts = BiProduct::where('status',1)->where('parent_id', 0)->where('featured','1')->orderBy('id', 'asc')->get();
            return fetchBeautyResource::collection($productsForCategories);
        }
    }
    public function fetchTraining()
    {

        $slug = 'آموزشی';

        if (\Request::isJson()) {
            $category = BiCategory::where('slug', $slug)->firstOrFail();

            $productsForCategories = $category->products()->orderBy('id', 'desc')->where('parent_id', 0)->where('status', 1)->take(7)->get();
            // $featuredProducts = BiProduct::where('status',1)->where('parent_id', 0)->where('featured','1')->orderBy('id', 'asc')->get();
            return FetchTrainingResource::collection($productsForCategories);
        }
    }
    public function fetchCinema()
    {

        $slug = 'هنر-و-تئاتر';

        if (\Request::isJson()) {
            $category = BiCategory::where('slug', $slug)->firstOrFail();

            $productsForCategories = $category->products()->orderBy('id', 'desc')->where('parent_id', 0)->where('status', 1)->take(7)->get();
            // $featuredProducts = BiProduct::where('status',1)->where('parent_id', 0)->where('featured','1')->orderBy('id', 'asc')->get();
            return FetchCinemaResource::collection($productsForCategories);
        }
    }
    public function fetchService()
    {

        $slug = 'خدمات';

        if (\Request::isJson()) {
            $category = BiCategory::where('slug', $slug)->firstOrFail();

            $productsForCategories = $category->products()->orderBy('id', 'desc')->where('parent_id', 0)->where('status', 1)->take(7)->get();
            // $featuredProducts = BiProduct::where('status',1)->where('parent_id', 0)->where('featured','1')->orderBy('id', 'asc')->get();
            return FetchServiceResource::collection($productsForCategories);
        }
    }
    public function fetchShops()
    {

        $slug = 'بن-های-فروشگاهی';

        if (\Request::isJson()) {
            $category = BiCategory::where('slug', $slug)->firstOrFail();

            $productsForCategories = $category->products()->orderBy('id', 'desc')->where('parent_id', 0)->where('status', 1)->take(7)->get();
            // $featuredProducts = BiProduct::where('status',1)->where('parent_id', 0)->where('featured','1')->orderBy('id', 'asc')->get();
            return FetchShopsResource::collection($productsForCategories);
        }
    }

    /////for all products in categories

    public function allfetchShops()
    {

        $slug = 'بن-های-فروشگاهی';

        if (\Request::isJson()) {
            $category = BiCategory::where('slug', $slug)->firstOrFail();

            $productsForCategories = $category->products()->orderBy('id', 'desc')->where('parent_id', 0)->where('status', 1)->get();
            // $featuredProducts = BiProduct::where('status',1)->where('parent_id', 0)->where('featured','1')->orderBy('id', 'asc')->get();
            return FetchShopsResource::collection($productsForCategories);
        }
    }
    public function allfetchService()
    {

        $slug = 'خدمات';

        if (\Request::isJson()) {
            $category = BiCategory::where('slug', $slug)->firstOrFail();

            $productsForCategories = $category->products()->orderBy('id', 'desc')->where('parent_id', 0)->where('status', 1)->get();
            // $featuredProducts = BiProduct::where('status',1)->where('parent_id', 0)->where('featured','1')->orderBy('id', 'asc')->get();
            return FetchServiceResource::collection($productsForCategories);
        }
    }

    public function allfetchCinema()
    {

        $slug = 'هنر-و-تئاتر';

        if (\Request::isJson()) {
            $category = BiCategory::where('slug', $slug)->firstOrFail();

            $productsForCategories = $category->products()->orderBy('id', 'desc')->where('parent_id', 0)->where('status', 1)->get();
            // $featuredProducts = BiProduct::where('status',1)->where('parent_id', 0)->where('featured','1')->orderBy('id', 'asc')->get();
            return FetchCinemaResource::collection($productsForCategories);
        }
    }

    public function allfetchTraining()
    {

        $slug = 'آموزشی';

        if (\Request::isJson()) {
            $category = BiCategory::where('slug', $slug)->firstOrFail();

            $productsForCategories = $category->products()->orderBy('id', 'desc')->where('parent_id', 0)->where('status', 1)->get();
            // $featuredProducts = BiProduct::where('status',1)->where('parent_id', 0)->where('featured','1')->orderBy('id', 'asc')->get();
            return FetchTrainingResource::collection($productsForCategories);
        }
    }
    public function allfetchBeauty()
    {

        $slug = 'آرایشی-و-زیبایی';

        if (\Request::isJson()) {
            $category = BiCategory::where('slug', $slug)->firstOrFail();

            $productsForCategories = $category->products()->orderBy('id', 'desc')->where('parent_id', 0)->where('status', 1)->get();
            // $featuredProducts = BiProduct::where('status',1)->where('parent_id', 0)->where('featured','1')->orderBy('id', 'asc')->get();
            return fetchBeautyResource::collection($productsForCategories);
        }
    }

    public function allfetchHealth()
    {

        $slug = 'پزشکی-و-سلامت';

        if (\Request::isJson()) {
            $category = BiCategory::where('slug', $slug)->firstOrFail();

            $productsForCategories = $category->products()->orderBy('id', 'desc')->where('parent_id', 0)->where('status', 1)->get();
            // $featuredProducts = BiProduct::where('status',1)->where('parent_id', 0)->where('featured','1')->orderBy('id', 'asc')->get();
            return fetchHealthResource::collection($productsForCategories);
        }
    }

    public function allfetchEntertainments()
    {

        $slug = 'تفریح-و-ورزش';

        if (\Request::isJson()) {
            $category = BiCategory::where('slug', $slug)->firstOrFail();

            $productsForCategories = $category->products()->orderBy('id', 'desc')->where('parent_id', 0)->where('status', 1)->get();
            // $featuredProducts = BiProduct::where('status',1)->where('parent_id', 0)->where('featured','1')->orderBy('id', 'asc')->get();
            return FetchEntertainmentsResource::collection($productsForCategories);
        }
    }

    public function allfetchRestaurants()
    {
        $slug = 'رستوران-و-کافی-شاپ';

        if (\Request::isJson()) {
            $category = BiCategory::where('slug', $slug)->firstOrFail();
            $productsForCategories = $category->products()->orderBy('id', 'desc')->where('parent_id', 0)->where('status', 1)->get();
            // $featuredProducts = BiProduct::where('status',1)->where('parent_id', 0)->where('featured','1')->orderBy('id', 'asc')->get();
            return FetchRestaurantsResource::collection($productsForCategories);
        }
    }

    public function fetchChildren(Request $request)
    {


        // dd($request);
        $children = BiProduct::where('parent_id', $request->id)->orderBy('sort_order', 'desc')->where('status', 1)->get();
        // dd($children);
        return ChildrenResource::collection($children);
    }
    public function fetchOrders(Request $request)
    {

        $id = $request->id;
        $customerorders = BiOrder::where('customer_id', $id)->whereIn('status', ['completed', 'completed_W'])->orderBy('id', 'desc')->get();

        $orderitems = $customerorders->first()->items;


        foreach ($customerorders as $order) {
            foreach ($order->items as $item) {
                $img = $item->product->image;
                $Sydate = date('Y', strtotime($item->updated_at));
                $Smdate = date('m', strtotime($item->updated_at));
                $Sddate = date('d', strtotime($item->updated_at));
                $Sdate = g2p($Sydate, $Smdate, $Sddate);
                $Sdate = array_slice($Sdate, 0, 3);
                $Sdate = join("/", $Sdate);
                $item->setAttribute('startDate', $Sdate);
                //
                if (empty($item->product->date_available)) {
                    if (empty($item->product->end_date)) {
                        if ($item->product->parent_id != 0) {
                            if (empty($item->product->parent->date_available)) {
                                $dbdate = $item->product->parent->end_date;
                                $dbdate = date('Y/m/d', strtotime($dbdate));
                                $dbdate = date('Y/m/d', strtotime($dbdate . ' + 10 days'));
                                $ydate = date('Y', strtotime($dbdate));
                                $mdate = date('m', strtotime($dbdate));
                                $ddate = date('d', strtotime($dbdate));
                                $date = g2p($ydate, $mdate, $ddate);
                                $date = array_slice($date, 0, 3);
                                $date = join("/", $date);
                            } else {
                                $dbdate = $item->product->parent->date_available;
                                $dbdate = date('Y/m/d', strtotime($dbdate));
                                //$dbdate = date('Y/m/d', strtotime($dbdate. ' + 10 days'));
                                $ydate = date('Y', strtotime($dbdate));
                                $mdate = date('m', strtotime($dbdate));
                                $ddate = date('d', strtotime($dbdate));
                                $date = g2p($ydate, $mdate, $ddate);
                                $date = array_slice($date, 0, 3);
                                $date = join("/", $date);
                            }
                        }
                    } else {
                        $dbdate = $item->product->end_date;
                        $dbdate = date('Y/m/d', strtotime($dbdate));
                        $dbdate = date('Y/m/d', strtotime($dbdate . ' + 10 days'));
                        $ydate = date('Y', strtotime($dbdate));
                        $mdate = date('m', strtotime($dbdate));
                        $ddate = date('d', strtotime($dbdate));
                        $date = g2p($ydate, $mdate, $ddate);
                        $date = array_slice($date, 0, 3);
                        $date = join("/", $date);
                    }
                } else {
                    $dbdate = $item->product->date_available;
                    $dbdate = date('Y/m/d', strtotime($dbdate));
                    //$dbdate = date('Y/m/d', strtotime($dbdate. ' + 10 days'));
                    $ydate = date('Y', strtotime($dbdate));
                    $mdate = date('m', strtotime($dbdate));
                    $ddate = date('d', strtotime($dbdate));
                    $date = g2p($ydate, $mdate, $ddate);
                    $date = array_slice($date, 0, 3);
                    $date = join("/", $date);
                }

                $item->setAttribute('endDate', $date);
                $item->setAttribute('image', $img);
                $orderitems->push($item);
            }
        }
        $orderitems->shift();

        return OrderResource::collection($orderitems);
    }


    public function fetchSearch(Request $request)
    {

        $products = BiProduct::search($request->text)->where('parent_id', 0)->where('status', 1)->get();

        return SearchResource::collection($products);
    }

    public function checkout(Request $request)
    {

        $customer_id = $request->id;
        $total = $request->price;
        if(!empty($customer_id) && !empty($total)){
            $cartProducts = $request->cartProducts;

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
    
    
            foreach ($cartProducts as $item) {
    
                $code = randomDigits(8);
    
                $product = BiProduct::find($item['id']);
                $productSold = (($product->quantity - $product->sold) - $item['qty']) >= 0 ? $product->sold + $item['qty'] : -1;
    
                if ($productSold >= 0) {
    
                    $orderitem = BiOrderItem::firstOrNew(
                        [
                            'bi_order_id' => $order->id,
                            'name' => $item['name'],
                            'quantity' => $item['qty']
                        ]
                    );
                    $orderitem->bi_order_id = $order->id;
                    $orderitem->code = $code;
                    $orderitem->name = $item['name'];
                    $orderitem->price = $item['price'];
                    $orderitem->quantity =  $item['qty'];
                    $orderitem->total = $item['qty'] * $item['price'];
                    $orderitem->bi_product_id = $item['id'];
                    $orderitem->bi_merchant_id = $item['bi_merchant_id'];
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
        }
        
        
            
    }
    public function sendToBank(){
        $customer_id = (int)Input::get('id');
        $total = Input::get('total');
        $total = (int)$total;
        if(!empty($customer_id) && !empty($total) && $total != 0){
          
        $order = BiOrder::where('customer_id',$customer_id)->where('total',$total)->orderBy('id', 'desc')->first();
        //dd($order);
        try {
            $gateway = \Gateway::mellat();
            $gateway->setCallback(url('api/callback/from/bank'));
            $gateway->price($total*10)->ready();
            $refId =  $gateway->refId();
            $transID = $gateway->transactionId();
            // Your code here
            $order->update(['ref_id' => $refId]); 
            return $gateway->redirect();
        } catch (Exception $e) {
            $message = $e->getMessage();
            //dd($message);
            return view('layouts/checkout/bankresult')->with([
                'allcategories' => $allcategories,
                'message' => $message
            ]);
        }
    }


    }

    public function fetchProductInfo(Request $request)
    {


        // dd($request);
        $info = BiProduct::where('id', $request->id)->where('status', 1)->get();
        // dd($children);
        return ProductInfoResource::collection($info);
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
    //Api
    public function ApiIndex()
    {
        if (\Request::isJson()) {
            $allcategories = BiCategory::where('state', 'MainMenu')->orderBy('sort_order', 'asc')->get();

            return AboutusResource::collection($allcategories);
        } else {
            dd('no');
        }
    }
}
