<?php

namespace App\Http\Controllers\ControllerAccountant;

use App\Http\Controllers\Controller;
use App\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(){


    }

    public function create(){

        return view('view_app.treasury.transaction');

    }

    public function store(Request $request){

       $x =  $request->validate([
            'teller'=>['required','string'],
            'recipient'=>['required','string'],
            'type'=>['required','string'],
            'money'=>['required','integer','between:1,100000'],
        ]);

       Transaction::create($x);

       return back();



    }
}
