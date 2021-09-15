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

        if( \request()->segment(2) != "123456"):
            abort(404);
        endif;

        return $next($request);
    }
}
