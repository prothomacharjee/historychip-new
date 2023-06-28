<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SameSiteMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if ($response instanceof \Symfony\Component\HttpFoundation\Response) {
            $response->headers->setCookie(
                new Cookie(session()->getName(), session()->getId(), 0, '/', null, false, true, false, 'strict')
            );
        }

        return $response;
    }
}
