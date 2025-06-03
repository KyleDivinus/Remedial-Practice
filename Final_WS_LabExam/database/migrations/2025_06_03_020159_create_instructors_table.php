<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstructorsTable extends Migration
{
    public function up()
    {
        Schema::create('instructors', function (Blueprint $table) {
            $table->id();
            
            // Foreign key to courses table
            $table->unsignedBigInteger('cid');
            
            $table->string('firstname');
            $table->string('lastname');
            $table->string('username')->unique();
            $table->string('password');

            // Foreign key to access_types table
            $table->unsignedBigInteger('aid');

            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('cid')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('aid')->references('aid')->on('access_types')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('instructors');
    }
}
