<?php

namespace App\Observers;

use App\EducationStatus;
use App\Employee;

class EducationObserver
{

    public function deleting(EducationStatus $educationStatus)
    {
        Employee::where('education_status_id',$educationStatus->id)->update([
            'education_status_id'=>1
        ]);
    }

}
