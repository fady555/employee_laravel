<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            //====================================================
            $table->unsignedBigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('type_of_works')->onUpdate('cascade')->onDelete('cascade');
            //=====================================================
            $table->text('contract_file')->nullable();
            $table->timestamps();
        });


        DB::table('contracts')->insert([
            ['type_id'=>2,'contract_file'=>null],
            ['type_id'=>3,'contract_file'=>null],
        ]);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
}
