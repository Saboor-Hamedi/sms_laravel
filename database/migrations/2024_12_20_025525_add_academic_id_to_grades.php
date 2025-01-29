<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('grades', function (Blueprint $table) {
            $table->foreignId('academic_id')
                ->nullable()
                ->constrained('academics')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('grades', function (Blueprint $table) {
            if (Schema::hasColumn('grades', column: 'academic_id')) {
                $table->dropForeign(['academic_id']);
                $table->dropColumn('academic_id');
            }
        });
    }
};
