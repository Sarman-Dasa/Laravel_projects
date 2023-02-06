<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\department>
 */
class departmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'department_name' => Str::random(10),
            'department_email' => fake()->unique()->safeEmail(),
            'department_mobile_number' => fake()->unique()->e164PhoneNumber(),
        ];
    }
}
