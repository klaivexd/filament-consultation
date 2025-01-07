<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Staff;

class StaffFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Staff::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'title' => $this->faker->sentence(4),
            'email' => $this->faker->safeEmail(),
            'mobile_phone' => $this->faker->word(),
            'phone' => $this->faker->phoneNumber(),
            'work_schedule_id' => $this->faker->randomNumber(),
        ];
    }
}
