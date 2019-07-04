<?php

namespace App\Http\Middleware;

use Closure;
use App\Biodata;

class RestrictClientMiddleware
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
        if(Biodata::where('user_id_fk', auth()->user()->id)->pluck('client_address')->all()){
            return redirect('/client/profile');
        }
        return $next($request);
    }
}
