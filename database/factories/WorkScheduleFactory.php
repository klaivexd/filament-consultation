<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Staff;
use App\Models\WorkSchedule;

class WorkScheduleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WorkSchedule::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'date_from' => $this->faker->date(),
            'date_until' => $this->faker->date(),
            'day_of_week' => $this->faker->numberBetween(-8, 8),
            'time_from' => $this->faker->time(),
            'time_until' => $this->faker->time(),
            'staff_id' => Staff::factory(),
            'work_schedule_consultation_category_id' => $this->faker->randomNumber(),
        ];
    }
}
