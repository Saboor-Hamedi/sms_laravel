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
        Schema::table('grades', function (Blueprint $table) {
            // $table->foreignId('teacher_id')->constrained('teachers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('grades', function (Blueprint $table) {
            // if (Schema::hasColumn('grades', 'teacher_id')) {
            //     $table->dropForeign(['teacher_id']);
            //     $table->dropColumn(['teacher_id']);
            // }
        });
    }
};
