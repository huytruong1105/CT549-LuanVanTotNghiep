<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkingInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('working_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id');
            $table->tinyInteger('work_status');
            $table->tinyInteger('postgraduate_education')->nullable();
            $table->tinyInteger('belong_to_major')->nullable();
            $table->date('started_date')->nullable();
            $table->date('ended_date')->nullable();
            $table->integer('company_id')->nullable();
            $table->string('position')->nullable();
            $table->string('salary')->nullable();
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
        Schema::dropIfExists('working_informations');
    }
}
