<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->string('username')->unique();
            //$table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->longText('api_token')->nullable();
            $table->longText('premisses')->default(json_encode([]));
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            [
                'employee_id'=>1,
                'username'=>'HR_Mohamed_Ali',
                'password'=>'$2y$10$ruhyT3ICPdf29Llnp5XS7O62izQFrnB3BNM7t0LwTOD9KexOKZuvy',
                #'api_token'=>'',
                'premisses'=>json_encode(["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31","32","33","34","35","36","37"]),
            ],
            [
                'employee_id'=>2,
                'username'=>'SAO1234',
                'password'=>'$2y$10$ruhyT3ICPdf29Llnp5XS7O62izQFrnB3BNM7t0LwTOD9KexOKZuvy',
                #'api_token'=>'',
                'premisses'=>json_encode(["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24"]),
            ],

        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
