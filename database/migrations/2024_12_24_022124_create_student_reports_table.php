<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('student_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('students');
            $table->string('content', 250);
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('student_reports');
    }
};
