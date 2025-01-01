<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Vérification explicite
        if (!Auth::check() || !Auth::user()->is_admin) {
            return redirect('/');
        }

        return $next($request);
    }
}