<?php

namespace App\Http\Controllers;
use App\BiProduct;
use App\BiCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Cooperation;
use Validator ;
class CooperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allcategories = BiCategory::where('state','MainMenu')->orderBy('sort_order', 'asc')->get();
        return view('layouts/cooperation')->with([
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
        $messages = [
            'required' => 'پر کردن این فیلد اجباری است!',
            'numeric' => 'ورودی باید به صورت عدد باشد'
        ];
        $validatedData = Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => 'required|numeric',
            'company_name' => 'required',
            'company_role' => 'required',
            'phone' => 'required|numeric',
            'email' => 'email|nullable',
            'address' => 'required',
            'discount' => 'numeric|nullable',
            'category' => 'required|numeric',
        ],$messages);
        if(!$validatedData->fails()){
          
            $cooperation = new Cooperation(); 
            $cooperation->name = $request->name;
            $cooperation->mobile = $request->mobile;
            $cooperation->company_name = $request->company_name;
            $cooperation->tel = $request->phone;
            $cooperation->company_role = $request->company_role;
            $cooperation->email = $request->email;
            $cooperation->address = $request->address;
            $cooperation->discount = $request->discount;
            $cooperation->category = $request->category;
            $cooperation->description = $request->description;
            $cooperation->text = $request->text;
            $cooperation->save();
            $message="کاربر گرامی درخواست شما با موفقیت ثبت شد ";
            return redirect()->back()->withErrors([
            'message' => $message
            ]);

        }else{
            return redirect()->back()->withErrors($validatedData);
        }
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
