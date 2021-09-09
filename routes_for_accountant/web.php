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

    //accountant  route
    Route::get('/treasury/dashboard','AccountantController@index')->name('treasury');
    Route::get('/treasury/employees','AccountantController@employees')->name('employees_treasury');
    Route::get('/treasury/employee/{id}/{month?}','AccountantController@salary')->name('employee_treasury');
    Route::get('/treasury/status-paid/{id_em}/{month?}','AccountantController@cheek_paid')->name('employee_treasury_cheek_paid');
    Route::post('/treasury/paid/{id_em}/{month?}','AccountantController@paid')->name('employee_treasury_paid');
    //type transactions route
    Route::get('/treasury/types-type-transactions','TypeOfTransactionController@index')->name('type_transactions');
    Route::post('/treasury/edit-type-transactions/{id?}','TypeOfTransactionController@update')->name('edit_type_transactions')->middleware(['premises:admin']);
    Route::post('/treasury/delete-type-transactions/{id?}','TypeOfTransactionController@destroy')->name('delete_type_transactions')->middleware(['premises:admin']);
    Route::post('/treasury/add-type-transactions/{id?}','TypeOfTransactionController@store')->name('create_type_transactions');

    //transactions route

    Route::get('/treasury/add-transaction','TransactionController@create')->name('add_page_transactions');
    Route::post('/treasury/add-transaction','TransactionController@store')->name('add_transactions');






});


