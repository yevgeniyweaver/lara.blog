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
    protected function redirectTo()
    {
        return '/admin';
    }

    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
           // return redirect('/home');///home
             return $this->redirectTo();
        }

        return $next($request);
    }
}
