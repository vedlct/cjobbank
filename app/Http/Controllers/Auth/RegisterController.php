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
use Hash;

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
        $rules = [
            'firstName' => 'required|string|max:50',
            'lastName' => 'required|string|max:48',
            'email' => 'required|email|max:255|unique:user',
            'password' => 'required|string|min:6',

        ];

        $customMessages = [
            'unique' => 'This User is already been registered.Please Login !'
        ];

        $this->validate($r, $rules, $customMessages);


//        $user=new User();
//        $user->name=$r->firstName." ".$r->lastName;
//        $user->email=$r->email;
//        $user->password=Hash::make($r->password);
//        $user->fkuserTypeId='user';
//        $user->register='N';
//        $userToken=$user->token=str_random(64);
//        $user->save();
//
//
//        $userEmail=$user->email;
//        $userPass=$r->password;
//        $userId=$user->userId;


        $userEmail=$r->email;
        $userPass=$r->password;
        $userFirstName=$r->firstName;
        $userLastName=$r->lastName;
        $userToken=str_random(64);


        $aggrementsQues=Aggrementqus::where('status',1)->orderBy('serial', 'ASC')->get();


//        return view('newUserAgreement',compact('userToken','userPass','userEmail','aggrementsQues','userId'));
        return view('newUserAgreement',compact('userToken','userPass','userEmail','aggrementsQues','userFirstName','userLastName'));
    }
    public function newUserAgreement(Request $r)
    {

        $user=new User();
        $user->name=$r->userFirstName." ".$r->userLastName;
        $user->email=$r->userEmail;
        $user->password=Hash::make($r->userPass);
        $user->fkuserTypeId='user';
        $user->register='N';
        $userToken=$user->token=$r->userToken;
        $user->save();




        for ($i=0;$i<count($r->qesId);$i++){

            $userAggrement=new Aggrement();
            $userAggrement->fkuserId=$user->userId;
            $userAggrement->fkaggrementQusId=$r->qesId[$i];
            $userAggrement->ans=$r->qesans[$i];
            $userAggrement->save();

        }

        $data = array('email'=>$r->userEmail,'pass'=>$r->userPass,'userToken'=>$r->userToken);

        try {

            Mail::send('mail.AccountCreate', $data, function ($message) use ($data) {
                $message->to($data['email'], 'Caritas BD')->subject('New - Account');

            });
            Session::flash('notActive', 'Account Activation Mail is sent to your mail , Also Check Spam');

        }catch (\Exception $ex) {

            Session::flash('notActive', 'Account Activation Email Does not Sent.Please contact us');

        }

        return redirect()->route('register');

    }

    public function AccountActive($email,$userToken)
    {

        $userInfo=User::where('email', $email)->where('token', $userToken)->first();

        if(!empty($userInfo)) {

            if ($userInfo->register == 'Y') {

                Session::flash('notActive', 'Your Account is already activated! please login');
                return redirect('/');

            } elseif ($userInfo->register == 'N') {

                $userInfo->register = 'Y';
                $userInfo->token = null;
                $userInfo->save();

                Session::flash('message', 'Your Account is activated Successfully');
                Auth::loginUsingId($userInfo->userId);
                return redirect()->route('home');
            }
        }else{

            Session::flash('notActive', 'Your have allready performed this action once!,Please try resend the email');
            return redirect('/');

        }


    }

    public function resendActivationMail(Request $r)
    {
        $rules = [

            'email' => 'required|email|max:255',


        ];

        $customMessages = [
//            'unique' => 'This User is already been registered.Please Login !'
        ];

        $this->validate($r, $rules, $customMessages);

        $userInfo=User::where('email', $r->email)->first();

        if(!empty($userInfo)) {

            if ($userInfo->register == 'N') {

                $userToken=$userInfo->token=str_random(64);
                $userInfo->save();

                $data = array('email'=>$r->email,'userToken'=>$userToken);

                try {

                    Mail::send('mail.AccountReActivate', $data, function ($message) use ($data) {
                        $message->to($data['email'], 'Caritas BD')->subject('Account-Activation');

                    });
                    Session::flash('notActive', 'Account Activation Mail is sent to your mail , Also Check Spam');
                    return redirect('/');

                }catch (\Exception $ex) {

                    Session::flash('notActive', 'Account Activation Email Does not Sent.Please contact us');

                    return redirect()->route('account.activationResend');

                }

            }elseif ($userInfo->register == 'Y'){

                Session::flash('notActive', 'Your Account is Already Activated');
                return redirect()->route('account.activationResend');
            }



        }else{
            Session::flash('notActive', 'Please Type Your Mail Correctly or Register First');
            return redirect()->route('account.activationResend');
        }

    }

    public function AccountReActive($email,$userToken)
    {

        $userInfo=User::where('email', $email)->where('token', $userToken)->first();

        if(!empty($userInfo)) {


            $userInfo->register = 'Y';
            $userInfo->token = null;
            $userInfo->save();

            Session::flash('message', 'Your Account is activated Successfully');
            Auth::loginUsingId($userInfo->userId);
            return redirect()->route('home');
        }
        else{

            Session::flash('notActive', 'Your have allready performed this action once!,Please try resend the email');
            return redirect('/');

        }


    }


    public function ChangePass($email,$password,$userToken)
    {

        $userInfo=User::where('email', $email)->where('token', $userToken)->first();

        if(!empty($userInfo)) {

            $userInfo->password = Hash::make($password);
            $userInfo->token = null;
            $userInfo->save();

            Session::flash('message', 'Your Password has been changed Successfully');
            Auth::loginUsingId($userInfo->userId);
            return redirect()->route('home');
        }
        else{

            Session::flash('notActive', 'Your have allready performed this action once!,Please try resend the email');
            return redirect('/');

        }


    }



    public function changeForgetPassword(Request $r)
    {
        $rules = [

            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6',

        ];

        $customMessages = [
//            'unique' => 'This User is already been registered.Please Login !'
        ];

        $this->validate($r, $rules, $customMessages);

        $userInfo=User::where('email', $r->email)->first();

        if(!empty($userInfo)) {

            if ($userInfo->register == 'Y') {


                $userToken=$userInfo->token=str_random(64);
                $userInfo->save();

                $data = array('email'=>$r->email,'pass'=>$r->password,'userToken'=>$userToken);

                try {

                    Mail::send('mail.ForgetPassword', $data, function ($message) use ($data) {
                        $message->to($data['email'], 'Caritas BD')->subject('Account-Reset Password');

                    });
                    Session::flash('notActive', 'Reset Password Confirmation Mail is sent to your mail');
                    return redirect('/');

                }catch (\Exception $ex) {

                    Session::flash('notActive', 'Reset Password Confirmation Mail Does not Sent.Please contact us');

                    return redirect()->route('account.forgetPass');

                }


            }elseif ($userInfo->register == 'N'){

                Session::flash('notActive', 'please acivate Your Account First. !!');
                return redirect()->route('account.activationResend');

            }

        }else{
            Session::flash('notActive', 'Please Type Your Mail Correctly or Register First');
            return redirect()->route('account.forgetPass');
        }

    }
}
