<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $position = ["UI/UX Designer", "Fullstack Developer", "HR", "Manager", "Content Writer", "Editor"];
        $department = ["Local", "Foreign"];
        $location = ["Yangon","Mandalay", "Chin", "Kayah"];
        return [
            'name' => fake()->name(),
            'email' => Str::random(10).'@gmail.com',
            'position' => $position[rand(0,5)],
            'department' => $department[rand(0,1)],
            'location' => $location[rand(0,3)],
            'created_at' => now(),
            'updated_at' => now()->addDays(6),
        ];
    }
}
