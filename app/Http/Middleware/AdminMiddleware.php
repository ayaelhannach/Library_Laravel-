<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user() && auth()->user()->is_admin) { // Assuming there's an 'is_admin' field on the User model
            return $next($request);
        }
        
        return redirect('/'); // Redirect to home if not admin
    }
}
