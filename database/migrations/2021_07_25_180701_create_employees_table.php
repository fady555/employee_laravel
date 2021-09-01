<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {

            $table->id();
            $table->string('full_name_ar');
            $table->string('full_name_en');
            $table->string('full_name_fr');
            $table->integer('age');
            $table->string('avatar')->nullable();
            $table->date('data_of_start_work');
            $table->string('personal_identity_id');
            $table->string('personal_identity_img')->nullable();
            $table->integer('number_of_day_vacancy')->default(21);
            $table->integer('number_of_day_vacancy_taken');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('name_of_bank')->nullable();
            $table->string('number_of_account')->nullable();
            $table->tinyInteger('number_of_wif_husband')->nullable();
            $table->tinyInteger('number_of_wif_children')->nullable();
            $table->time('time_of_attendees');
            $table->time('time_of_going');
            $table->longText('experience_description');


            //=============================================================
            $table->unsignedBigInteger('address_id');
            $table->foreign('address_id')->references('id')->on('addresses')->onUpdate('cascade')->onDelete('cascade');
            //=============================================================
            $table->unsignedBigInteger('jop_id')->nullable(20);
            $table->foreign('jop_id')->references('id')->on('jops')->onUpdate('cascade')->onDelete('cascade');
            //=============================================================
            $table->unsignedBigInteger('degree_id');
            $table->foreign('degree_id')->references('id')->on('degrees')->onUpdate('cascade')->onDelete('cascade');
            //=============================================================
            $table->unsignedBigInteger('education_status_id');
            $table->foreign('education_status_id')->references('id')->on('education_statuses')->onUpdate('cascade')->onDelete('cascade');
            //=============================================================
            $table->unsignedBigInteger('level_experience_id');
            $table->foreign('level_experience_id')->references('id')->on('level_experiences')->onUpdate('cascade')->onDelete('cascade');
            //=============================================================
            $table->unsignedBigInteger('contract_id');
            $table->foreign('contract_id')->references('id')->on('contracts')->onUpdate('cascade')->onDelete('cascade');
            //=============================================================
            $table->unsignedBigInteger('salary_id');
            $table->foreign('salary_id')->references('id')->on('all_type_salaries')->onUpdate('cascade')->onDelete('cascade');
            //=============================================================



            $table->timestamps();
        });


        DB::table('employees')->insert([
            [
                'full_name_ar'=>'HR/محمد على محمود',
                'full_name_en'=>'HR/Ahmed Ail Mohamed',
                'full_name_fr'=>'HR/Ahmed Ali Mohamed',
                'age'=>32,
                'avatar'=>null,
                'data_of_start_work'=>'2000-1-1',
                'personal_identity_id'=>'12345678915678',
                'personal_identity_img'=>null,
                'number_of_day_vacancy'=>21,
                'number_of_day_vacancy_taken'=>0,
                'email'=>'mohamed_ali@gamil.com',
                'phone'=>'01287917557',
                'name_of_bank'=>'NBE',
                'number_of_account'=>56565646,
                'number_of_wif_husband'=>4,
                'number_of_wif_children'=>3,
                'time_of_attendees'=>'80:00',
                'time_of_going'=>'18:00',
                'experience_description'=>'لديه خبرا فى ادراه الموارد البشريه بشرطات القطاع الخاص',
                'address_id'=>1,
                'jop_id'=>2,
                'degree_id'=>3,
                'education_status_id'=>2,
                'level_experience_id'=>4,
                'contract_id'=>1,
                'salary_id'=>1,
            ]
            ,

            [
                'full_name_ar'=>'شادى ابراهيم عثمان',
                'full_name_en'=>'Shady Ibrahem Osman',
                'full_name_fr'=>'Shady Ibrahem Osman',
                'age'=>39,
                'avatar'=>null,
                'data_of_start_work'=>'2000-1-31',
                'personal_identity_id'=>'8688585858585',
                'personal_identity_img'=>null,
                'number_of_day_vacancy'=>21,
                'number_of_day_vacancy_taken'=>3,
                'email'=>'shad545441@gamil.com',
                'phone'=>'01087924515',
                'name_of_bank'=>'QNB',
                'number_of_account'=>5999989,
                'number_of_wif_husband'=>1,
                'number_of_wif_children'=>2,
                'time_of_attendees'=>'80:00',
                'time_of_going'=>'18:00',
                'experience_description'=>'lab lab lab ',
                'address_id'=>2,
                'jop_id'=>2,
                'degree_id'=>3,
                'education_status_id'=>3,
                'level_experience_id'=>3,
                'contract_id'=>2,
                'salary_id'=>2,

            ]
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
