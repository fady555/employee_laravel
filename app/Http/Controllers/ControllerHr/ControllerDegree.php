<?php

namespace App\Http\Controllers\ControllerHr;


use App\Degree;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerDegree extends Controller
{
    public function index(){
        $degrees = Degree::get();

        return view('view_app.degree')->with(['degrees'=>$degrees]);
    }
    public function create(Request $request){

        $degree = $request->validate([
            'degree_ar'=>['required','string'],
            'degree_en'=>['required','string'],
            'degree_fr'=>['required','string'],
        ]);

        Degree::create($degree);

        session()->flash('suc',trans('app.add new of degree success'));

        return redirect()->back();

    }

    public function show($id){

        $degree = Degree::get();
        $degrees  = Degree::find($id);

        return view('view_app.type_work')->with(['degrees'=>$degrees,'degree'=>$degree]);

    }
    public function update(Request $request,$id){

        $degree = $request->validate([
            'degree_ar'=>['required','string'],
            'degree_en'=>['required','string'],
            'degree_fr'=>['required','string'],
        ]);

        Degree::find($id)->update($degree);

        session()->flash('suc',trans('app.update new degree success'));

        return redirect()->back();

    }


    public function destroy($id){

        if($id == 1 or DB::table('degrees')->where('id',$id)->doesntExist()): return false; endif;

        Degree::find($id)->delete();

        return true;
    }
}
