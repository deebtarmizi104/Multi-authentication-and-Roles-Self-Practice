<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorMiddleware
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
         if(Auth::check() && Auth::user()->role->id == 2){ #check whether the user is authenticated or not and check if the user's role id is as author
           return $next($request);  #request condition redirect to author dashboard
         }else{
           return redirect()->route('login');
         }

     }
}
