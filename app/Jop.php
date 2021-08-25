<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jop extends Model
{

    protected $table='jops';
    protected $fillable=[
        'name_ar',
        'name_en',
        'name_fr',
        'nic_name',
        'description_en',
        'description_ar',
        'description_fr',
    ];
}
