<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthorizeAdmin
{
    /**
     * If user making request isnt admin, throw 403 Unauthorized
     */
    public function handle(Request $request, Closure $next)
    {
       return auth()->user()->role == 'admin' ? return $next($request) : abort(403);
    }
}
