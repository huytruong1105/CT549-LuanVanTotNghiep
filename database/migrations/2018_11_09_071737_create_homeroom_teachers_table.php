<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeroomTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homeroom_teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('homeroom_id');
            $table->integer('teacher_id');
            $table->dateTime('started_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('ended_date')->nullable();
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
        Schema::dropIfExists('homeroom_teachers');
    }
}
