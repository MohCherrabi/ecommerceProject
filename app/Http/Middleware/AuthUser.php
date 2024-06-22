<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthUser
{
    /**
     * Get the path the user should be redirected to when they are not AuthUserd.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!(Auth::guard('user')->check())){
            return redirect()->route('loginForm');
        }else{
            return $next($request);
        }
    }
}
