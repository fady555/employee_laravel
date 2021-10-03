<?php

namespace App\Http\Controllers\ControllerHr;

use App\Http\Controllers\Controller;
use App\LevelExperience;
use App\Rules\Arabic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExperienceController extends Controller
{


    public function index(){
        $experiences = LevelExperience::get();

        return view('view_app.experience')->with(['experiences'=>$experiences]);
    }
    public function create(Request $request){
        //return $request->all();

        $rules = [
            'level_experience_en'=>['required','string'],
            'level_experience_ar'=>['required','string',new Arabic()],
            'level_experience_fr'=>['required','string'],
        ];


        $result = validator($request->all(),$rules,[],$this->attValidate());

        if($result->fails()){return back()->withErrors($result)->withInput();}

        LevelExperience::create($request->all());

        session()->flash('suc',trans('app.add new experience success'));

        return redirect()->back();

    }

    public function show($id){

        $experiences = LevelExperience::get();
        $experience = LevelExperience::find($id);

        return view('view_app.experience')->with(['experiences'=>$experiences,'experience'=>$experience]);

    }
    public function update(Request $request,$id){
        //return  $request;
        $rules = [
            'level_experience_en'=>['required','string'],
            'level_experience_ar'=>['required','string',new Arabic()],
            'level_experience_fr'=>['required','string'],
        ];


        $result = validator($request->all(),$rules,[],$this->attValidate());

        if($result->fails()){return back()->withErrors($result)->withInput();}

        LevelExperience::find($id)->update($request->all());

        session()->flash('suc',trans('app.update new experience success'));

        return redirect()->back();

    }


    public function destroy($id){
        //return $id;

        if($id == 1 or DB::table('level_experiences')->where('id',$id)->doesntExist()): return false; endif;

        LevelExperience::find($id)->delete();

        return true;
    }

    private function attValidate(){
        return [
            'level_experience_en'=>trans('app.experience name english'),
            'level_experience_ar'=>trans('app.experience name arabic'),
            'level_experience_fr'=>trans('app.experience name france'),
        ];
    }


}
