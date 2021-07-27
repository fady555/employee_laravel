<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CreateAllTypeSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_type_salaries', function (Blueprint $table) {
            $table->id();
            $table->double('fixed_salary')->comment('الراتب الاساسى');
            $table->double('responsibility_allowance')->comment('بدل المسؤليه')->nullable();
            $table->double('wife_and_children_allowance')->comment('بدل زوجه وابناء')->nullable();
            $table->double('natural_work')->comment('طبيعه عمل')->nullable();
            $table->double('promotion_bonus')->comment('علاوه ترقيه')->nullable();
            $table->double('specialization_bonus')->comment('علاوه تخصص')->nullable();
            $table->double('transport')->comment('مواصلات')->nullable();
            $table->double('extra_work')->comment('عمل اضافى')->nullable();
            $table->double('supplement_salary')->comment('تكمله راتب')->nullable();
            $table->double('rewards')->comment('مكافاءت')->nullable();
            $table->double('total_dues')->comment('المستحقات')->nullable();
            //=====================================================================
            $table->double('discount')->comment('خصم')->nullable();
            $table->double('borrow')->comment('سلف')->nullable();
            $table->double('loan')->comment('قروض')->nullable();
            $table->double('health_insurance')->comment('تامين صحى')->nullable();
            $table->double('another_discount')->comment('خصومات اخرى')->nullable();
            $table->double('tax_income')->comment('ضريبه الدخل')->nullable();
            $table->double('total_discounts')->comment('اجمالى الخصومات')->nullable();



            $table->timestamps();
        });

        DB::unprepared(file_get_contents(public_path().'\database\all_type_salaries.sql'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('all_type_salaries');
    }
}
