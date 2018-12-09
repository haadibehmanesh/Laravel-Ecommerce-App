<?php

namespace App\Http\Controllers;
use App\BiCategory;
use App\Wallet;
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
        $customer_id = Auth::guard('customer')->user()->id;
        $wallet_last = Wallet::where('customer_id', $customer_id)->where('status','completed')->orderBy('id','desc')->first();
        if(!empty($wallet_last)){
            $total = $wallet_last->total;
        }else{
            $total = 0 ;
        }
        return view('layouts/my-account/costumer-panel')->with([
        'allcategories' => $allcategories,
        'total' => $total
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
        $customer_id = Auth::guard('customer')->user()->id;
        $wallet_last = Wallet::where('customer_id', $customer_id)->where('status','completed')->orderBy('id','desc')->first();
        if(!empty($wallet_last)){
            $total = $wallet_last->total;
        }else{
            $total = 0 ;
        }
        return view('layouts/my-account/ajax-customereditaccount')->with([
            'customerinfo' => $customerinfo,
            'total' => $total
            ])->render();
    }

    public function editprofile(Request $request)
    {   
        $customer_id = Auth::guard('customer')->user()->id;
        $wallet_last = Wallet::where('customer_id', $customer_id)->where('status','completed')->orderBy('id','desc')->first();
        if(!empty($wallet_last)){
            $total = $wallet_last->total;
        }else{
            $total = 0 ;
        }
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
            if(!empty($request->password_current && !empty($request->password) && !empty($request->password_confirmation) && $request->password == $request->password_confirmation)){            
                
                if(Hash::check($request->password_current, $customerinfo[0]->password) ){
                    $customerinfo[0]->password = Hash::make($request->password);
                    $customerinfo[0]->save();
                }

            }
        }       
        return view('layouts/my-account/ajax-customereditaccount')->with([
            'customerinfo' => $customerinfo,
            'bicustomerinfo' => $bicustomerinfo,
            'errors' => $validatedData->errors(),
            'total' => $total
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
    public function orders()
    {   
        
        $allcategories = BiCategory::orderBy('sort_order', 'asc')->get();
        $id = Auth::guard('customer')->user()->id;
        $wallet_last = Wallet::where('customer_id', $id)->where('status','completed')->orderBy('id','desc')->first();
        if(!empty($wallet_last)){
            $total = $wallet_last->total;
        }else{
            $total = 0 ;
        }
        $customerorders = BiOrder::where('customer_id', $id)->where('status','completed')->orderBy('id','desc')->get();
        return view('layouts/my-account/customer-orders')->with([
            'customerorders' => $customerorders,
            'allcategories' => $allcategories,
            'total' => $total
            ]);
    }
    /*public function orderInfo(Request $request)
    {   
        dd($request);
        
        $customerorders = BiOrder::where('customer_id', $id)->where('status','completed')->orderBy('id','desc')->get();
        //$order = BiOrder::where('invoice_no', $invoice_no)->first();
        $order_info = BiOrderItem::where('bi_order_id', $customerorders->id)->get();
        return view('layouts/my-account/ajax-customer-order-info')->with([
            'order_info' => $order_info,
            ])->render();
    }
*/
    public function orderitem(Request $request)
    {   
        $customer_id = Auth::guard('customer')->user()->id;
        $wallet_last = Wallet::where('customer_id', $customer_id)->where('status','completed')->orderBy('id','desc')->first();
        if(!empty($wallet_last)){
            $total = $wallet_last->total;
        }else{
            $total = 0 ;
        }
        $allcategories = BiCategory::orderBy('sort_order', 'asc')->get();
        $id = $request->id;
       // dd($id);
        if($id){
            $order_item_info = BiOrderItem::where('id', $id)->first();
            
        }
        return view('layouts/my-account/customer-order-item-info')->with([
            'order_item_info' => $order_item_info,
            'allcategories' => $allcategories,
            'total' => $total
            ]);
    }

    /*public function dashboard($id)
    {
        return view('layouts/my-account/ajax-customerdashboard');
    }
    */
    public function showsold()
    {
        $allcategories = BiCategory::orderBy('sort_order', 'asc')->get();
        $id = Auth::guard('customer')->user()->id;
        $wallet_last = Wallet::where('customer_id', $id)->where('status','completed')->orderBy('id','desc')->first();
        if(!empty($wallet_last)){
            $total = $wallet_last->total;
        }else{
            $total = 0 ;
        }
        $customerorders = BiOrder::where('customer_id', $id)->whereIn('status',['completed','completed_W'])->orderBy('id','desc')->get();
        //dd($customerorders);
       // $order_info = BiOrderItem::where('bi_order_id', $customerorders->id)->get();
        return view('layouts/my-account/customer-panel-order-info')->with([
        //'order_info' => $order_info,
        'customerorders' => $customerorders,
        'allcategories'=> $allcategories,
        'total' => $total
        ]);
    }
}
