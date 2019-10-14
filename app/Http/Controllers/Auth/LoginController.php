<?php

namespace App\Http\Controllers\Auth;

use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Auth;
use Session;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo()
    {
        if (Auth::user()->fkuserTypeId == USER_TYPE['Admin'] || Auth::user()->fkuserTypeId == USER_TYPE['Emp']) {
            return route('admin.dashboard');
        }elseif (Auth::user()->fkuserTypeId == USER_TYPE['ZoneAdmin']) {
            return route('zone.admin.dashboard');
        }elseif (Auth::user()->fkuserTypeId == USER_TYPE['User']) {
            $cvStatus1=Employee::where('fkuserId',Auth::user()->userId)->first();
            if ($cvStatus1 != null && $cvStatus1->cvStatus == 1){
                return route('job.all');
            }else {
                return route('candidate.cvPersonalInfo');
            }
        }
    }

    public function loginForm(){
        return view('auth.login');
    }

    public function login(\Illuminate\Http\Request $request) {
        $this->validateLogin($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        if ($this->guard()->validate($this->credentials($request))) {
            $user = $this->guard()->getLastAttempted();

            if ($user->register=='Y' && $this->attemptLogin($request)) {
                return $this->sendLoginResponse($request);

            }else {
                $this->incrementLoginAttempts($request);
                Session::flash('notActive', 'please acivate Your Account. !! before Login .');
                return redirect()
                    ->back()
                    ->withInput($request->only($this->username(), 'remember'));
            }
        }

        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }
}
