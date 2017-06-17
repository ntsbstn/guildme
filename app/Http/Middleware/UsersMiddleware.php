<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class UsersMiddleware
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
        if( Sentinel::check())
            if( Sentinel::getUser()->roles()->first()->slug == 'user' || Sentinel::getUser()->roles()->first()->slug == 'admin' )
                return $next($request);
            else
            return redirect()->route('loginform')->with(['error' => 'Please login first']);
        else
            return redirect()->route('loginform')->with(['error' => 'Please login first']);
    }
}
