<?php

namespace App\Http\Controllers\Auth;

use App\Aggrement;
use App\Aggrementqus;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;
use Session;

use Auth;


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
        $validatedData = $r->validate([
            'firstName' => 'required|string|max:50',
            'lastName' => 'required|string|max:48',
            'email' => 'required|email|max:255|unique:user',
            'password' => 'required|string|min:6',

        ]);

        $user=new User();
        $user->name=$r->firstName." ".$r->lastName;
        $user->email=$r->email;
        $user->password=bcrypt($r->password);
        $user->fkuserTypeId='user';
        $user->register='N';
        $user->save();

        $userId=$user->userId;
        $userEmail=$user->email;
        $userPass=$r->password;


        $aggrementsQues=Aggrementqus::get();


        return view('newUserAgreement',compact('userId','userPass','userEmail','aggrementsQues'));
    }
    public function newUserAgreement(Request $r)
    {


        for ($i=0;$i<count($r->qesId);$i++){

            $userAggrement=new Aggrement();
            $userAggrement->fkuserId=$r->userId;
            $userAggrement->fkaggrementQusId=$r->qesId[$i];
            $userAggrement->ans=$r->qesans[$i];
            $userAggrement->save();

        }

        $data = array('email'=>$r->userEmail,'pass'=>$r->userPass,'userId'=>$r->userId);

        try {

            Mail::send('mail.AccountCreate', $data, function ($message) use ($data) {
                $message->to($data['email'], 'Caritas BD')->subject('New - Account');

            });
            Session::flash('message', 'Account Activation Mail is sent to your mail');

        }catch (\Exception $ex) {

            Session::flash('message', 'Account Activation Email Does not Sent.Please contact us');

        }

        return redirect()->route('register');




    }

    public function AccountActive(Request $r)
    {

        $userInfo=User::findOrFail($r->userId);
        $userInfo->register='Y';
        $userInfo->save();

        Auth::loginUsingId($r->userId);
        return redirect()->route('home');

    }
}
