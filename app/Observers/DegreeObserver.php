<?php

namespace App\Observers;

use App\Degree;
use App\Employee;

class DegreeObserver
{

    public function deleting(Degree $degree)
    {
        Employee::where('degree_id',$degree->id)->update([
            'degree_id'=>1,
        ]);
    }


}
