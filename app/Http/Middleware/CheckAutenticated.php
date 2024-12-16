<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('user')) {
            return redirect('/login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        // Validasi role untuk admin
        if ($request->is('admin/*') && session('user.role') !== 'admin') {
            return redirect('/')->with('error', 'Anda tidak memiliki akses.');
        }

        return $next($request);
    }
}