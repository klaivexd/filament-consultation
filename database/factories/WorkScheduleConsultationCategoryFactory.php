<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ConsultationCategory;
use App\Models\WorkSchedule;
use App\Models\WorkScheduleConsultationCategory;

class WorkScheduleConsultationCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WorkScheduleConsultationCategory::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'work_schedule_id' => WorkSchedule::factory(),
            'consultation_category_id' => ConsultationCategory::factory(),
        ];
    }
}
