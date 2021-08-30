<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateEducationStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('education_status_ar');
            $table->string('education_status_en');
            $table->string('education_status_fr');
            $table->timestamps();
        });

        DB::table('education_statuses')->insert([
            ['education_status_ar'=>'------','education_status_en'=>'------','education_status_fr'=>'------'],
            ['education_status_ar'=>'طالب','education_status_en'=>'student','education_status_fr'=>'étudiante'],
            ['education_status_ar'=>'حديث تخرج','education_status_en'=>'A fresh graduate','education_status_fr'=>'Un jeune diplômé'],
            ['education_status_ar'=>'ذو خبره','education_status_en'=>'Experienced','education_status_fr'=>'Expérimenté'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('education_statuses');
    }
}
