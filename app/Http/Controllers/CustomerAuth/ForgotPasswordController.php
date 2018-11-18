<?php

namespace App\Http\Controllers\CustomerAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use App\BiCustomer;
use App\BiCategory;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Customer;


class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('customer.guest');
    }

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirection(){

        return abort(404);

    }
    public function showLinkRequestForm()
    {   $allcategories = BiCategory::orderBy('sort_order', 'asc')->get();
        return view('customer.auth.passwords.sms')->with([
    
            'allcategories' => $allcategories,

        ]);
    
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker('customers');
    }
    public function passChange(Request $request){
       
        $allcategories = BiCategory::orderBy('sort_order', 'asc')->get();
        $messages = [
            'required' => 'پر کردن این فیلد اجباری است!',
            'password.min' => 'گذر واژه باید حداقل شامل 6 کاراکتر باشد!',
            'confirmed' => 'گذر واژه مطابقت ندارد'
        ];
        $validatedData = Validator::make($request->all(), [
            'password' => 'min:6|confirmed',
            'code' => 'required|min:4',
            'phone' => 'required'
         
        ],$messages);
        if(!$validatedData->fails()){
            $phone = $request->phone;
            $bicustomer = BiCustomer::where('code', $request->code)->with(['customer'])->whereHas('customer', function($q) use ($phone){
                $q->where('phone',$phone); 
            })->first();
           
            if(!empty($bicustomer->customer)){
                if(!empty($request->password) && !empty($request->password_confirmation) && $request->password == $request->password_confirmation){     
                    $bicustomer->customer->password = Hash::make($request->password);
                    $bicustomer->customer->save();
                    $message = 'رمز ورود شما با موفقیت بروزرسانی شد، لطفا وارد شوید!';
                }
              //  dd($message);
                return view('layouts/my-account/authentication')->with([
                    'allcategories' => $allcategories,
                    'message' => $message,
                    ]);  
            }else{
               // $notmatch = 'کد وارد شده معتبر نیست!';
                $errors = $validatedData->errors()->add('notmatch', 'شماره همراه وارد شده مطابقت ندارد!');

            }
           // $errors = null;
            
        }else{
            $errors = $validatedData->errors(); 
    
        }
      
        return view('customer/auth/passwords/confirm-code')->with([
            'errors' => $errors,
            'allcategories' => $allcategories,

        ]);
    }
}
