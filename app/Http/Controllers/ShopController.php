<?php

namespace App\Http\Controllers;
use App\BiOrder;
use Illuminate\Http\Request;
use App\BiProduct;
use App\BiCategory;
use App\BiSlider;
use App\BiSliderImage;
use App\BiReview;
use Illuminate\Support\Facades\Auth;
class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagination = 3;
        $allcategories = BiCategory::orderBy('sort_order', 'asc')->get();

        if(request()->category) {
            $products = BiProduct::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->category);
            });
            
        } else {
            $products = BiProduct::orderBy('id', 'desc')->paginate($pagination);
        }
        
        return view('layouts/shop/shop')->with([
            'products' => $products,
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
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug, $category = '')
    {  

       
        $slug_db = explode('/', $slug);
       
        $product = BiProduct::where('slug', $slug_db)->firstOrFail();
        
        $ProductId = $product->id;

        $id = Auth::guard('customer')->user()->id;
        
        $CustomerOrderItems = BiOrder::where('customer_id', $id)->where('status','completed')->with(['items']) ->whereHas('items', function($q) use ($ProductId){
            $q->where('bi_product_id',$ProductId); 
        })->first();

        $categoriesForProduct = $product->categories()->get();

        $mightAlsoLike = BiProduct::where('slug', '!=', $slug_db)->mightAlsoLike()->get();
        
        $allcategories = BiCategory::orderBy('sort_order', 'asc')->get();
        $reviews = BiReview::where('bi_product_id',$product->id)->orderBy('id', 'desc')->get();
       
        if(!empty($product->bimerchant()->first()->company_name)){
        $merchant_name = $product->bimerchant()->first()->company_name;
        }else{
        $merchant_name = 'بن اینجا';
        }
        if(empty($reviews)){
            $reviews = null;


        }
        
        
        if($category){
            $category = BiCategory::where('slug', $category)->get();
            return view('layouts/product/product')->with([
                'product' => $product,
                'reviews' => $reviews,
                'merchant_name' => $merchant_name,
                'mightAlsoLike' => $mightAlsoLike,
                'categoriesForProduct' => $categoriesForProduct,
                'categoryslug' => $category[0]->slug,
                'categoryname' => $category[0]->name,
                'allcategories' => $allcategories,
                'CustomerOrderItems' => $CustomerOrderItems,
            ]);
        }else{
            return view('layouts/product/product')->with([
                'product' => $product,
                'reviews' => $reviews,
                'merchant_name' => $merchant_name,
                'mightAlsoLike' => $mightAlsoLike,
                'categoriesForProduct' => $categoriesForProduct,
                'categoryslug' => $category,
                'allcategories' => $allcategories,
                'CustomerOrderItems' => $CustomerOrderItems,
            ]);
        }
        
    }

    public function showCategory($slug)
    {  
        $pagination = 9;
        
        $slug_db = explode('/', $slug);
       
        $category = BiCategory::where('slug', $slug_db)->firstOrFail();
       
        if(!empty($category->parent_id)){

            $categoryParent = $category->parent;
       
            
        }else{

            $categoryParent = null;
        }
        
        $productsForCategories = $category->products()->orderBy('id', 'desc')->paginate($pagination);
       
        $allcategories = BiCategory::orderBy('sort_order', 'asc')->get();
        
        $slider = BiSlider::where('name' , $category->name )->get();
        
        if(empty($slider[0])){
            
            $slider = BiSlider::where('name' , 'index' )->get();
        }
     
        $sliderimages = BiSliderImage::where('bi_slider_id', $slider[0]->id)->get();
        $featured_product = $category->products()->where('cat_featured', 1)->first();
        if($featured_product){

            $merchant_name = $featured_product->bimerchant()->first()->company_name;

        }else{
            $merchant_name = null;

        }
     //   $featured_product_name =$featured_product->products->id;
        //dd($merchant_name);
        return view('layouts/categories/category')->with([
            'categoryParent' => $categoryParent,
            'category' => $category,
            'featured_product' => $featured_product,
            'merchant_name' => $merchant_name,
            'productsForCategories' => $productsForCategories,
            'sliderimages' =>  $sliderimages,
            'allcategories' => $allcategories,
        ]);
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
