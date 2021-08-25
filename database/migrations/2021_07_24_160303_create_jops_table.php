<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateJopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jops', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar')->nullable()->default('NULL');
            $table->string('name_en')->nullable()->default('NULL');
            $table->string('name_fr')->nullable()->default('NULL');
            $table->string('nic_name');
            $table->longText('description_en')->nullable();
            $table->longText('description_ar')->nullable();
            $table->longText('description_fr')->nullable();
            $table->timestamps();
        });

        DB::table('jops')->insert([
            ['name_en'=>"____",'name_ar'=>"_________","name_fr"=>'_________','nic_name'=>"___________"],
            ['name_en'=>"Human Resource",'name_ar'=>"الموارد البشريه","name_fr"=>'Ressource Humaine','nic_name'=>"HR"],
            ['name_en'=>"law affires",'name_ar'=>"شئون قانونيه","name_fr"=>'ِِAffaires Juridiques','nic_name'=>"law"],
            ['name_en'=>"back end developer",'name_ar'=>"مطور الواجهه الخلفيه","name_fr"=>'développeur back-end','nic_name'=>"BK-end"],
            ['name_en'=>"front end developer",'name_ar'=>"مطور الواجهه الاماميه","name_fr"=>'développeur frontal','nic_name'=>"FR-end"],
            ['name_en'=>"android developer",'name_ar'=>"مطور اندرويد","name_fr"=>'ِِdéveloppeur android','nic_name'=>"And-dev"],
        ]);




    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jops');
    }
}
