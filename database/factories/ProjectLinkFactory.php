<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProjectLink>
 */
class ProjectLinkFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'text' => fake()->name(),
            'icon' => ['fab', 'fa-github'],
            'link' => fake()->url(),
        ];
    }
}
