<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateDegreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('degrees', function (Blueprint $table) {
            $table->id();
            $table->string('degree_en')->nullable();
            $table->string('degree_ar')->nullable();
            $table->string('degree_fr')->nullable();
            $table->timestamps();
        });

        DB::table('degrees')->insert([
            ['degree_en'=>"Bachelor of Laws" ,'degree_ar'=>"بكالوريوس في القانون","degree_fr"=>"Baccalauréat en droit"],
            ['degree_en'=>"Bachelor of Commerce" ,'degree_ar'=>"بكالوريوس تجاره","degree_fr"=>"Baccalauréat en commerce"],
            ['degree_en'=>"Bachelor of computer science" ,'degree_ar'=>"بكالوريوس حاسبات معومات","degree_fr"=>"Licence en Sciences informatiques"],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('degrees');
    }
}
