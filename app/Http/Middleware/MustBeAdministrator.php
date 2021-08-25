<?php

// NO LONGER BEING USED AS OF EPISODE 69
// Switched middelware in routes/web.php to 'can:admin' instead

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MustBeAdministrator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->guest() || $request->user()->cannot('admin')) {
            abort(Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}
