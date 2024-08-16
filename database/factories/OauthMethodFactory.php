<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OauthMethod>
 */
class OauthMethodFactory extends Factory
{
    public function definition(): array
    {
        return [
            'provider' => $this->faker->randomElement(['knox', 'google', 'spotify']),
            'provider_id' => $this->faker->uuid(),
            'refresh_token' => Str::random(64),
        ];
    }

    public function withUser()
    {
        return $this->afterMaking(function ($model) {
            return $model->user()->associate(User::factory()->create());
        });
    }
}
