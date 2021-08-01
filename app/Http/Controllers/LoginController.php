<?php

namespace App\Http\Controllers;

use App\Rules\UsernameRule;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index(){
        return view('login');
    }


    public function login(Request $request){

        $message = [
            'username.required'=>trans('app.The username field is required'),
            'username.exists'=>trans('app.username no premises'),
            'password.required'=>trans('app.The password field is required')
        ];

        $request->validate([
            'username'=>['required','exists:users,username'],
            'password'=>['required'],
        ],$message);



        session()->flush('user_login');

       $auth =  Auth::attempt(array('username'=>$request->username,'password'=>$request->password),true);

       if ($auth){

          $user = User::where('username',$request->username)->get();

          //return $user[0]->id;

           $request->session()->push('user_login',['id'=>$user[0]->id,'employee_id'=>$user[0]->employee_id,'username'=>$user[0]->username,'premisess'=>$user[0]->premisses]);

           //echo   "you login success";
           //return session()->all();
           return redirect()->route('start_page');



       }else{

           //session()->flash('login_error',trans('app.review login again'));
           return redirect('/login')->with('login_error',trans('app.password or username faild'));

       }
    }


    public function logout(){
        session()->flush('user_login');
        return redirect('/login');
    }
}
