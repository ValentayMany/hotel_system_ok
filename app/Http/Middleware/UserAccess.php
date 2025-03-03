<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    //public function handle(Request $request, Closure $next): Response
   // {
    //    return $next($request);
   // }


public function handle(Request $request, Closure $next, $userType)
{
    if (auth()->user()->type == $userType) {
        return $next($request);
    }

    return response()->json(['message' => 'You do not have permission to access this page.']);
    /* return response()->view('errors.check-permission'); */
}
}