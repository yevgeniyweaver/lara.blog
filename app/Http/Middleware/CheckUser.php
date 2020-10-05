<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard = null)
    {
//        if ($request->age <= 200) {
//            return redirect('home');
//        }
        if (Auth::guard($guard)->check()) {
            //return redirect('/admin');///home
             return $next($request);
        }

        return redirect('/login');///home//$next($request);
    }
}
