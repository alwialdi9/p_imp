<?php

namespace App\Http\Middleware;

use Closure;

class isOperator
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
        if (auth()->user()->level == 'operator') {
            return $next($request);
        }
        return redirect()->back()->with('error', 'You dont have User access');
    }
}
