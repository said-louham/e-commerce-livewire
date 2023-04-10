<?php

namespace Database\Factories;

use App\Models\color;
use App\Models\product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product_color>
 */
class Product_colorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $Product = product::inRandomOrder()->first();
        $Color = color::inRandomOrder()->first();
        return [
            'product_id' => $Product->id,
            'color_id' =>$Color->id,
            'quantity' => fake()->numberBetween(1, 100),
        ];
    }
}
