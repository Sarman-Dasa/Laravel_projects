<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\student>
 */
class studentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'student_name' => fake()->name(),
            'student_email' =>fake()->unique()->safeEmail(),
            'student_mobile_number' =>fake()->unique()->e164PhoneNumber(),
            'city' => fake()->city(),
            'student_address' =>fake()->address(),
            'deparment_id' => rand(1,20),
        ];
    }
}
