<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePremisessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('premisess', function (Blueprint $table) {
            $table->id();
            $table->string('nik_name');
            $table->text('description_en')->default('');
            $table->text('description_ar')->default('');
            $table->text('description_fr')->default('');
            $table->timestamps();
        });

        DB::table('premisess')->insert([


            ['nik_name'=>'show_jops'],
            ['nik_name'=>'add_jops'],
            ['nik_name'=>'edit_jops'],
            ['nik_name'=>'delete_jops'],

            ['nik_name'=>'show_degree'],
            ['nik_name'=>'add_degree'],
            ['nik_name'=>'edit_degree'],
            ['nik_name'=>'delete_degree'],

            ['nik_name'=>'show_education_status'],
            ['nik_name'=>'add_education_status'],
            ['nik_name'=>'edit_education_status'],
            ['nik_name'=>'delete_education_status'],

            ['nik_name'=>'show_level_experience'],
            ['nik_name'=>'add_level_experience'],
            ['nik_name'=>'edit_level_experience'],
            ['nik_name'=>'delete_level_experience'],


            ['nik_name'=>'show_all_type_salary'],
            ['nik_name'=>'add_all_type_salary'],
            ['nik_name'=>'edit_all_type_salary'],
            ['nik_name'=>'delete_all_type_salary'],

            ['nik_name'=>'show_type_of_work'],
            ['nik_name'=>'add_type_of_work'],
            ['nik_name'=>'edit_type_of_work'],
            ['nik_name'=>'delete_type_of_work'],

            ['nik_name'=>'show_contract'],
            ['nik_name'=>'add_contract'],
            ['nik_name'=>'edit_contract'],
            ['nik_name'=>'delete_contract'],

            ['nik_name'=>'show_address'],
            ['nik_name'=>'add_address'],
            ['nik_name'=>'edit_address'],
            ['nik_name'=>'delete_address'],


            ['nik_name'=>'show_employees'],
            ['nik_name'=>'add_employees'],
            ['nik_name'=>'edit_employees'],
            ['nik_name'=>'delete_employees'],

            ['nik_name'=>'show_users'],
            //['nik_name'=>'add_user'],
            ['nik_name'=>'edit_user'],
            //['nik_name'=>'delete_user'],



        ]);
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('premisess');
    }
}
