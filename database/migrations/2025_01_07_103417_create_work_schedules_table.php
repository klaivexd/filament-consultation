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
        Schema::create('work_schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_from');
            $table->date('date_until')->nullable();
            $table->tinyInteger('day_of_week');
            $table->time('time_from');
            $table->time('time_until');
            $table->foreignId('staff_id');
            $table->unsignedInteger('work_schedule_consultation_category_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_schedules');
    }
};
