<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationStatus extends Model
{
    protected $table='education_statuses';
    protected $fillable=[
        'education_status_ar',
        'education_status_en',
        'education_status_fr',
    ];
}
