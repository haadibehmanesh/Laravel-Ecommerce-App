<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BiProduct;
use App\BiCategory;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagination = 9;
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

        $categoriesForProduct = $product->categories()->get();

        $mightAlsoLike = BiProduct::where('slug', '!=', $slug_db)->mightAlsoLike()->get();
        
        $allcategories = BiCategory::orderBy('sort_order', 'asc')->get();

        if($category){
            $category = BiCategory::where('slug', $category)->get();
            return view('layouts/product/product')->with([
                'product' => $product,
                'mightAlsoLike' => $mightAlsoLike,
                'categoriesForProduct' => $categoriesForProduct,
                'categoryslug' => $category[0]->slug,
                'categoryname' => $category[0]->name,
                'allcategories' => $allcategories,
            ]);
        }else{
            return view('layouts/product/product')->with([
                'product' => $product,
                'mightAlsoLike' => $mightAlsoLike,
                'categoriesForProduct' => $categoriesForProduct,
                'categoryslug' => $category,
                'allcategories' => $allcategories,
            ]);
        }
        
    }

    public function showCategory($slug)
    {  
        $pagination = 9;
        
        $slug_db = explode('/', $slug);
       
        $category = BiCategory::where('slug', $slug_db)->firstOrFail();
      
        $productsForCategories = $category->products()->orderBy('id', 'desc')->paginate($pagination);
        
        $allcategories = BiCategory::orderBy('sort_order', 'asc')->get();
        
        return view('layouts/categories/category')->with([
            'category' => $category,
            'productsForCategories' => $productsForCategories,
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
