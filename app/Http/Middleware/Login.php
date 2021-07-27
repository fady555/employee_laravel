<?php

namespace App\Http\Middleware;

use Closure;

class Login
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

        $user_session = session()->get('user_login');
        if(isset($user_session[0])){
            return $next($request);
        }else{
            return redirect('/login');
        }
    }
}
