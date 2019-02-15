<?php

namespace App\Http\Controllers\CustomerAuth;
use App\BiCustomer;
use App\Customer;
use App\BiCategory;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
//require __DIR__ . '/vendor/autoload.php';
use Melipayamak\MelipayamakApi;
//use Melipayamak;
use App\Wallet;
use App\Invitation;
use App\Score;
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
            'invitation.max' =>  'کد دعوت باید حداکثر  :max کاراکتر باشد .',
            'password.min' =>  'رمز ورود باید حداقل   :min کاراکتر باشد .',
            'password.confirmed' =>  'رمز ورود مطابقت ندارد .',
            'phone.digits' =>  'شماره همراه باید  :digits رقم باشد .',
            'phone.unique' =>  'این شماره قبلا ثبت شده است!',
            'email.unique' =>  'این ایمیل قبلا ثبت شده است!',
        ];
        return Validator::make($data, [
            'name' => 'required|max:255',
            'invitation' => 'max:8',
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
        
        try{
            $username = '09177105063';
            $password = '8063';
            $api = new MelipayamakApi($username,$password);
            $sms = $api->sms('soap');;
            $to = $data['phone'];
            $bodyId = 2947;
            $text = $data['name'];
            $response = $sms->sendByBaseNumber($text,$to,$bodyId);
            $json = json_decode($response);
        }catch(Exception $e){
            echo $e->getMessage();
        }
        /*
       try{

            $sms = Melipayamak::sms();
            dd($sms);
            $to = $data['phone'];
            $from = '200020001090';
            $bodyId = 2947;
            $text = "به سامانه خرید و تخفیف گروهی 'بن اینجا' خوش آمدید".
            //."\n"."هدیه شما "."10,000 تومان شارژ رایگان کیف پولتان"."\n"."تخفیف بگیر، لذت ببر ...".
            "\n"."https://boninja.com";
            //$response = $sms->send($to,$from,$text); 
            $response = $sms->sendByBaseNumber($text,$to,$bodyId);
            //$response = $sms->send($to,$from,$text);
            $json = json_decode($response);
            
        }catch(Exception $e){
            echo $e->getMessage();
        }
        */
        
      
        $result = md5(uniqid(rand(), true));
        $code = substr($result, 0, 8);
        if(empty($code)){
            $code = null;
        }
      
        $customer = Customer::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'invitation_code' => $code,
            'password' => bcrypt($data['password']),
        ]);

        BiCustomer::create([
            'customer_id' => $customer->id,
        ]);
        $score = Score::firstOrNew(['customer_id' => $customer->id]);
        $score->value = $score->value + 1;
        $score->save();

        if(!empty($data['invitation'])){
            $invitation = new Invitation();
            $invitation->customer_id = $customer->id;
            $invitation->code = $data['invitation'];
            $invitation->save();
        }

        $inviter = Customer::where('invitation_code', $data['invitation'])->first();
        if(!empty($inviter->id)){
            $score = Score::firstOrNew(['customer_id' => $inviter->id]);
            $score->value = $score->value + 1;
            $score->save();
        }
        
        /*
        $wallet = new Wallet();
        $wallet->customer_id = $customer->id;
        $wallet->status = 'completed';
        $wallet->balance =  10000;
        $wallet->total = 10000;
        $wallet->tracking_code = 'هدیه بن اینجا به شما';
        $wallet->save();
        */
        return $customer;
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm($invitation = null)
    {
        
        $allcategories = BiCategory::where('state','MainMenu')->orderBy('sort_order', 'asc')->get();
        return view('layouts.my-account.registration')->with([
            'allcategories' => $allcategories, 
            'invitation'  => $invitation
        ]);
       // return view('layouts.my-account.authentication');
        
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
