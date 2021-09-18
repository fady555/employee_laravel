
<?php

use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post(env('Api_password').'/{lang?}/login','AuthApiController@login')->name('api_login');
Route::post(env('Api_password').'/{lang?}/logout','AuthApiController@logout')->middleware(['auth:api']);
Route::post(env('Api_password').'/{lang?}/refresh','AuthApiController@refresh')->middleware(['auth:api']);




