<?php

namespace App\Http\Controllers;
use App\BiProduct;
use App\BiCategory;
use App\BiSlider;
use App\BiSliderImage;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\BiOrderItem;
use App\BiMerchant;
use Illuminate\Support\Facades\Auth;
use Validator;

class AjaxController extends Controller {
    
    public function getCategory($slug)
    {  
        $pagination = 9;
        
        $slug_db = explode('/', $slug);
       
        $category = BiCategory::where('slug', $slug_db)->firstOrFail();
       
      
        $productsForCategories = $category->products()->orderBy('id', 'desc')->paginate($pagination);
        $allcategories = BiCategory::orderBy('sort_order', 'asc')->get();
        
        return view('layouts/categories/ajaxcat')->with([
            'category' => $category,
            'productsForCategories' => $productsForCategories,
            'allcategories' => $allcategories,
        ])->render();
        
    }

    public function getCategorySlider($slug)
    {  
        //$pagination = 9;
        
        $slug_db = explode('/', $slug);
       
        $category = BiCategory::where('slug', $slug_db)->firstOrFail();
      
        //$productsForCategories = $category->products()->orderBy('id', 'desc')->paginate($pagination);
        
        //$allcategories = BiCategory::orderBy('sort_order', 'asc')->get();
        
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
       // dd($merchant_name);
     //   $featured_product_name =$featured_product->products->id;
       
        return view('layouts/categories/ajaxslider')->with([
            'category' => $category,
            'featured_product' => $featured_product,
            'merchant_name' => $merchant_name,
            'sliderimages' =>  $sliderimages,
          
        ])->render();
        
    }
    public function getList($slug)
    {  
        $pagination = 9;
        
        $slug_db = explode('/', $slug);
       
        $category = BiCategory::where('slug', $slug_db)->firstOrFail();
        
      
        $productsForCategories = $category->products()->orderBy('id', 'desc')->paginate($pagination);
        $allcategories = BiCategory::orderBy('sort_order', 'asc')->get();
        
        return view('layouts/categories/ajaxlist')->with([
            'category' => $category,
            'productsForCategories' => $productsForCategories,
            'allcategories' => $allcategories,
        ])->render();
        
    }

    public function getProduct()
    {  
        $pagination = 3 ;
        $products = BiProduct::orderBy('id', 'desc')->paginate($pagination);
        return view('layouts/shop/ajax-products')->with([
            'products' => $products         
        ])->render();
        
    }
    public function getProductMain()
    {   
        $pagination = 4 ;
        $products = BiProduct::orderBy('id', 'desc')->paginate($pagination);
        return view('layouts/ajax-products-main')->with([
            'products' => $products         
        ])->render();
        
    }
    public function search()
    { 
        $pagination = 3;
        $query = Input::get('query');
        $products = BiProduct::search($query)->paginate($pagination);
        $products->appends(['query' => $query]);
        return view('layouts/ajax-search-result')->with([
            'products' => $products         
        ])->render();
        
    }

    public function codeValidation(Request $request){

        $validatedData = Validator::make($request->all(), [
            'code_used_count' => 'numeric|required|min:1|digits_between: 1,9',
            'code_offer' => 'numeric|required|digits_between: 1,9',
        ]);
        if(!$validatedData->fails()){
            $id = Auth::guard('customer')->user()->bimerchant()->first()->id;
            $order_item = BiOrderItem::where('code', $request->code_offer)->with(['product.bimerchant'])->first();
            
            if($order_item){           
                $merchant_id = $order_item->product->bimerchant->id;
                if(!empty($merchant_id) && $merchant_id !='0' && $merchant_id == $id ){
        
                    $order_item_quantity = $order_item->quantity;
                    $order_item_quantity_used = $order_item->code_used_count;
        
                    if($request->code_used_count + $order_item_quantity_used <= $order_item_quantity ){
                        $order_item->code_used_count += $request->code_used_count;
        
                        $order_item->save();
                        $message = '<p class="alert alert-success">
                        کد تخفیف با موفقیت تایید شد!
                        </p>
                        ';
                    }else{
                        $message = '<p class="alert alert-danger">
                        تعداد بن مصرف شده بیش از حد مجاز است!
                        </p>
                        ';
                    }
                
                }else{
                        $message = '<p class="alert alert-danger">
                        دسترسی شما برای تایید کد تخفیف مجاز نیست!
                        </p>
                        ';
                }
            }else{ 

                        $message = '<p class="alert alert-danger">
                        کد تخفیف معتبر نیست!
                        </p>
                        ';
            }
        }else{

                        $message = '<p class="alert alert-danger">
                        مقادیر وارد شده معتبر نیست!
                        </p>
                        ';

        }

        return  $message;
            
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
}
