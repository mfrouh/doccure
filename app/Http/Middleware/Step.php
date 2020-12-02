<?php

namespace App\Http\Middleware;

use App\Models\Speciality;
use Closure;
use Illuminate\Http\Request;

class Step
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

            if (auth()->check() && auth()->user()->step->name==1)
            {
              $specialities=Speciality::all();
              return  response()->view('doctor.abouteme.create',compact('specialities'));
            }
            if(auth()->check() &&  auth()->user()->step->name==2)
            {
                return  response()->view('doctor.clinic.create');
            }
            return $next($request);


    }
}
