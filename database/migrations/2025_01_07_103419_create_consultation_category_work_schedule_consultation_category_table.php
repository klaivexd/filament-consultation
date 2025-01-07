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
        Schema::create('consultation_category_work_schedule_consultation_category', function (Blueprint $table) {
            $table->foreignId('consultation_category_id');
            $table->foreignId('work_schedule_consultation_category_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultation_category_work_schedule_consultation_category');
    }
};
