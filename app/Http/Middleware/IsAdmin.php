<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (Auth::guard('web')->guest()) {
            return redirect('/login')->with('error','you should login first.');
        }

        if (Auth::check() && Auth::user()->is_admin == 0) {
            //dd("if ontte");
            return response()->json(['status'=>['code'=>'403','success'=>false,'message' =>'FORBIDDEN sorry you are not allowed to this page']],403);
        }

       return $next($request);
    }
   
}
