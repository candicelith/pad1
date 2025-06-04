<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Allow access if the user is authenticated and has id_roles of '1'
        if (Auth::check() && Auth::user()->id_roles == '1') {
            return $next($request);
        }
        // Deny access for other users by returning a 404 error
        return abort(404);
    }
}
