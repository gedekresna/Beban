<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Disasters>
 */
class DisastersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'postal_code' => $this->faker->postcode(),
            'address' => $this->faker->address(),
            'description' => $this->faker->paragraph(),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'user_id' => $this->faker->numberBetween(1, 10)
        ];
    }
}
