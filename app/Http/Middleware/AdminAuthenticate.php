<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // && Auth::guard('admin')->user()->hasPermission('access_admin_panel')
        if (Auth::guard('admin')->check() ) {
            return $next($request);
        }

        // Redirect the user or return a response indicating unauthorized access
        return redirect()->route('admin.login')->with('error', 'You need to logged in first to access the page.');
    }
}
