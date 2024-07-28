<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Education>
 */
class EducationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'course_name' => $this->faker->name(),
            'institution_name' => $this->faker->name(),
            'grade' => $this->faker->word(),
            'start_date' => $this->faker->dateTimeBetween('-10 years', '-2 years')->format('F Y'),
            'end_date' => $this->faker->randomElement(['Present', $this->faker->dateTimeBetween('-10 years', '-2 years')->format('F Y')]),
        ];
    }
}
