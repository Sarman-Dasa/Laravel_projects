<?php

namespace Database\Seeders;

use App\Models\Department;
use Database\Factories\departmentFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class departmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    //    DB::table('departments')->insert([
    //     'department_name' => Str::random(10),
    //     'department_email' => fake()->unique()->safeEmail(),
    //     'department_mobile_number' => fake()->unique()->e164PhoneNumber(),
    //    ]);

        Department::factory(10)->create();
    }
}
