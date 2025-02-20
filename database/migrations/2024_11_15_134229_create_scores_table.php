<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('academic_year_id')->constrained('academics')->cascadeOnDelete();
            $table->foreignId('grade_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('student_id')->nullable()->constrained()->cascadeOnDelete();
            $table->integer('assignment')->nullable();
            $table->integer('formative')->nullable();
            $table->integer('midterm')->nullable();
            $table->integer('final')->nullable();
            $table->integer('average')->nullable();
            $table->string('report')->nullable();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scores');
    }
};
