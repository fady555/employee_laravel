<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LevelExperience extends Model
{
    protected $table='level_experiences';
    protected $fillable=[
        'level_experience_ar',
        'level_experience_en',
        'level_experience_fr',

    ];
}
