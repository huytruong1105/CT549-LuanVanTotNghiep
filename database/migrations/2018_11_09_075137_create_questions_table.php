<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('question_content');
            $table->tinyInteger('question_type');
            $table->tinyInteger('status'); //mặc định tất cả là 0, thuộc đợt khảo sát hiện tại là 1; -> sau khi kết thúc đợt khảo sát trở về thành 0
                                              //                                                        -> hoặc vẫn để là 1, giáo vụ sửa form khảo sát; khi không được chọn sẽ trở về 0 được chọn sẽ là 1
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
        Schema::dropIfExists('questions');
    }
}
