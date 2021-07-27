<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index(){
        return view('test1');
    }


    public function login(Request $request){

        $request->validate([
            'username'=>['required'],
            'password'=>['required'],
        ]);



        session()->flush('user_login');

       $auth =  Auth::attempt(array('username'=>$request->username,'password'=>$request->password),true);

       if ($auth){

          $user = User::where('username',$request->username)->get();

          //return $user[0]->id;

           $request->session()->push('user_login',['id'=>$user[0]->id,'employee_id'=>$user[0]->employee_id,'username'=>$user[0]->username,'premisess'=>$user[0]->premisses]);

           echo   "you login success";
           return session()->all();


       }else{

           return redirect('/login');

       }
    }


    public function logout(){
        session()->flush('user_login');
        return redirect('/login');
    }
}
