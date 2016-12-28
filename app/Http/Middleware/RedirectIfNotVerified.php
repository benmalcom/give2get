<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RedirectIfNotVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::guest()){
            return redirect('/login');
        }
        else if(!Auth::user()->account_verified) {
            return redirect('/activate-account');
        }
        return $next($request);
    }
}