<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RouteDashboard
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
        if (auth()->check()) {
            if (auth()->user()->role=='admin') {
               return redirect('/admin/dashboard') ;
            }
            elseif(auth()->user()->role=='doctor')
            {
                return redirect('/doctor/dashboard') ;
            }
            elseif(auth()->user()->role=='patient')
            {
                return redirect('/patient/dashboard') ;
            }
            return redirect('/login');
         }
    }
}
