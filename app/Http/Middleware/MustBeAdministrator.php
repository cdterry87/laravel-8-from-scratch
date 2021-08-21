<?php

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
        if (auth()->guest() || auth()->user()->username !== 'chaset') {
        // if (auth()->user()?->username !== 'chaset') { // PHP8 syntax
            abort(Response::HTTP_FORBIDDEN);
        }

        return $next($request);
    }
}
