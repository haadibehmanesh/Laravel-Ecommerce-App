<?php

namespace App\Http\Controllers;
use App\BiProduct;
use App\BiCategory;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

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
