<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomeroomStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homeroom_students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('homeroom_id');
            $table->integer('student_id');
            $table->string('status')->nullable(); //trạng thái của sinh viên
            $table->string('reason')->nullable();
            $table->string('graduation_semester')->nullable(); //học kỳ tốt nghiệp
            $table->string('graduation_scholastic')->nullable(); //năm học tốt nghiệp
            $table->string('reg_no')->nullable(); //số quyết định tốt nghiệp
            $table->date('reg_date')->nullable(); //ngày ký quyết định
            $table->tinyInteger('AUN')->nullable(); // kiểm định AUN
            $table->double('gpa',3,2)->nullable(); //điểm trung bình tốt nghiệp
            $table->double('drl',3,0)->nullable(); //điểm rèn luyện
            $table->integer('tctl')->nullable(); //tổng tính chỉ tích luyện
            $table->string('ranked')->nullable(); //xếp hạng tốt nghiệp
            $table->string('degree')->nullable(); //danh hiệu tốt nghiệp 
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
        Schema::dropIfExists('homeroom_students');
    }
}
