<?php

namespace App\Http\Controllers\ControllerHr;


use App\Degree;
use App\Http\Controllers\Controller;
use App\Rules\Arabic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerDegree extends Controller
{
    public function index(){
        $degrees = Degree::get();

        return view('view_app.degree')->with(['degrees'=>$degrees]);
    }
    public function create(Request $request){

        $rules = [
            'degree_ar'=>['required','string',new Arabic()],
            'degree_en'=>['required','string'],
            'degree_fr'=>['required','string'],
        ];


        $result = validator($request->all(),$rules,[],$this->attValidate());

        if($result->fails()){return back()->withErrors($result)->withInput();}




        Degree::create($request->all());

        session()->flash('suc',trans('app.add new of degree success'));

        return redirect()->back();

    }

    public function show($id){

        $degrees = Degree::get();
        $degree  = Degree::find($id);

        return view('view_app.degree')->with(['degrees'=>$degrees,'degree'=>$degree]);

    }
    public function update(Request $request,$id){

        $rules = [
            'degree_ar'=>['required','string',new Arabic()],
            'degree_en'=>['required','string'],
            'degree_fr'=>['required','string'],
        ];


        $result = validator($request->all(),$rules,[],$this->attValidate());

        if($result->fails()){return back()->withErrors($result)->withInput();}

        Degree::find($id)->update($request->all());

        session()->flash('suc',trans('app.update new degree success'));

        return redirect()->back();

    }


    public function destroy($id){

        if($id == 1 or DB::table('degrees')->where('id',$id)->doesntExist()): return false; endif;

        Degree::find($id)->delete();

        return true;
    }

    public function attValidate(){
        return [
            'degree_ar'=>trans('app.degree name arabic'),
            'degree_en'=>trans('app.degree name english'),
            'degree_fr'=>trans('app.degree name france'),
        ];
    }
}
