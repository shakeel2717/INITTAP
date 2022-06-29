<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CorporateMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        // checking if seession is exisit
        if (!session()->has('corporate')) {
            return redirect()->route('corporate.auth.login');
        } else {
            return $next($request);
        }
    }
}
