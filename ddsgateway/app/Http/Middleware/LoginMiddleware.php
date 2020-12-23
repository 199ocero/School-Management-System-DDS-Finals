<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class LoginMiddleware
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
        if($path=='/' && Session::get('user')){
            return redirect('dashboard.dashboard');
        }
        return $next($request);
    }
}
