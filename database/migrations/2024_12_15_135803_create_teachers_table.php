<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete(action: 'cascade');
            $table->string('lastname', 50)->default('Default Lastname')->index('teacher_lastname_index');
            $table->date('birthdate')->nullable();
            $table->string('phone', 50)->nullable();
            $table->string('country', 50)->nullable();
            $table->string('state', 50)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('description', 100);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
