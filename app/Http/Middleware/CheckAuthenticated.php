<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('user')) {
            return redirect('/login')->withErrors(['message' => 'You must be logged in to access this page.']);
        }
        
        return $next($request);
    }
}
