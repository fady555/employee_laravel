<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\AllTypeSalary::class, function (Faker $faker) {
    return [
        'fixed_salary' => $faker->numberBetween(1,90000) ,
        'responsibility_allowance' =>$faker->randomFloat(null,1,null)  ,
        'wife_and_children_allowance' =>$faker->numberBetween(0,20),
        'natural_work' =>$faker->randomFloat(null,1,null)  ,
        'promotion_bonus' => $faker->randomFloat(null,1,null) ,
        'specialization_bonus' => $faker->randomFloat(null,1,null) ,
        'transport' => $faker->randomFloat(null,1,null) ,
        'extra_work' =>$faker->randomFloat(null,1,null)  ,
        'supplement_salary' =>$faker->randomFloat(null,1,null)  ,
        'rewards' => $faker->randomFloat(null,1,null) ,
        'total_dues' => $faker->randomFloat(null,1,null) ,
        'discount' =>$faker->randomFloat(null,1,null)  ,
        'borrow' =>$faker->randomFloat(null,1,null)  ,
        'loan' =>$faker->randomFloat(null,1,null)  ,
        'health_insurance' =>$faker->randomFloat(null,1,null)  ,
        'another_discount' =>$faker->randomFloat(null,1,null)  ,
        'tax_income' =>$faker->randomFloat(null,1,null)  ,
        'total_discounts' =>$faker->randomFloat(null,1,null),
    ];
});
