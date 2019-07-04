<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RestrictTaskerMiddleware
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
        if(Auth::check()){
            if(auth()->user()->user_type == "Client"){
                return $next($request);
            }
            return redirect('/home');
        }
        return redirect('/login');
    }
}
