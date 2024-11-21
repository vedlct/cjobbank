<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
//                return redirect(RouteServiceProvider::HOME);
                if (Auth::user()->fkuserTypeId == USER_TYPE['Admin'] || Auth::user()->fkuserTypeId == USER_TYPE['Emp']) {
                    return redirect()->route('admin.dashboard');
                }

                if (Auth::user()->fkuserTypeId == USER_TYPE['User']) {
                    return redirect()->route('candidate.cvPersonalInfo');
                }

                if (Auth::user()->fkuserTypeId == USER_TYPE['ZoneAdmin']) {
                    return redirect()->route('zone.admin.dashboard');
                }
            }
        }

        return $next($request);
    }
}
