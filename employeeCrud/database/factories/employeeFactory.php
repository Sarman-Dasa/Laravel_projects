<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\employee>
 */
class employeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {   
        return [
            'employee_name'=>fake()->firstName(),
            'employee_email'=>fake()->unique()->safeEmail(),
            'employee_mobile_number'=>fake()->unique()->e164PhoneNumber(),
            'department_id'=>rand(1,5),
            'employee_hiredate'=>fake()->date(),
            'employee_birthdate'=>fake()->date(),
            'employee_gender'=>fake()->randomElement(['Male', 'Female','Other']),
            'employee_salary'=>rand(10000,50000),
            'employee_image'=>fake()->imageUrl(null,true,null,false),
        ];
    }
}
