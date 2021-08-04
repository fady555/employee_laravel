<?php

namespace App\Http\Controllers\ControllerHr;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Jop;
use App\Rules\Arabic;
use App\Rules\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{


    public function index()
    {
        $employee = Employee::with(['jop','addresses','salary'])->get();
        //dd($employee);
        return view('view_app.employee')->with('action','show-all')->with('employees',$employee);
    }

    public function show($id)
    {
        $employee = Employee::with([
            'jop',
            'addresses.country',
            'addresses.city',
            'salary',
            'degree',
            'education',
            'levelExperience',
            'contract.type_of_work',////////////////////////////////////////////////////////////////////
            'user',
        ])->where('id',$id)->get();
       // return ($employee);
        return view('view_app.employee')->with('action','show')->with('employee',$employee);
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function create()
    {
        $jops = Jop::get();
        return view('view_app.employee')->with('action','add')->with(['jops'=>$jops]);
    }


    public function store(Request $request)
    {
        //return $request->all();

        //personal information
        $rules=[
            // THE FIREST ONE SECTION
            'full_name_en'=>['required','string','max:255'],
            'full_name_ar'=>['required','string',new Arabic(),'max:255'],
            'full_name_fr'=>['required','string','max:255'],
            'age'=>['required','numeric','max:100'],
            'email'=>['required','email','unique:employees,email'],
            'phone'=>['required',new Phone,'numeric','size:11'],
            'personal_identity_id'=>['required','numeric','size:14'],
            'personal_identity_img'=>['file','size:<=500'],
            'avatar'=>['file','size:<=500','mimes:jpeg,jpg,png'],
            'name_of_bank'=>['max:255'],
            'number_of_account'=>['nullable','numeric'],
            'number_of_wif_husband'=>['nullable','numeric'],
            'number_of_wif_children'=>['nullable','numeric'],
            // THE SECOND TWO SECTION jop
            'jop_id'=>['required','numeric','exists:jops,id'],
            'type_id'=>['required','numeric','exists:type_of_works,id'],
            'data_of_start_work'=>['required','string'],
            'time_of_attendees'=>['required','string'],
            'time_of_going'=>['required','string'],
            'contract'=>['size:500'],
            'fixed_salary'=>['numeric'],
            //



        ];


         $request->validate($rules);












    }








    public function destroy($id)
    {
        //
    }
}
