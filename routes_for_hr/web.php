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
    Route::get('/employee/add','EmployeeController@create')->name('add_employee');
    Route::post('/employee/store','EmployeeController@store')->name('store_employee');

    Route::get('/employee/edit/{id?}','EmployeeController@edit')->name('edit_employee');
    Route::get('/employee/delete/{id?}','EmployeeController@destroy')->name('delete_employee');

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
        'contract.type_of_work',
        'user',
    ])->where('id',3)->get();

    return $employee;
});


Route::get('jops',function (){
    $jops = \App\Jop::get();
    return json_encode($jops);
});

Route::get('type_of_works',function (){
    $types = \App\TypeOfWork::get();
    return json_encode($types);
});
Route::get('education_status',function (){
    $education = \App\EducationStatus::get();
    return json_encode($education);
});
Route::get('degrees',function (){
    $degrees = \App\Degree::get();
    return json_encode($degrees);
});
Route::get('experience',function (){
    $experience = \App\LevelExperience::get();
    return json_encode($experience);
});

Route::get('cities/{country_id}',function ($country_id){
    $cities = \App\City::where('country_id',$country_id)->get();
    return json_encode($cities);
});


Route::get('generate-username',function (){

    //return rand(0,10000000);

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    return generateRandomString(5).rand(0,10000000);
});












