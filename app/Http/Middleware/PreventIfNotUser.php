<?php

namespace App\Http\Middleware;

use Closure;

class PreventIfNotUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!\Auth::user()->hasRole('user')){
            return response()->json(['status'=>['code'=>'403','success'=>false,'message' =>'FORBIDDEN']],403);

        }
        return $next($request);
    }
}
