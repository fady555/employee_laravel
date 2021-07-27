<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Premisese extends Model
{
    protected $table = 'premisess';
    /*protected $fillable = [
        /*'nik_name',
        'description_en',
        'description_ar',
        'description_fr',

    ];*/
    protected $guarded = ['id'];
    protected $guardedForUpdate = ['id'];
}
