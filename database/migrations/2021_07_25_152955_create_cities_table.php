<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('name_fr');
            $table->string('code');

            $table->integer('country_id')->unsigned();
            $table->foreign('country_id')->references('id')->on('countries')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });

        $sql_dump = File::get(public_path().'\database\cities_sql_insert_table.sql');
        DB::connection()->getPdo()->exec($sql_dump);

       /* $sql_dump_cities1 = File::get(public_path().'\database\cities1.sql');
        DB::connection()->getPdo()->exec($sql_dump_cities1);

        $sql_dump_cities2 = File::get(public_path().'\database\cities2.sql');
        DB::connection()->getPdo()->exec($sql_dump_cities2);

        $sql_dump_cities3 = File::get(public_path().'\database\cities3.sql');
        DB::connection()->getPdo()->exec($sql_dump_cities3);

        $sql_dump_cities4 = File::get(public_path().'\database\cities4.sql');
        DB::connection()->getPdo()->exec($sql_dump_cities4);*/

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
