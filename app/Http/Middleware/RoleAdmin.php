<?php

namespace App\Http\Middleware;

use Closure;

class RoleAdmin
{
    public function handle($request, Closure $next)
    {
        if (! auth()->check() || auth()->user()->role !== 'admin') {
            abort(403, 'Akses admin');
        }

        return $next($request);
    }
}
