<?php

use Illuminate\Support\Facades\Route;
use App\Address;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('relation',function (){

    $relations = [
        'addresses',
        'jop',
        'degree',
        'education',
        'levelExperience',
        'contract',
        'salary',
        'user'
    ];

   $x =  \App\Employee::with($relations)->get();

   return $x ;
});

Route::get('user',function (){

    $relations = [
        'employee',
    ];

   $x =  \App\User::with($relations)->get();

   return $x ;
});



$group = [
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
];

Route::group($group,function (){

    Route::get('d',function (){
        return "eny";
    });

});

