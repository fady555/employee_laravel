<?php

namespace App\Http\Controllers\ControllerAccountant;

use App\Http\Controllers\Controller;
use App\Rules\Arabic;
use App\TypeTransaction;
use Illuminate\Http\Client\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceResponse;

class TypeOfTransactionController extends Controller
{

    public function index()
    {
        $types= TypeTransaction::get();
        $data['types'] = $types;
        return view('view_app.treasury.type_of_transaction',$data);
    }


    public function store(Request $request)
    {

        $x = $request->validate([
            'name_en'=>['required','string'],
            'name_ar'=>['required','string',new Arabic()],
            'name_fr'=>['required','string'],
        ]);

        TypeTransaction::create($x);

        return back();
    }


    public function update(Request $request,$id)
    {

      $x =  $request->validate([
            'name_en_'.$id=>['required','string'],
            'name_ar_'.$id=>['required','string',new Arabic()],
            'name_fr_'.$id=>['required','string'],
        ]);


      $type = TypeTransaction::find($id);
      $type->update([
          'name_en'=>$request->{'name_en_'.$id},
          'name_ar'=>$request->{'name_ar_'.$id},
          'name_fr'=>$request->{'name_fr_'.$id},
      ]);
      return back();
    }


    public function destroy($id)
    {
        TypeTransaction::find($id)->delete();
        return back();
    }
}
