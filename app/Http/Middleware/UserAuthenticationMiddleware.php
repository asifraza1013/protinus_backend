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
        $authentication = Session::get('authentication');
        if (is_null($authentication)) {
            return redirect(url('login'))->with('error', 'Please authenticate yourself.');
        }
        $userType = isset($authentication->accountType) ? $authentication->accountType : false;
        if($userType && $userType == 'Admin'){
            return $next($request);
        }
        Session::forget('authentication');
        return redirect(url('login'))->with('error', 'You are not allowd to access this page without authentication.');
    }
}
