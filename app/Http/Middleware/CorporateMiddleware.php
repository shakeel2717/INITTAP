<?php

namespace App\Http\Middleware;

use App\Models\Corporate;
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
            // update this session from the database
            $corporate = Corporate::find(session()->get('corporate')->id);
            if (!$corporate) {
                return redirect()->route('corporate.auth.login');
            } else {
                session()->put('corporate', $corporate);
                return $next($request);
            }
        }
    }
}
