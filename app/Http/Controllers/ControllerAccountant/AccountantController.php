<?php

namespace App\Http\Controllers\ControllerAccountant;

use App\AllTypeSalary;
use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ViewErrorBag;

class AccountantController extends Controller
{
    public function index(){
        return view('view_app.treasury.treasury');
    }

    public function employees(){

        $employees= Employee::get();
        $data['employees'] = $employees;
        return view('view_app.treasury.employees',$data);
    }

    public function salary($id,$month){

        if($month<= 0 || $month >= 13){return  view('error');}

        $employee= Employee::with(['salary'])->find($id);
        $data['employee'] = $employee;
        return view('view_app.treasury.salary',$data);

    }
    public function paid($id_em,$month){

        if($month<= 0 || $month >= 13){return  false;}
        //============

        $employee = Employee::find($id_em);

        $salary = $employee->salary()->first();

        $salary_paid_status_json_as_arr = json_decode($salary->salary_paid_status,true);


        $salary_paid_status_json_as_arr['month']['month_'.$month] = 1;


        $salary_update =  json_encode($salary_paid_status_json_as_arr);

        $salary = $employee->salary()->update(['salary_paid_status'=>$salary_update]);

        //echo $salary_update;
        return true;

    }

    public function cheek_paid($id_em,$month){
        if($month<= 0 || $month >= 13){return  false;}
        //============

        $employee = Employee::find($id_em);

        $salary = $employee->salary()->first();

        $salary_paid_status_json_as_arr = json_decode($salary->salary_paid_status,true);


        $status = $salary_paid_status_json_as_arr['month']['month_'.$month];

        return $status;


    }
}
