<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\City;
use App\Address;

class Country extends Model
{
    protected $table='countries';

    protected $fillable=[
            'id',
            'name_ar',
            'name_en',
            'name_fr',
            'code',
    ];


    public function cities(){
       return $this->hasMany('App\City','country_id','id');
    }
}
