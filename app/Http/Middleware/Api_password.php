<?php

namespace App\Http\Middleware;

use Closure;

class Api_password
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

        if(empty(auth()->user())):
            abort(404);
        endif;

        //return $next($request);
    }
}
