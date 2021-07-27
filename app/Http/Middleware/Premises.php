<?php

namespace App\Http\Middleware;

use Closure;

class Premises
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$premisess_number)
    {
        //return $next($request);
        $user = session()->get('user_login');
        $premisess_user = json_decode($user[0]['premisess']);

        if(in_array($premisess_number,$premisess_user)){
            return $next($request);
        }else{
            return redirect('/login');
        }


    }
}
