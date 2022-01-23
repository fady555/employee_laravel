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
$middleware = [
    #language macamara
    'localeSessionRedirect', 'localizationRedirect', 'localeViewPath',
    #user must be login
    'login',
    #premises
    'premises:1',
    'premises:2',
    'premises:3',
    'premises:4',
    'premises:5',
    'premises:6',
    'premises:7',
    'premises:8',
    'premises:9',
    'premises:10',
    'premises:11',
    'premises:12',
    'premises:13',
    'premises:14',
    'premises:15',
    'premises:16',
    'premises:17',
    'premises:18',
    'premises:19',
    'premises:20',
    'premises:21',
    'premises:22',
    'premises:23',
    'premises:24',
    'premises:25',
    'premises:26',
    'premises:27',
    'premises:28',
    'premises:29',
    'premises:30',
    'premises:31',
    'premises:32',
    'premises:33',
    'premises:34',
    'premises:35',
    'premises:36',
    'premises:37',

];


$group = [
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => $middleware
];

Route::group($group,function (){

    //employee
    Route::get('/employee/show-all','EmployeeController@index')->name('show_employees');
    Route::get('/employee/show/{id?}','EmployeeController@show')->name('show_employee');
    Route::get('/employee/add','EmployeeController@create')->name('add_employee');
    Route::post('/employee/store','EmployeeController@store')->name('store_employee');

    Route::get('/employee/edit/{id?}','EmployeeController@edit')->name('edit_employee');
    Route::post('/employee/update/{id?}','EmployeeController@update')->name('update_employee');

    Route::post('/employee/delete/{id?}','EmployeeController@destroy')->name('delete_employee');



    //jop
    Route::get('/jop/show','JopController@index')->name('show_jop');
    Route::get('/jop/show/{id?}','JopController@show')->name('show_jop_id');
    Route::post('/jop/add','JopController@create')->name('add_jop');

    Route::post('/jop/edit/{id?}','JopController@update')->name('edit_jop');

    Route::post('/jop/delete/{id?}','JopController@destroy')->name('delete_jop');
    //experience

    Route::get('/experience/show','ExperienceController@index')->name('show_experience');
    Route::get('/experience/show/{id?}','ExperienceController@show')->name('show_experience_id');
    Route::post('/experience/add','ExperienceController@create')->name('add_experience');

    Route::post('/experience/edit/{id?}','ExperienceController@update')->name('edit_experience');

    Route::post('/experience/delete/{id?}','ExperienceController@destroy')->name('delete_experience');

    //type of work  type_work types-work

    Route::get('/types-work/show','TypeWorkController@index')->name('show_type_work');
    Route::get('/types-work/show/{id?}','TypeWorkController@show')->name('show_type_work_id');
    Route::post('/types-work/add','TypeWorkController@create')->name('add_type_work');

    Route::post('/types-work/edit/{id?}','TypeWorkController@update')->name('edit_type_work');

    Route::post('/types-work/delete/{id?}','TypeWorkController@destroy')->name('delete_type_work');
    //education

    Route::get('/education/show','EducationController@index')->name('show_education');
    Route::get('/education/show/{id?}','EducationController@show')->name('show_education_id');
    Route::post('/education/add','EducationController@create')->name('add_education');

    Route::post('/education/edit/{id?}','EducationController@update')->name('edit_education');

    Route::post('/education/delete/{id?}','EducationController@destroy')->name('delete_education');
    //degree

    Route::get('/degree/show','ControllerDegree@index')->name('show_degree');
    Route::get('/degree/show/{id?}','ControllerDegree@show')->name('show_degree_id');
    Route::post('/degree/add','ControllerDegree@create')->name('add_degree');

    Route::post('/degree/edit/{id?}','ControllerDegree@update')->name('edit_degree');

    Route::post('/degree/delete/{id?}','ControllerDegree@destroy')->name('delete_degree');


    Route::get('/show-file',function (){

        //$path = storage_path('app/'.request()->data);

        return response()->file( storage_path('app/'.request()->data) );


    })->name('show.file');

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








