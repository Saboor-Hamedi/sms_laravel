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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('assignment')->nullable();
            $table->integer('formative')->nullable();
            $table->integer('midterm')->nullable();
            $table->integer('final')->nullable();
            $table->integer('average')->nullable();
            $table->string('report')->nullable();
            $table->foreignId('academic_year_id')->constrained('academics')->onDelete('cascade');
            $table->timestamps();
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
