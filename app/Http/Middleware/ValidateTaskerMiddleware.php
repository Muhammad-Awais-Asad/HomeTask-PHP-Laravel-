<?php

namespace App\Http\Middleware;

use Closure;
use App\UserProfile;
use Auth;

class ValidateTaskerMiddleware
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
            //$user = UserProfile::select('id')->where('user_id_fk', $u)->get();
            //$user = UserProfile::find($u);
            //$user = UserProfile::where('user_id_fk', $u)->get(['id']);
            $user = UserProfile::where('user_id_fk', $u)->pluck('user_street')->all();
            //dd($user);
            if($user){
                return $next($request);
            }
            return redirect('/user/commitment');
        }
        return redirect('/login');
    }
}
