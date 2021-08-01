<?php

namespace App\Http\Controllers\ControllerHr;

use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
            'contract',
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
        //
    }


    public function store(Request $request)
    {
        //
    }








    public function destroy($id)
    {
        //
    }
}
