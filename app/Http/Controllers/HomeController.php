<?php

namespace App\Http\Controllers;

use App\Employee;
use App\TermsAndConditions;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Hash;
use Session;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
        $this->middleware(function ($request, $next) {

            if (Auth::check()){

                return $next($request);


            }else{

                return redirect('/');
            }


        });
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cvStatus1=Employee::where('fkuserId',Auth::user()->userId)->first();

        if ($cvStatus1 != null && $cvStatus1->cvStatus == 1){

            return redirect()->route('job.all');

        }else {
            return redirect()->route('candidate.cvPersonalInfo');
        }
//        return view('usercv');
    }

    public function password(){
        return view('password');
    }


    public function changePassword(Request $r){
        $old=$r->oldPass;
        $new=$r->password;
        $user=User::findOrFail(Auth::user()->userId);
        if (Hash::check($old, $user->password)) {
            $user->password=Hash::make($r->password);
            $user->save();
            Session::flash('message', 'Password Changed Successfully!');
            return back();
        }
        Session::flash('message', 'Password Did not Match!');
        return back();
    }

}
