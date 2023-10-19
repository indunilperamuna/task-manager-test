<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $user = User::factory()->create();

        return [
            'title' => $this->faker->title(),
            'description' => $this->faker->paragraph(),
            'user_id' => $user->id
        ];
    }

    public function inactive()
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => false
            ];
        });
    }

    public function withTasks()
    {
        return $this->afterCreating(function (Project $project) {
            Task::factory(1)->create(['project_id' => $project->id]);
        });
    }
}
