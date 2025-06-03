<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbackTable extends Migration
{
    public function up()
{
    Schema::create('feedback', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('sid'); // Student
        $table->unsignedBigInteger('iid'); // Instructor
        $table->text('feedback');
        $table->string('status')->default('Pending');
        $table->string('semester');
        $table->year('year');
        $table->timestamp('date_created')->useCurrent();

        $table->foreign('sid')->references('id')->on('students');
        $table->foreign('iid')->references('id')->on('instructors');
    });
}


    public function down()
    {
        Schema::dropIfExists('feedback');
    }
}
