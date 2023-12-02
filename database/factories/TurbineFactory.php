<?php

namespace Database\Factories;

use App\Models\Farm;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Turbine>
 */
class TurbineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'farm_id' => Farm::factory(),
            'lat' => $this->faker->latitude,
            'lng' => $this->faker->longitude,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
