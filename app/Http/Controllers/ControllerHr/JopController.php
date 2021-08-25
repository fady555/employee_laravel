<?php

namespace App\Http\Controllers\ControllerHr;

use App\Employee;
use App\Http\Controllers\Controller;
use App\Jop;
use App\Rules\Arabic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JopController extends Controller
{

    public function index()
    {
        $jops = Jop::get();

        $data['jops'] = $jops;

        return view('view_app.jop',$data);
    }


    public function create(Request $request)
    {
        //return $request->all();

        $new_jop = $request->validate([
            'name_en'=>['required','string'],
            'name_ar'=>['required','string',new Arabic()],
            'name_fr'=>['required','string'],
            'nic_name'=>['required','string'],
            'description_en'=>['nullable','string'],
            'description_ar'=>['nullable','string',new Arabic()],
            'description_fr'=>['nullable','string'],
        ]);

        //if($new_jop->fails()){return redirect()->back()->withErrors($new_jop)->withInput();}

        Jop::create($new_jop);

        return redirect()->back();
    }




    public function show($id)
    {
        //return request()->segment(4);
        if(DB::table('jops')->where('id',$id)->doesntExist()):
            return "error link";
        endif;
        $jops = Jop::get();

        $data['jops'] = $jops;

        $data['jopEdit'] = Jop::find($id);

        return view('view_app.jop',$data);
    }


    public function update(Request $request, $id)
    {
        //return $request->all();
        //return $id;

        $edit_jop = $request->validate([
            'name_en'=>['required','string'],
            'name_ar'=>['required','string',new Arabic()],
            'name_fr'=>['required','string'],
            'nic_name'=>['required','string'],
            'description_en'=>['nullable','string'],
            'description_ar'=>['nullable','string',new Arabic()],
            'description_fr'=>['nullable','string'],
        ]);


        //return $id;
        $jopp = Jop::find($id);
        $jopp->update($edit_jop);
        return redirect()->back();
    }


    public function destroy($id)
    {


        if(DB::table('jops')->where('id',$id)->doesntExist()):return false;   endif;
        if($id == 1 ):return false;   endif;




        $jopD =  Jop::find($id);
        $jopD->delete();

        /*$em = DB::table('employees')->where('jop_id',$id);
        $em->update(['jop_id'=>1]);*/

        return true;

    }
}
