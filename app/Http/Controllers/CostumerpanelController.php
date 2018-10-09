<?php

namespace App\Http\Controllers;
use App\BiCategory;
use App\BiOrderItem;
use App\BiOrder;
use App\BiCustomer;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Console\Presets\React;

class CostumerpanelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allcategories = BiCategory::orderBy('sort_order', 'asc')->get();
        return view('layouts/my-account/costumer-panel')->with([
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
        $customerinfo = Customer::where('id', $id)->get();

        return view('layouts/my-account/ajax-customereditaccount')->with([
            'customerinfo' => $customerinfo,
            ])->render();
    }

    public function editprofile(Request $request)
    {   
        $messages = [
            'required' => 'پر کردن این فیلد اجباری است!',
            'password.min' => 'گذر واژه باید حداقل شامل 6 کاراکتر باشد!',
            'account_email.email' => 'ایمیل وارد شده صحیح نیست!',
        ];
        $validatedData = Validator::make($request->all(), [
            'account_first_name' => 'required|max:255',
            'account_last_name' => 'required|max:255',
            'account_email' => 'email|max:255|nullable',
            'password' => 'min:6|confirmed|nullable',
        ],$messages);

        $customerinfo = Customer::where('id', $request->id)->get();
        $bicustomerinfo = Bicustomer::where('customer_id', $request->id)->get();
        
        if(!$validatedData->fails()){

            if(!empty($request->account_first_name && $request->account_first_name != $bicustomerinfo[0]->firstname)){
                $bicustomerinfo[0]->firstname = $request->account_first_name;
                $bicustomerinfo[0]->save();
            }
            if(!empty($request->account_last_name && $request->account_last_name != $bicustomerinfo[0]->lastname)){
                $bicustomerinfo[0]->lastname = $request->account_last_name;
                $bicustomerinfo[0]->save();
            }
            if(!empty($request->account_email && $request->account_email != $customerinfo[0]->email)){
                $customerinfo[0]->email = $request->account_email;
                $customerinfo[0]->save();
            }
            if(!empty($request->password_current && !empty($request->password_1) && !empty($request->password_2) && $request->password_1 == $request->password_2)){            
                
                if(Hash::check($request->password_current, $customerinfo[0]->password) ){
                    $customerinfo[0]->password = Hash::make($request->password_1);
                    $customerinfo[0]->save();
                }

            }
        }       
        return view('layouts/my-account/ajax-customereditaccount')->with([
            'customerinfo' => $customerinfo,
            'bicustomerinfo' => $bicustomerinfo,
            'errors' => $validatedData->errors(),
            ])->render();
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
    public function orders($id)
    {   
        if((Auth::guard('customer')->user()->id == $id)){
            $customerorders = BiOrder::where('customer_id', $id)->where('status','completed')->orderBy('id','desc')->get();
            
        }
        return view('layouts/my-account/ajax-customerorders')->with([
            'customerorders' => $customerorders,
            ])->render();
    }
    public function orderInfo($invoice_no)
    {   
        if($invoice_no){
            $order = BiOrder::where('invoice_no', $invoice_no)->first();
            $order_info = BiOrderItem::where('bi_order_id', $order->id)->get();
         
            
        }
        return view('layouts/my-account/ajax-customer-order-info')->with([
            'order_info' => $order_info,
            'order' => $order
            ])->render();
    }

    public function orderitemInfo($id)
    {   

        
        if($id){
            $order_item_info = BiOrderItem::where('id', $id)->first();
          //dd($order);
            
        }
        return view('layouts/my-account/ajax-customer-order-item-info')->with([
            'order_item_info' => $order_item_info,
            ])->render();
    }

    public function dashboard($id)
    {
        return view('layouts/my-account/ajax-customerdashboard');
    }
    public function showsold()
    {
        $allcategories = BiCategory::orderBy('sort_order', 'asc')->get();
        $id = Auth::guard('customer')->user()->id;
        $customerorders = BiOrder::where('customer_id', $id)->where('status','completed')->orderBy('id','desc')->get();
        //dd($customerorders->id);
       // $order_info = BiOrderItem::where('bi_order_id', $customerorders->id)->get();
        return view('layouts/my-account/customer-panel-order-info')->with([
        //'order_info' => $order_info,
        'customerorders' => $customerorders,
        'allcategories'=> $allcategories
        ]);
    }
}
