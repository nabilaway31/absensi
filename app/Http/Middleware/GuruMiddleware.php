<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuruMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Belum login
        if (! Auth::check()) {
            return redirect('/login');
        }

        // Bukan guru
        if (Auth::user()->role !== 'guru') {
            abort(403, 'ANDA TIDAK MEMILIKI AKSES GURU');
        }

        return $next($request);
    }
}
