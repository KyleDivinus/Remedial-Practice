<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
    $table->id();
    $table->string('username')->unique();
    $table->string('password');
    $table->unsignedBigInteger('aid');
    $table->timestamps();

    $table->foreign('aid')->references('aid')->on('access_types')->onDelete('cascade');
});

    }

    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
