<?php
namespace App\Http\Controllers;

use App\BiProduct;
use App\BiCategory;
use App\BiSlider;
use App\BiSliderImage;
use Illuminate\Http\Request;

class MainpageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagination = 12;
        $allcategories = BiCategory::orderBy('sort_order', 'asc')->get();
        $slider = BiSlider::where('name' , 'index')->get();
        $sliderimages = BiSliderImage::where('bi_slider_id', $slider[0]->id)->get();
        $featuredproducts = BiProduct::where('featured','1')->get();
        $products = BiProduct::orderBy('id', 'desc')->where('parent_id' , 0)->where('status',1)->paginate($pagination);
        $allproducts = BiProduct::where('index_gallery', 1)->orderBy('id', 'desc')->get();
        return view('layouts/mainpage')->with([
            'products' => $products,
            'allproducts' => $allproducts,
            'allcategories' => $allcategories,
            'sliderimages' =>  $sliderimages,
            'featured' => $featuredproducts
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
}
