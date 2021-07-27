<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table='employees';
    protected $fillable = [
        'full_name_ar',
        'full_name_en',
        'full_name_fr',
        'age',
        'avatar',
        'data_of_start_work',
        'personal_identity_id',
        'personal_identity_img',
        'number_of_day_vacancy',
        'number_of_day_vacancy_taken',
        'email',
        'phone',
        'name_of_bank',
        'number_of_account',
        'number_of_wif_husband',
        'number_of_wif_children',
        'time_of_attendees',
        'time_of_going',
        'experience_description',
            'address_id',
            'jop_id',
            'degree_id',
            'education_status_id',
            'level_experience_id',
            'contract_id',
            'salary_id',
    ];

    public function addresses(){
        return $this->belongsTo('App\Address','address_id','id');
    }
    public function jop(){
        return $this->belongsTo('App\Jop','jop_id','id');
    }
    public function degree(){
        return $this->belongsTo('App\Degree','degree_id','id');
    }
    public function education(){
        return $this->belongsTo('App\EducationStatus','education_status_id','id');
    }
    public function levelExperience(){
        return $this->belongsTo('App\LevelExperience','level_experience_id','id');
    }

    public function salary(){
        return $this->belongsTo('App\AllTypeSalary','salary_id','id');
    }
    public function contract(){
        return $this->belongsTo('App\Contract','contract_id','id');
    }

    public function user(){
        return $this->hasOne('App\User','employee_id','id');
    }




}
