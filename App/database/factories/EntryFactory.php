<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Entry>
 */
class EntryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'station_id' => 1,
            'temperature' => fake()->randomFloat(2, -20, 50),
            'humidity' => fake()->randomFloat(2, 0, 100),
            'dew_point' => fake()->randomFloat(2, -20, 50),
            'pressure' => fake()->randomFloat(2, 900, 1100),
            'wind_speed' => fake()->randomFloat(2, 0, 100),
            'wind_direction' => fake()->randomFloat(2, 0, 360),
            'wind_gust' => fake()->randomFloat(2, 0, 100),
        ];
    }
}
