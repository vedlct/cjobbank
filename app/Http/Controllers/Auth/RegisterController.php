<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;
use Session;

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
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    public function createUserShowAggrement(Request $r)
    {
        $data=array(
            'firstName'=>$r->firstName,
            'lastName'=>$r->lastName,
            'email'=>$r->email,
            'password'=>$r->password,
            );

        return view('newUserAgreement',compact('data'));
    }
    public function newUserAgreement(Request $r)
    {


        $data = array('name'=>$r->firstName." ".$r->lastName,'email'=>$r->email,'pass'=>$r->password,'q1'=>$r->q1,'q2'=>$r->q2,'q3'=>$r->q3,'q4'=>$r->q4);


        try {

            Mail::send('mail.AccountCreate', $data, function ($message) use ($data) {
                $message->to($data['email'], 'Caritas BD')->subject('New - Account');

            });
            Session::flash('success_msg', 'Account Activation Mail is sent to your mail');

        }catch (\Exception $ex) {

            Session::flash('error_msg', 'Account Activation Email Does not Sent.Please contact us');

        }

        return redirect()->route('register');




    }
}
