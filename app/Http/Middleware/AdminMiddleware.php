<?php

namespace App\Http\Middleware; // Ensure this namespace is correct

use Closure;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        \Log::info('AdminMiddleware: Checking user access');

        if (auth()->check() && auth()->user()->is_admin) {
            \Log::info('AdminMiddleware: User is admin');
            return $next($request);
        }

        \Log::info('AdminMiddleware: User is not admin, redirecting to /home');
        return redirect('/home')->with('error', 'You do not have access to this page.');
    }
}
