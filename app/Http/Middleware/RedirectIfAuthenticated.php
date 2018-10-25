<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
           // return redirect('/home');
            if (Auth::user()->fkuserTypeId == USER_TYPE['Admin'] || Auth::user()->fkuserTypeId == USER_TYPE['Emp']) {
                return redirect()->route('admin.dashboard');
            }
            elseif (Auth::user()->fkuserTypeId == USER_TYPE['User']) {
                return redirect()->route('candidate.cvPersonalInfo');
            }
        }

        return $next($request);
    }
}
