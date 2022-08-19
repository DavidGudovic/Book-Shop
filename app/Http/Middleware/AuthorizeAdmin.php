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
      if($user = auth()->user()){
         return $user->role == 'admin' ?  $next($request) : abort(403);
      }
      abort(403);
    }
}
