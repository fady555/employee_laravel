<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeTransaction extends Model
{
    protected $table = "type_transactions";
    protected $fillable = ['name_en', 'name_ar', 'name_fr',];

}
