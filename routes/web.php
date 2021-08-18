<?php

use Illuminate\Support\Facades\Route;
use App\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

$group = [
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
];

Route::group($group,function (){

    Route::get('op',function (){


    });

    //middleware => 'login'    ==    'premises:1'

    Route::get('login','LoginController@index');
    Route::post('login','LoginController@login')->name('login');
    Route::get('logout','LoginController@logout')->name('logout')->middleware(['login']);
    Route::view('start-page','start_page')->name('start_page')->middleware(['login']);







    #test user to check
    /*Route::get('all',function (){$x = session()->all(); return $x;});

    Route::get('get',function (){$x =  session()->get('user_login');return $x['id'];});

    Route::get('flush',function (){ session()->flush('user_login');return "seesion deleted";});*/

    $middleware = [
        'login',#user must be login
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

    ];

    //Route::get('test',function (){return "test" ; })->middleware($middleware);
    //Route::view('ee','view_app.employee');
    //Route::view('lo','login');

    Route::view('testq','test1');
});





Route::post('file',function (Request $request){


    return $request->file('fileUp')->store('public/sss');


});

Route::get('time',function (Request $request){


    echo date( "Y-m-d", strtotime( "04 August 2021" ) );


});


Route::get('mm',function (Request $request){



    //if(file_exists('storage/personal_identity_img/generalt.jpg')){unlink('storage/personal_identity_img/generalt.jpg');}



});












