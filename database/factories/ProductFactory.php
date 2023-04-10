<?php

namespace Database\Factories;

use App\Models\brand;
use App\Models\category;
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
        $category = Category::inRandomOrder()->first();
        $brand = brand::inRandomOrder()->first();

        return [
            'name' => fake()->word(),
            'slug' => fake()->word(1,true),
            'brand' => $brand->name,
            'small_description' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'original_price' => fake()->numberBetween(100, 1000),
            'selling_price' => fake()->numberBetween(50, 500),
            'quantity' => fake()->numberBetween(10, 100),
            'trending' => fake()->randomElement([0, 1]),
            // 'status' => fake()->randomElement([0, 1]),
            'status' => 0,
            'meta_title' => fake()->sentence(),
            'meta_keyword' => fake()->words(3, true),
            'meta_description' => fake()->paragraph(),
            'category_id' => $category->id,
        ];
    }
}
