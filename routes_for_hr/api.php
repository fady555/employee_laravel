
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




    #get employee
    #----http://localhost/employee_laravel/public/api/employee30305525/ar/employee
    Route::get('employee',function (){
        $employee = Employee::with([
            'jop',
            'addresses.country',
            'addresses.city',
            'salary',
            'degree',
            'education',
            'levelExperience',
            'contract.type_of_work',
            'user',
        ])->paginate(1);
        return response()->json($employee);
    });

    #get user
    #post/put user
    #delete user




});



