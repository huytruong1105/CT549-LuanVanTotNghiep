<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('username', 100)->unique();
            $table->string('password')->nullable();
            $table->string('fullname');
            $table->string('gender', 3);
            $table->string('user_avatar')->default('user.png');
            $table->date('date_of_birth');
            $table->string('family_phone')->nullable();
            $table->string('personal_phone');    
            $table->string('email', 100)->unique();
            $table->string('current_address');
            $table->string('family_address');
            $table->integer('district_id');
            $table->integer('minority_id');
            $table->tinyInteger('user_status');
            $table->integer('teacher_id')->nullable();
            $table->integer('student_id')->nullable();
            $table->rememberToken();
            $table->timestampsTz();
        });
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
