<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CorporateAccessMiddleware
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
        // checking if this corporate user is active
        if (session()->has('corporate')) {
            $corporate = session()->get('corporate');
            if ($corporate->status == 'active') {
                return $next($request);
            } else {
                return redirect()->back()->withErrors('Your corporate account is not active yet. Please activate your account first.');
            }
        }
        return $next($request);
    }
}
