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

        $type_work = $request->validate([

            'work_type_en'=>['required'],
            'work_type_ar'=>['required'],
            'work_type_fr'=>['required'],
            'description_en'=>[],
            'description_ar'=>[],
            'description_fr'=>[],
        ]);

        TypeOfWork::create($type_work);

        session()->flash('suc',trans('app.add new type of work success'));

        return redirect()->back();

    }

    public function show($id){

        $types = TypeOfWork::get();
        $type  = TypeOfWork::find($id);

        return view('view_app.type_work')->with(['types'=>$types,'type'=>$type]);

    }
    public function update(Request $request,$id){

        $type_work = $request->validate([
            'work_type_en'=>['required'],
            'work_type_ar'=>['required'],
            'work_type_fr'=>['required'],
            'description_en'=>[],
            'description_ar'=>[],
            'description_fr'=>[],
        ]);

        TypeOfWork::find($id)->update($type_work);

        session()->flash('suc',trans('app.update new type of work success'));

        return redirect()->back();

    }


    public function destroy($id){
        //return $id;

        if($id == 1 or DB::table('type_of_works')->where('id',$id)->doesntExist()): return false; endif;

        TypeOfWork::find($id)->delete();

        return true;
    }
}
