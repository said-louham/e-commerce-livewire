<?php

namespace Database\Factories;

use App\Models\product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class product_imageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $product = product::inRandomOrder()->first();

        return [
            'product_id' => $product->id,
            'image' => fake()->imageUrl(),
            // 'image' => 'https://via.placeholder.com/'.fake()->numberBetween(1100, 1111),
        ];
    }
}
