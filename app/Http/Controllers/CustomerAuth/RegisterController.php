<?php

namespace App\Http\Controllers\CustomerAuth;
use App\BiCustomer;
use App\Customer;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/my-account';

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
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    
    protected function validator(array $data)
    {
        $messages = [
            'required' => 'پر کردن این فیلد اجباری است!',
        ];
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'email|max:255|unique:customers|nullable',
            'phone' => 'required|digits:11|unique:customers',
            'password' => 'required|min:6|confirmed',
            //'g-recaptcha-response' => 'required|recaptcha'
            /*'g-recaptcha-response' => [
                'required' => 'Please verify that you are not a robot.',
                'captcha' => 'Captcha error! try again later or contact site admin.',
            ],*/
        ], $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Customer
     */
    protected function create(array $data)
    { 
        $customer = Customer::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => bcrypt($data['password']),
        ]);

        BiCustomer::create([
            'customer_id' => $customer->id,
        ]);
        return $customer;
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('layouts.my-account.authentication');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('customer');
    }
}
