<?php

namespace App\Http\Controllers;
use App\Customer;
use App\BiReview;
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
        $pagination = 8;
        
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
      
        
        $slug_db = explode('/', $slug);
       
        $category = BiCategory::where('slug', $slug_db)->firstOrFail();
      
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
   
       
        return view('layouts/categories/ajaxslider')->with([
            'category' => $category,
            'featured_product' => $featured_product,
            'merchant_name' => $merchant_name,
            'sliderimages' =>  $sliderimages,
          
        ])->render();
        
    }
    public function getList($slug)
    {  
        $pagination = 8;
        
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
        $pagination = 4 ;
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
        $pagination = 4;
        $query = Input::get('query');
        $products = BiProduct::search($query)->paginate($pagination);
        $products->appends(['query' => $query]);
        return view('layouts/ajax-search-result')->with([
            'products' => $products         
        ])->render();
        
    }
    public function couponShow(Request $request){

        $messages = [
            'required' => 'پر کردن فیلد کد تخفیف اجباری است!',
            'numeric' => 'کد تخفیف باید عدد باشد!',
            'digits_between' => ' ارقام کد تخفیف باید بین 1 تا 9 باشد!',
            'not_in' => ' ارقام کد تخفیف باید بین 1 تا 9 باشد!',
            'min' => 'کد تخفیف باید حداقل 8 رقم داشته باشد!',
        ];
        $validatedData = Validator::make($request->all(), [
            'code_offer' => 'required|min:8|integer|digits_between: 1,9|not_in:0',
        ],$messages);
        if(!$validatedData->fails()){
            $id = Auth::guard('customer')->user()->bimerchant()->first()->id;
            $order_item = BiOrderItem::where('code', $request->code_offer)->with(['product.bimerchant'])->first();
            if($order_item){       
                $merchant_id = $order_item->product->bimerchant->id;
              
                if(!empty($merchant_id) && $merchant_id !='0' && $merchant_id == $id ){
                    return view('layouts/dashboard/ajax-merchant-bon')->with([
                        'item' => $order_item         
                    ])->render();
                }else{
                    $errors = $validatedData->errors()->add('notmatch', 'کاربر گرامی شما مجاز به ابطال این کد تخفیف نیستید!');
                    return view('layouts/dashboard/ajax-merchant-bon')->with([
                        'errors' => $errors
                    ])->render();        
                }
            }else{
                $errors = $validatedData->errors()->add('notmatch', 'کاربر گرامی شما مجاز به ابطال این کد تخفیف نیستید!');
                return view('layouts/dashboard/ajax-merchant-bon')->with([
                    'errors' => $errors
                ])->render();        
            }
        }else{
            $errors = $validatedData->errors();
           
            return view('layouts/dashboard/ajax-merchant-bon')->with([
                'errors' => $errors
            ])->render();
        }

    }
    public function codeValidation(Request $request){
    
        $messages = [
            'required' => 'پر کردن فیلد تعداد مصرف فعلی، اجباری است!',
            'not_in' => 'تعداد مصرف فعلی نمی تواند 0 باشد!',
            'min' => 'تعداد مصرف فعلی، باید حداقل 1 رقم داشته باشد!',
            'integer' => 'تعداد بایستی به صورت عددی باشد!',
        ];
        $validatedData = Validator::make($request->all(), [
            'code_used_count' => 'required|min:1|integer|not_in:0',
        ],$messages);
        if(!$validatedData->fails()){
            $id = Auth::guard('customer')->user()->bimerchant()->first()->id;
            $order_item = BiOrderItem::where('code', $request->code_offer)->with(['product.bimerchant'])->first();
            
            if($order_item){           
                $merchant_id = $order_item->product->bimerchant->id;
                if(!empty($merchant_id) && $merchant_id !='0' && $merchant_id == $id ){
                    $order_item_quantity = $order_item->quantity;
                    $order_item_quantity_used = $order_item->code_used_count;
                    if(!empty($request->code_used_count) && $request->code_used_count + $order_item_quantity_used <= $order_item_quantity ){
                        $order_item->code_used_count += $request->code_used_count;
        
                        $order_item->save();
                        $message = '<p class="alert alert-success">
                        کد تخفیف با موفقیت ابطال شد!
                        </p>
                        ';
                    }else{
                        $message = '<p class="alert alert-danger">
                        تعداد وارد شده بیش از حد مجاز است!
                        </p>
                        ';
                    }
                
                }else{
                        $message = '<p class="alert alert-danger">
                        دسترسی شما برای تایید کد تخفیف مجاز نیست!
                        </p>
                        ';
                }
            }
            return  $message;    
        }else{
            $message = $validatedData->errors()->first();
            $message = '<p class="alert alert-danger">'
                       .$message.
                        '</p>';
           // dd($message);
            return  $message;
        }            
    }



    public function createReview(Request $request)
    {   //dd($request->all());
        $messages = [
            'required' => 'پر کردن این فیلد اجباری است!',
        ];
        $validatedData = Validator::make($request->all(), [
            'author' => 'required',
            'rating' => 'required',
            'email' => 'email|nullable'
        ],$messages);
        if(!$validatedData->fails()){
            $id = Auth::guard('customer')->user()->id;
            $customer = Customer::where('id',$id)->first();
            if($customer->id == $id){
                $review = BiReview::firstOrNew([
                    'bi_product_id' =>  $request->product_id,
                    'customer_id' => $id
                ]);
                $review->author = $request->author;
                $review->email = $request->email;
                $review->text = $request->comment;
                $review->rating = ceil($request->rating);
                $review->save();
                
                $message = '<p class="alert alert-success">
                            نظر شما با موفقیت ثبت شد!
                            </p>
                            ';
                $review = BiReview::where('bi_product_id', $request->product_id)->where('customer_id',$id)->firstOrFail();
                   
                }else{

                    $message = 'کاربر گرامی دسترسی شما مجاز نیست! ';

                }
        }else{

            $message = '<p class="alert alert-danger">
                        مقادیر وارد شده معتبر نیست!
                        </p>
                        ';
                        $review = null;
        }
        $reviews = BiReview::where('bi_product_id',$request->product_id)->orderBy('id', 'desc')->get();
        if(empty($reviews)){
            $reviews = null;


        }
        return view('layouts/product/ajax-product-review')->with([
            'message' => $message,
            'review' => $review,
            'reviews' =>$reviews,
        ])->render();
           




        
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
