<?php

namespace Database\Factories;

use App\Enums\TechStack;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employment>
 */
class EmploymentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->name(),
            'company' => $this->faker->name(),
            'start_date' => $this->faker->dateTimeBetween('-10 years', '-2 years')->format('F Y'),
            'end_date' => $this->faker->dateTimeBetween('-10 years', '-2 years')->format('F Y'),
            'tech_stack' => collect($this->faker->randomElements(TechStack::cases(), 3)),
            'description' => fake()->paragraphs(3, true),
        ];
    }
}
