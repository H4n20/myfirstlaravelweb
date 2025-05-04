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
    public function definition()
    {
        return [
            'id_product' => $this->faker->unique()->bothify('P########'),
            'name' => $this->faker->words(3, true),
            'brand' => $this->faker->company,
            'quantity' => $this->faker->numberBetween(1, 100),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'status' => $this->faker->randomElement(['available', 'unavailable']),
            'description' => $this->faker->sentence(10),
            'image' => $this->faker->imageUrl(640, 480, 'products', true),
        ];
    }
}
