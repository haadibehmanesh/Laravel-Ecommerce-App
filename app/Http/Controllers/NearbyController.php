<?php

namespace App\Http\Controllers;
use App\BiOrder;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\BiProduct;
use App\BiCategory;
use App\BiSlider;
use App\BiSliderImage;
use App\BiReview;
use Illuminate\Support\Facades\Auth;
class NearbyController extends Controller{

    public function index()
    {
        $lat =29.6297833;
        $lng = 52.5086218;
        $allcategories = BiCategory::orderBy('sort_order', 'asc')->get();
        $nearby = BiProduct::select(DB::raw('*, ( 6367 * acos( cos( radians('.$lat.') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians('.$lng.') ) + sin( radians('.$lat.') ) * sin( radians( latitude ) ) ) ) AS distance'))->having('distance', '<', 100)->where('parent_id',0)->orderBy('distance')->get();
        $nearby = $nearby->map(function ($nearby) {
            return $nearby->only(['id', 'name', 'latitude','longitude']);
        });
        //dd($nearby->toArray());
        return view('layouts/nearby/nearby')->with([
            'allcategories' => $allcategories,   
            'nearby' => $nearby,         
        ]);
    }




}