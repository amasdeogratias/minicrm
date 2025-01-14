<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Client;
use App\Models\Project;
use App\Enums\TaskStatus;
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
        $users = User::pluck('id');
        $clients = Client::pluck('id');
        $projects = Project::pluck('id');

        return [
            'title'          => fake()->sentence(3),
            'description'    => fake()->paragraph(),
            'user_id'        => $users->random(),
            'client_id'      => $clients->random(),
            'project_id'     => $projects->random(),
            'deadline_at'    => now()->addDays(rand(1,30))->format('Y-m-d'),
            'status'         => fake()->randomElement(TaskStatus::class)->value,
        ];
    }
}