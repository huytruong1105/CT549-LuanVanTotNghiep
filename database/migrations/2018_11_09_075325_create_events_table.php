<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('event_name');
            $table->string('event_avatar')->nullable();
            $table->dateTime('started_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('ended_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('event_location');
            $table->string('event_content');
            $table->string('event_describe')->nullable();
            $table->integer('user_id');
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
        Schema::dropIfExists('events');
    }
}
