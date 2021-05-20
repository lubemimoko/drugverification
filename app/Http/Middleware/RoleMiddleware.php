<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,  $guard = 'admin')
    {
        // $user = Auth::user()->role;

        // if($user === "admin"){
        //     return $next($request);
        // }else{
        //     return '/';
        // }
        // echo $user = Auth::user()->role;die;
        if (Auth::user()->role !== 'admin') {
            return redirect('/');
        }
    
        return $next($request);
    }

    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return '/';
        }
    }
}
