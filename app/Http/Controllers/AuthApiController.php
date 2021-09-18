<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AuthApiController extends Controller
{
    public function login(Request $request,$lang = "en"){
        app('translator')->setLocale($lang);


        //return $request->all();

        $result = validator($request->all(),[
            'username' => ['required'],
            'password' => ['required'],
        ]);


        if($result->fails()):

            $content = array(
                'success' => false,
                'data' => $result->messages(),
                'message' => trans('app.password or username faild'),
            );
            return response($content)->setStatusCode(400);

        endif;


        $credentials = [
            'username' => $request['username'],
            'password' => $request['password'],
        ];

            $auth =  auth()->guard('web')->attempt($credentials);

            if($auth == true):

                $user = User::where('username',$request['username'])->first();

                $user->api_token = bin2hex( openssl_random_pseudo_bytes(30)  );
                $user->save();

                $content = array(
                    'success' => true,
                    'data' => $user,
                    'message' => trans('app.login complete success')
                );

                return response($content)->setStatusCode(200);

            else:
                $content = array(
                    'success' => false,
                    'data' => $credentials,
                    'message' => trans('app.password or username faild'),
                );
                return response($content)->setStatusCode(400);

            endif;

    }

    public function logout($lang = "en"){
        app('translator')->setLocale($lang);

        // return auth()->user();

        $user = auth()->user();
        $user->api_token = null;
        $user->save();


        $content = array(
            'success' => true,
            'data' => [],
            'message' => trans('app.logout complete success'),
        );
        return response($content)->setStatusCode(200);

    }

    public function refresh($lang = "en"){

                                                                //token refresh
        app('translator')->setLocale($lang);

        // return auth()->user();

        $user = auth()->user();
        $user->api_token = bin2hex( openssl_random_pseudo_bytes(30)  );
        $user->save();


        $content = array(
            'success' => true,
            'data' => $user,
            'message' => "refresh token",
        );
        return response($content)->setStatusCode(200);

    }
}
