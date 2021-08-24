<?php

namespace App\Http\Controllers\ControllerHr;

use App\Http\Controllers\Controller;
use App\Jop;
use App\Rules\Arabic;
use Illuminate\Http\Request;

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
            'description_en'=>['required','string'],
            'description_ar'=>['required','string',new Arabic()],
            'description_fr'=>['required','string'],
        ]);

        //if($new_jop->fails()){return redirect()->back()->withErrors($new_jop)->withInput();}

        Jop::create($new_jop);
    }




    public function show($id)
    {
        //return request()->segment(4);

        $jops = Jop::get();

        $data['jops'] = $jops;

        $data['edit_jops'] = Jop::find($id);

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
            'description_en'=>['required','string'],
            'description_ar'=>['required','string',new Arabic()],
            'description_fr'=>['required','string'],
        ]);


        return $id;
        /*$jopp = Jop::findOrFail($id);
        $jopp->update($edit_jop);*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
