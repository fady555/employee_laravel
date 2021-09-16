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



        if(session()->has('user_login')){
            $user = session()->get('user_login');
            $premisess_user = json_decode($user[0]['premisess']);
        }else{
            //mean api token
            $premisess_user = json_decode(request()->user()->premisses);

        }

        if(in_array($premisess_number,$premisess_user)){
            return $next($request);
        }else{
            session()->flash('access_premisses_deny','access premisses deny you have to option login  or ');
            return redirect('/login');
        }


    }
}
