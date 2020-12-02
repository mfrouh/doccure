<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Checkrole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,$graud=null)
    {
        if (auth()->check()) {
           if (auth()->user()->role==$graud) {
              return $next($request);
           }
           else
           {
               return abort(404);
           }
           return redirect('/login');
        }
        return redirect('/login');
    }
}
