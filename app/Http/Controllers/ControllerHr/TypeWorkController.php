<?php

namespace App\Http\Controllers\ControllerHr;

use App\Http\Controllers\Controller;
use App\Jop;
use App\Rules\Arabic;
use App\TypeOfWork;
use Cassandra\Tuple;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TypeWorkController extends Controller
{

    public function index(){
        $types = TypeOfWork::get();

        return view('view_app.type_work')->with(['types'=>$types]);
    }
    public function create(Request $request){

        $rules = [
            'work_type_en'=>['required','string'],
            'work_type_ar'=>['required','string',new Arabic()],
            'work_type_fr'=>['required','string'],
            'description_en'=>['nullable','string'],
            'description_ar'=>['nullable','string',new Arabic()],
            'description_fr'=>['nullable','string'],
        ];

        $result = validator($request->all(),$rules,[],$this->attValidate());

        if($result->fails()){return back()->withErrors($result)->withInput();}

        TypeOfWork::create($request->all());

        session()->flash('suc',trans('app.add new type of work success'));

        return redirect()->back();

    }

    public function show($id){

        $types = TypeOfWork::get();
        $type  = TypeOfWork::find($id);

        return view('view_app.type_work')->with(['types'=>$types,'type'=>$type]);

    }
    public function update(Request $request,$id){

        $rules = [
            'work_type_en'=>['required','string'],
            'work_type_ar'=>['required','string',new Arabic()],
            'work_type_fr'=>['required','string'],
            'description_en'=>['nullable','string'],
            'description_ar'=>['nullable','string',new Arabic()],
            'description_fr'=>['nullable','string'],
        ];

        $result = validator($request->all(),$rules,[],$this->attValidate());

        if($result->fails()){return back()->withErrors($result)->withInput();}

        TypeOfWork::find($id)->update($request->all());

        session()->flash('suc',trans('app.update new type of work success'));

        return redirect()->back();

    }


    public function destroy($id){
        //return $id;

        if($id == 1 or DB::table('type_of_works')->where('id',$id)->doesntExist()): return false; endif;

        TypeOfWork::find($id)->delete();

        return true;
    }

    public function attValidate(){
        return [
            'work_type_en'=>trans('app.type of work name english'),
            'work_type_ar'=>trans('app.type of work name arabic'),
            'work_type_fr'=>trans('app.type of work name france'),
            'description_en'=>trans('app.type of work description english'),
            'description_ar'=>trans('app.type of work description arabic'),
            'description_fr'=>trans('app.type of work description france'),
        ];
    }
}
