<?php

namespace Database\Factories;

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
    public function definition(): array
    {

        $project = \App\Models\Project::factory()->create();

        return [
            'project_id' => $project->id,
            'title' => $this->faker->title(),
            'description' => $this->faker->paragraph(),
            'due_date' => $this->faker->date(),
            'status' => 'pending'
        ];
    }

    public function completed()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => 'completed'
            ];
        });
    }
}
