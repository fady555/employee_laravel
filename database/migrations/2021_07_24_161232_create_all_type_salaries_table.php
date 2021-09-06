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

            /*$table->text('extra_salary')->comment('الراتب الاساسى بالزياده كل شهر')
                ->default('{"month":{"month_1":0,"month_2":0,"month_3":0,"month_4":0,"month_5":0,"month_6":0,"month_7":0,"month_8":0,"month_9":0,"month_10":0,"month_11":0,"month_12":0}}');
                */
            $table->text('responsibility_allowance')->comment('بدل المسؤليه')->nullable()
                ->default('{"month":{"month_1":0,"month_2":0,"month_3":0,"month_4":0,"month_5":0,"month_6":0,"month_7":0,"month_8":0,"month_9":0,"month_10":0,"month_11":0,"month_12":0}}');

            $table->text('wife_and_children_allowance')->comment('بدل زوجه وابناء')->nullable()
                ->default('{"month":{"month_1":0,"month_2":0,"month_3":0,"month_4":0,"month_5":0,"month_6":0,"month_7":0,"month_8":0,"month_9":0,"month_10":0,"month_11":0,"month_12":0}}');

            $table->text('natural_work')->comment('طبيعه عمل')->nullable()
                ->default('{"month":{"month_1":0,"month_2":0,"month_3":0,"month_4":0,"month_5":0,"month_6":0,"month_7":0,"month_8":0,"month_9":0,"month_10":0,"month_11":0,"month_12":0}}');

            $table->text('promotion_bonus')->comment('علاوه ترقيه')->nullable()
                ->default('{"month":{"month_1":0,"month_2":0,"month_3":0,"month_4":0,"month_5":0,"month_6":0,"month_7":0,"month_8":0,"month_9":0,"month_10":0,"month_11":0,"month_12":0}}');

            $table->text('specialization_bonus')->comment('علاوه تخصص')->nullable()
                ->default('{"month":{"month_1":0,"month_2":0,"month_3":0,"month_4":0,"month_5":0,"month_6":0,"month_7":0,"month_8":0,"month_9":0,"month_10":0,"month_11":0,"month_12":0}}');

            $table->text('transport')->comment('مواصلات')->nullable()
                ->default('{"month":{"month_1":0,"month_2":0,"month_3":0,"month_4":0,"month_5":0,"month_6":0,"month_7":0,"month_8":0,"month_9":0,"month_10":0,"month_11":0,"month_12":0}}');

            $table->text('extra_work')->comment('عمل اضافى')->nullable()
                ->default('{"month":{"month_1_h":0,"month_2_h":0,"month_3_h":0,"month_4_h":0,"month_5_h":0,"month_6_h":0,"month_7_h":0,"month_8_h":0,"month_9_h":0,"month_10_h":0,"month_11_h":0,"month_12_h":0}}');

            $table->text('supplement_salary')->comment('تكمله راتب')->nullable()
                ->default('{"month":{"month_1":0,"month_2":0,"month_3":0,"month_4":0,"month_5":0,"month_6":0,"month_7":0,"month_8":0,"month_9":0,"month_10":0,"month_11":0,"month_12":0}}');

            $table->text('rewards')->comment('مكافاءت')->nullable()
                ->default('{"month":{"month_1":0,"month_2":0,"month_3":0,"month_4":0,"month_5":0,"month_6":0,"month_7":0,"month_8":0,"month_9":0,"month_10":0,"month_11":0,"month_12":0}}');

            /*$table->text('total_dues')->comment('المستحقات')->nullable()
               /* ->default('{"month":{"month_1":0,"month_2":0,"month_3":0,"month_4":0,"month_5":0,"month_6":0,"month_7":0,"month_8":0,"month_9":0,"month_10":0,"month_11":0,"month_12":0}}');

            //=====================================================================
            /**/$table->text('discount')->comment('خصم')->nullable()
                ->default('{"month":{"month_1":0,"month_2":0,"month_3":0,"month_4":0,"month_5":0,"month_6":0,"month_7":0,"month_8":0,"month_9":0,"month_10":0,"month_11":0,"month_12":0}}');

            $table->text('day_absence')->comment('ايام الغياب')->nullable()
                ->default('{"month":{"month_1_day":0,"month_2_day":0,"month_3_day":0,"month_4_day":0,"month_5_day":0,"month_6_day":0,"month_7_day":0,"month_8_day":0,"month_9_day":0,"month_10_day":0,"month_11_day":0,"month_12_day":0}}');

            $table->text('borrow')->comment('سلف')->nullable()
                ->default('{"month":{"month_1_$":0,"month_2_$":0,"month_3_$":0,"month_4_$":0,"month_5_$":0,"month_6_$":0,"month_7_$":0,"month_8_$":0,"month_9_$":0,"month_10_$":0,"month_11_$":0,"month_12_$":0}}');

            $table->double('loan')->comment('قروض')->nullable()->default(0);
                //->default('{"month":{"month_1":0,"month_2":0,"month_3":0,"month_4":0,"month_5":0,"month_6":0,"month_7":0,"month_8":0,"month_9":0,"month_10":0,"month_11":0,"month_12":0}}');

            $table->text('health_insurance')->comment('تامين صحى')->nullable()
                ->default('{"month":{"month_1":0,"month_2":0,"month_3":0,"month_4":0,"month_5":0,"month_6":0,"month_7":0,"month_8":0,"month_9":0,"month_10":0,"month_11":0,"month_12":0}}');

            /*$table->text('another_discount')->comment('خصومات اخرى')->nullable()
                ->default('{"month":{"month_1":0,"month_2":0,"month_3":0,"month_4":0,"month_5":0,"month_6":0,"month_7":0,"month_8":0,"month_9":0,"month_10":0,"month_11":0,"month_12":0}}');
             */
            $table->text('tax_income')->comment('ضريبه الدخل')->nullable()
                ->default('{"month":{"month_1":0,"month_2":0,"month_3":0,"month_4":0,"month_5":0,"month_6":0,"month_7":0,"month_8":0,"month_9":0,"month_10":0,"month_11":0,"month_12":0}}');

           /* $table->text('total_discounts')->comment('اجمالى الخصومات')->nullable()
                ->default('{"month":{"month_1":0,"month_2":0,"month_3":0,"month_4":0,"month_5":0,"month_6":0,"month_7":0,"month_8":0,"month_9":0,"month_10":0,"month_11":0,"month_12":0}}');
            */

            $table->text('total_dues_for_an_employee')->comment('الراتب انهائى للمظف')->nullable()
                ->default('{"month":{"month_1":0,"month_2":0,"month_3":0,"month_4":0,"month_5":0,"month_6":0,"month_7":0,"month_8":0,"month_9":0,"month_10":0,"month_11":0,"month_12":0}}');

            $table->text('salary_paid_status')->comment(' هل تم صرف الراتب للموظف')->nullable()
                ->default('{"month":{"month_1":0,"month_2":0,"month_3":0,"month_4":0,"month_5":0,"month_6":0,"month_7":0,"month_8":0,"month_9":0,"month_10":0,"month_11":0,"month_12":0}}');



            $table->timestamps();
        });

        //DB::unprepared(file_get_contents(public_path().'\database\all_type_salaries.sql'));

        DB::table('all_type_salaries')->insert([
            ['fixed_salary'=>2500],
            ['fixed_salary'=>3300],
            ['fixed_salary'=>2000],
        ]);
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
