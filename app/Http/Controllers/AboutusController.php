<?php
namespace App\Http\Controllers;

use App\BiProduct;
use App\BiCategory;
use App\BiSlider;
use App\BiSliderImage;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Resources\Aboutus as AboutusResource;

class AboutusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Request::isJson()) {
            
            $allproducts = BiProduct::where('status',1)->where('parent_id', 0)->orderBy('id', 'asc')->get();
            return AboutusResource::collection($allproducts);

        } else {

            $slider = BiSlider::where('name' , 'index')->get();
            $sliderimages = BiSliderImage::where('bi_slider_id', $slider[0]->id)->get();
            $allcategories = BiCategory::where('state','MainMenu')->orderBy('sort_order', 'asc')->get();
        
            return view('layouts/aboutus')->with([
                'sliderimages' =>  $sliderimages,
                'allcategories' => $allcategories,
    
            ]);
        }
        
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
            $allcategories = BiCategory::where('state','MainMenu')->orderBy('sort_order', 'asc')->get();
    
            return AboutusResource::collection($allcategories);
        } else {
            dd('no');
        }
        
    }
}
