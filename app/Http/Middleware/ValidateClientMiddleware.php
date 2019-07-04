<?php

namespace App\Http\Middleware;

use Closure;
use App\Biodata;
use Auth;

class ValidateClientMiddleware
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
            $u = auth()->user()->id;
            $user = Biodata::find($u);
            if($user || auth()->user()->user_type == 'Tasker'){
                return $next($request);
            }
            return redirect('/client/biodata');
        }
        else{
            $user = Biodata::all();
            if($user || auth()->user()->user_type == 'Tasker'){
                return $next($request);
            }
            return redirect('/client/biodata');
        }
        //return redirect('/login');
    }
}