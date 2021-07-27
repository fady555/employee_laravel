<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeOfWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('type_of_works', function (Blueprint $table) {
            $table->id();
            $table->string('work_type_en');
            $table->string('work_type_ar');
            $table->string('work_type_fr');
            $table->text('description_en')->nullable();
            $table->text('description_ar')->nullable();
            $table->text('description_fr')->nullable();
            $table->timestamps();
        });

        DB::table('type_of_works')->insert([
            ['work_type_en'=>'Full Time','work_type_ar'=>'دوام كامل','work_type_fr'=>'À plein temps','description_en'=>'lab lab lab '],
            ['work_type_en'=>'Part Time','work_type_ar'=>'دوام جزئى','work_type_fr'=>'À temps partiel','description_en'=>'lab lab lab '],
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_of_works');
    }
}
