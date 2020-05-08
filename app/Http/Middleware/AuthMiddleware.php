<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class AuthMiddleware
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
        $path = $request->path();
        // dd(Session::get('user'));
        // if(Session::get('user'))
        // {
        //     return redirect()->route('admin-dashboard');
        // }
        // else
        // {
        //     return redirect()->route('admin-login');
        // }
        return $next($request);
    }
}
