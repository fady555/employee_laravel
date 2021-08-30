<?php

namespace App\Observers;

use App\Contract;
use App\TypeOfWork;

class TypeObserver
{

    public function deleting(TypeOfWork $typeOfWork)
    {
        Contract::where('type_id',$typeOfWork->id)->update([
            'type_id'=>1,
        ]);
    }





}
