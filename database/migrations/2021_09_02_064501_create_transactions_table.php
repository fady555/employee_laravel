<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->integer('month');
            $table->integer('number_day_month');

            $table->unsignedBigInteger('type_transaction_id');
            $table->foreign('type_transaction_id')->references('id')->on('type_transactions')->onDelete('cascade')->onUpdate('cascade');


            $table->bigInteger('employee_id')->nullable()->unsigned();
            $table->index('employee_id')->nullable();
            $table->foreign('employee_id')->nullable()->references('id')->on('employees')->onDelete('cascade');

            $table->timestamps();
        });

        DB::table('transactions')->insert([
            ['year'=>2021,'month'=>9,'number_day_month'=>30,'type_transaction_id'=>1,'employee_id'=>1],
            ['year'=>2021,'month'=>9,'number_day_month'=>30,'type_transaction_id'=>2,'employee_id'=>2],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
