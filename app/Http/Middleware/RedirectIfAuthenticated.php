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
            if ($guard == 'admin'){
                return redirect(route('admin.dashboard'));
            } else if ($guard == 'staff') {
                return redirect(route('staff.dashboard'));
            } else if ($guard == 'student') {
                return redirect(route('student.dashboard'));
            } else {
                return redirect($guard);
            }
        }
        return $next($request);
    }
}
