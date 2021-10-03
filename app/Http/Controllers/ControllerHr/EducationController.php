<?php

namespace App\Http\Controllers\ControllerHr;

use App\EducationStatus;
use App\Http\Controllers\Controller;
use App\Rules\Arabic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EducationController extends Controller
{

    public function index(){
        $educations = EducationStatus::get();

        return view('view_app.educations')->with(['educations'=>$educations]);
    }
    public function create(Request $request){

        $rules = [
            'education_status_ar'=>['required','string',new Arabic()],
            'education_status_en'=>['required','string'],
            'education_status_fr'=>['required','string'],
        ];

        $result = validator($request->all(),$rules,[],$this->attValidate());

        if($result->fails()){return back()->withErrors($result)->withInput();}

        EducationStatus::create($request->all());

        session()->flash('suc',trans('app.add new of education success'));

        return redirect()->back();

    }

    public function show($id){

        $educations = EducationStatus::get();
        $education  = EducationStatus::find($id);

        return view('view_app.educations')->with(['educations'=>$educations,'education'=>$education]);

    }
    public function update(Request $request,$id){

        $rules = [
            'education_status_ar'=>['required','string',new Arabic()],
            'education_status_en'=>['required','string'],
            'education_status_fr'=>['required','string'],
        ];

        $result = validator($request->all(),$rules,[],$this->attValidate());

        if($result->fails()){return back()->withErrors($result)->withInput();}

        EducationStatus::find($id)->update($request->all());

        session()->flash('suc',trans('app.update new education success'));

        return redirect()->back();

    }


    public function destroy($id){

        if($id == 1 or DB::table('education_statuses')->where('id',$id)->doesntExist()): return false; endif;

        EducationStatus::find($id)->delete();

        return true;
    }

    private function attValidate(){
        return [
            'education_status_ar'=>trans('app.education name arabic'),
            'education_status_en'=>trans('app.education name english'),
            'education_status_fr'=>trans('app.education name france'),
        ];
    }
}
