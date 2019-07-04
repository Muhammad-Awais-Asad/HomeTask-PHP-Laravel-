<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RestrictMiddleware
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
            if(auth()->user()->user_type == "Tasker"){
                return $next($request);
            }
            return redirect('/home');
        }
        return redirect('/login');
    }
}
