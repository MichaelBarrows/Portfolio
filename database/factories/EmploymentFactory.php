<?php

namespace Database\Factories;

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
            'end_date' => $this->faker->randomElement(['Present', $this->faker->dateTimeBetween('-10 years', '-2 years')->format('F Y')]),
        ];
    }
}
