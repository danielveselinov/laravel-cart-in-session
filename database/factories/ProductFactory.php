<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => ucfirst(fake()->word(2, true)),
            'description' => fake()->text(150),
            'price' => fake()->numberBetween(1, 999),
            'discount' => fake()->numberBetween(1, 99)
        ];
    }
}
