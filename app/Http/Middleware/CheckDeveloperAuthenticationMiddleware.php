<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckDeveloperAuthenticationMiddleware
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
        $authentication = Session::get('authentication');
        if (is_null($authentication)) {
            return redirect(url('login'))->with('error', 'Please authenticate yourself.');
        }
        $userType = isset($authentication->accountType) ? $authentication->accountType : false;
        if($userType && ($userType == 'Developer' || $userType == 'Admin')){
            return $next($request);
        }
        Session::forget('authentication');
        return redirect(url('login'))->with('error', 'Please authenticate yourself 1.');
    }
}
