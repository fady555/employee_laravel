<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AllTypeSalary extends Model
{
    protected $table = 'all_type_salaries';
    protected $fillable=[
            'fixed_salary',
            'responsibility_allowance',
            'wife_and_children_allowance',
            'natural_work',
            'promotion_bonus',
            'specialization_bonus',
            'transport',
            'extra_work',
            'supplement_salary',
            'rewards',
            'total_dues',
            'discount',
            'borrow',
            'loan',
            'health_insurance',
            'another_discount',
            'tax_income',
            'total_discounts',
    ];
}
