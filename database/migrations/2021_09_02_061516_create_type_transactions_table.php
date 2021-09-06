<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTypeTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_ar');
            $table->string('name_fr');
            $table->timestamps();
        });

        DB::table('type_transactions')->insert([
            ['name_en'=>'Add Money for Treasury','name_ar'=>'اضاقه نقود الى الخزينه','name_fr'=>"Ajouter de l'argent pour le Trésor"],
            ['name_en'=>'ِِSalary Disbursement','name_ar'=>'صرف الراتب','name_fr'=>"versement de salaire"],
            ['name_en'=>'Add borrow','name_ar'=>'اضافه سلفه','name_fr'=>"Ajouter un emprunt"],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_transactions');
    }
}
