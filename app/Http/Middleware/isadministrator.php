<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class isadministrator
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
        if(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug == 'master') {
            return $next($request);
        }
        else{
            Sentinel::logout();
            return redirect()->route('sentinel_loginpage');
        }
    }
}