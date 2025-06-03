<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('access_types', function (Blueprint $table) {
            $table->id('aid');
            $table->string('access_type')->unique();
            $table->timestamps();
        });

        // Insert default access types
        DB::table('access_types')->insert([
            ['aid' => 1, 'access_type' => 'student', 'created_at' => now(), 'updated_at' => now()],
            ['aid' => 2, 'access_type' => 'instructor', 'created_at' => now(), 'updated_at' => now()],
            ['aid' => 3, 'access_type' => 'admin', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('access_types');
    }
};
