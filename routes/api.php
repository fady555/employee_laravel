
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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/





Route::get('123456/employee',function (){
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

    //return response()->json($employee);
    //return request()->user();
    //return \request()->bearerToken();
    //$x  =  \request()->getHttpHost();
   // $x  =  \request()->getSchemeAndHttpHost();
    //$x  =  \request()->decodedPath();
   // $x  =  \request()->addContextualBinding();
   // return $premisess_user = json_decode(request()->user()->premisses);
/*
$data['employee'] = $employee;
$data['local'] = app()->getLocale();*/




    $x =  response()->json($employee);

    return $x ;
    //return response()->json($employee);

    //return ($x) ;

})->middleware(['api','auth:api','premises:20']);
