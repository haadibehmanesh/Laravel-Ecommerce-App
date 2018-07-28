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
        $categories = BiCategory::all();

        if(request()->category) {
            $products = BiProduct::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->category);
            });
            
        } else {
            $products = BiProduct::orderBy('id', 'desc')->paginate($pagination);
        }

        return view('layouts/shop/shop')->with([
            'products' => $products,
            'categories' => $categories,            
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
    public function show($slug)
    {   $slug_db = explode('/', $slug);
       
        $product = BiProduct::where('slug', $slug_db)->firstOrFail();
        $mightAlsoLike = BiProduct::where('slug', '!=', $slug_db)->mightAlsoLike()->get();
        
        return view('layouts/product/product')->with([
            'product' => $product,
            'mightAlsoLike' => $mightAlsoLike,
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
