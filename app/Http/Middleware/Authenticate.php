<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (!$request->expectsJson()) {
            return route('login');
        }
        return null;
    }

    protected function authenticate($request, array $guards)
    {
        parent::authenticate($request, $guards);

        if (auth()->check() && auth()->user()->isAdmin()) {
            return redirect()->intended(route('admin.dashboard'));
        }
    }
}
