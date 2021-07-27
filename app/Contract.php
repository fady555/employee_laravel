<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $table='contracts';
    protected $fillable=[
        'type_id',
        'contract_file',
    ];



    public function type_of_work(){
        return $this->hasOne('App\TypeOfWork','type_id','id');
    }
}
