<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    protected $fillable=[
                'id',
                'name_ar',
                'name_en',
                'name_fr',
                'code',
                'country_id',
    ];


    public function country(){
        return $this->hasOne('App\City','country_id','id');
    }
}
