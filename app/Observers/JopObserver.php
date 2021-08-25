<?php

namespace App\Observers;

use App\Employee;
use App\Jop;

class JopObserver
{
    public function deleting(Jop $jop)
    {
        $em = Employee::where('jop_id',$jop->id);
        $em->update(['jop_id'=>1]);
    }

}
