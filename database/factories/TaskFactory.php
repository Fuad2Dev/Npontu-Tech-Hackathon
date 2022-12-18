<?php

namespace Database\Factories;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        
        return [
            'name' => $this->faker->sentence(),
            'description' => $this->faker->sentence(15),
            'status' => $this->faker->randomElement(['uncompleted', 'pending', 'completed']),
            'deadline' => now()->addDays(rand(1,3))
        ];
    }
}
