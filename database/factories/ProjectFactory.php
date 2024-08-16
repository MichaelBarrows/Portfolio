<?php

namespace Database\Factories;

use App\Enums\TechStack;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'pretty_url' => Str::slug(fake()->words(3, true)),
            'fa_icon_logo' => null,
            'tech_stack' => collect($this->faker->randomElements(TechStack::cases(), 3)),
            'visible' => true,
            'description' => fake()->words(10, true),
        ];
    }
}
