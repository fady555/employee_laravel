<?php

namespace App\Observers;

use App\Employee;
use App\LevelExperience;

class ExperienceObserver
{
    public function deleting(LevelExperience $LevelExperience){
        $em = Employee::where('level_experience_id',$LevelExperience->id);
        $em->update(['level_experience_id'=>1]);
    }
}
