<?php

namespace App\Http\Middleware;

use Closure;
use App\UserProfile;
use App\Biodata;
use Auth;

class RestrictHomeMiddleware
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
            if(auth()->user()->user_type == "Tasker"){
                $user = UserProfile::find($u);
                if(!$user){
                return $next($request);
                }
                return redirect('/tasker/profile');
            }
            else if(auth()->user()->user_type == "Client"){
                $user = Biodata::find($u);
                if(!$user){
                return $next($request);
                }
                return redirect('/client/profile');
            }
        }
        return redirect('/login');
    }
}
