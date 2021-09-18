
<?php

use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/




$middleware = [
    'auth:api'
];

$group = [
    'prefix'=>env('Api_password').'/{lang?}/',
    'middleware' => $middleware,
];


Route::group($group,function (){


    Route::get('show-employee','EmployeeControllerApi@index');
    Route::post('add-employee','EmployeeControllerApi@store');

    #get user
    #post/put user
    #delete user




});



