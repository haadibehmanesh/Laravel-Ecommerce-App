<?php
namespace App\Http\Controllers;

use App\BiProduct;
use App\BiCategory;
use Illuminate\Http\Request;
use App\BiOrder;
use App\BiOrderItem;
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

                $orderitems->push($item);
            }
        }
        $orderitems->shift();

        return OrderResource::collection($orderitems);
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
