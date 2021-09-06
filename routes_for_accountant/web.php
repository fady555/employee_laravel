<?php

use App\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


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

Route::get('/pp', function () {
    return view('welcome');
});

$middleware = [
    #language macamara
    'localeSessionRedirect', 'localizationRedirect', 'localeViewPath',
    #user must be login
    'login',
    #premises
    'premises:34',
    'premises:35',
    'premises:36',
    'premises:37',
];


$group = [
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => $middleware,
];

Route::group($group,function (){


    Route::get('/treasury/dashboard','AccountantController@index')->name('treasury');
    Route::get('/treasury/employees','AccountantController@employees')->name('employees_treasury');
    Route::get('/treasury/employee/{id}/{month?}','AccountantController@salary')->name('employee_treasury');
    Route::get('/treasury/status-paid/{id_em}/{month?}','AccountantController@cheek_paid')->name('employee_treasury_cheek_paid');
    Route::post('/treasury/paid/{id_em}/{month?}','AccountantController@paid')->name('employee_treasury_paid');

});


Route::get('day',function (){

    //return cal_days_in_month(CAL_GREGORIAN,'9','2021');

    /*$overtime = '{"month":{"month_1":6000,"month_2":90001,"month_3":90002,"month_4":90003,"month_5":90004,"month_6":90005,"month_7":90006,"month_8":90007,"month_9":90008,"month_10":90009,"month_11":900010,"month_12":900011}}';

    $x = json_decode($overtime);

    $x->month->{'month_'."1"} = 908888888;

    $overtime = $x;

    var_dump($overtime);*/



    $employee = Employee::find(1);

    $salary = $employee->salary()->first();





    /*$paid_month_object_string =  $salary->salary_paid_status;
   // $paid_month_json_decode =  json_decode($paid_month_object_string);

    //return $paid_month_json_decode_true_associative['month']['month_1'];

    $string_class = json_decode($salary->salary_paid_status);

    return $string_class;*/

    //echo($salary_paid_status_json['month']['month_1']) ;



/*


    $salary_paid_status_json_as_arr = json_decode($salary->salary_paid_status,true);


    $salary_paid_status_json_as_arr['month']['month_1'] = 55;

    //print_r($salary_paid_status_json_as_arr);

   $salary_update =  json_encode($salary_paid_status_json_as_arr);

    $salary = $employee->salary()->update(['salary_paid_status'=>$salary_update]);

*/











});
