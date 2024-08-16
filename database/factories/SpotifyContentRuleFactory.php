<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SpotifyContentRule>
 */
class SpotifyContentRuleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'field' => $this->faker->randomElement([
                'uri',
                'artists.uri',
                'album.uri',
                'name',
                'artists.name',
                'album.name',
                'explicit',
            ]),
            'operand' => $this->faker->randomElement(['equals', 'bool', 'contains']),
            'value' => $this->faker->randomAscii(),
        ];
    }
}
