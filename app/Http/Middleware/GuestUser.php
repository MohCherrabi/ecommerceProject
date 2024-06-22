<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class GuestUser
{
    /**
     * Get the path the user should be redirected to when they are not AuthUserd.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::guard('user')->check()){
            // dd('hello world');
            return redirect()->route('home');
        }else{
            return $next($request);
        }
    }
}
