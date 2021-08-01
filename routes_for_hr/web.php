<?php

use App\Employee;
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

Route::get('/999', function () {
    return view('welcome');
});


$group = [
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
];

Route::group($group,function (){

    Route::get('/employee/show-all','EmployeeController@index')->name('show_employees');
    Route::get('/employee/show/{id?}','EmployeeController@show')->name('show_employee');
    Route::get('/employee/edit/{$id?}','EmployeeController@edit')->name('edit_employee');
    Route::get('/employee/delete/{$id?}','EmployeeController@edit')->name('delete_employee');

});








Route::get('ooo',function (){
    $employee = Employee::with([
        'jop',
        'addresses.country',
        'addresses.city',
        'salary',
        'degree',
        'education',
        'levelExperience',
        'contract',
        'user',
    ])->where('id',1)->get();

    return $employee;
});











