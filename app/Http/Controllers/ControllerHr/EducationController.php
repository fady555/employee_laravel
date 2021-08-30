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

        $education = $request->validate([
            'education_status_ar'=>['required','string'],
            'education_status_en'=>['required','string'],
            'education_status_fr'=>['required','string'],
        ]);

        EducationStatus::create($education);

        session()->flash('suc',trans('app.add new of education success'));

        return redirect()->back();

    }

    public function show($id){

        $educations = EducationStatus::get();
        $education  = EducationStatus::find($id);

        return view('view_app.type_work')->with(['educations'=>$educations,'education'=>$education]);

    }
    public function update(Request $request,$id){

        $education = $request->validate([
            'education_status_ar'=>['required','string'],
            'education_status_en'=>['required','string'],
            'education_status_fr'=>['required','string'],
        ]);

        EducationStatus::find($id)->update($education);

        session()->flash('suc',trans('app.update new education success'));

        return redirect()->back();

    }


    public function destroy($id){

        if($id == 1 or DB::table('education_statuses')->where('id',$id)->doesntExist()): return false; endif;

        EducationStatus::find($id)->delete();

        return true;
    }
}
