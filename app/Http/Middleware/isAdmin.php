<?php

namespace App\Http\Middleware;

use Closure;

class isAdmin
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
        if (auth()->user()->level == 'admin') {
            return $next($request);
        }
        // return redirect()->back()->with('error', 'You dont have admin access');
        // return redirect('user');
        return abort(403);
    }
}
