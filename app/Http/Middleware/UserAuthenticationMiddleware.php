<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class UserAuthenticationMiddleware
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
        // URL::forceRootUrl('http://127.0.0.1:8700');
        if (!Session::get('authentication')) {
            return redirect(url('login'))->with('error', 'Please authenticate yourself.');
        }
        return $next($request);
    }
}
