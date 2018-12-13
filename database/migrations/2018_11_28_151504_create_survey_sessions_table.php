<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveySessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_sessions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('session_code'); //mã đợt tốt nghiệp 
            $table->string('session_name'); //tên đợt
            $table->dateTime('started');
            $table->dateTime('ended');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_sessions');
    }
}
