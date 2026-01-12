<?php

namespace App\Http\Middleware;

use Closure;

class RoleGuru
{
    public function handle($request, Closure $next)
    {
        if (! auth()->check() || auth()->user()->role !== 'guru') {
            abort(403, 'Akses guru');
        }

        return $next($request);
    }
}
