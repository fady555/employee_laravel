<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeOfWork extends Model
{
    protected $table ='type_of_works';
    protected $fillable=[
        'work_type_en',
        'work_type_ar',
        'work_type_fr',
        'description_en',
        'description_ar',
        'description_fr',
    ];
}
