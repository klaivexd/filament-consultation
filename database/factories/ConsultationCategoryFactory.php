<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ConsultationCategory;
use App\Models\ConsultationType;

class ConsultationCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ConsultationCategory::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            'description' => $this->faker->text(),
            'number_of_slots' => $this->faker->randomNumber(),
            'consultation_type_id' => ConsultationType::factory(),
            'work_schedule_id' => $this->faker->randomNumber(),
        ];
    }
}
