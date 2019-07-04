<?php

namespace App\Http\Middleware;

use Closure;
use App\UserProfile;

class TaskerProfileMiddleware
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
        if(UserProfile::where('user_id_fk', auth()->user()->id)->pluck('user_street')->all()){
            return redirect('/tasker/profile');
        }
        return $next($request);
    }
}
