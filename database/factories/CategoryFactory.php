<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // protected $model = category::class;

    public function definition()
    {
        return [
            'name' => fake()->words(2,true),
            'slug' => fake()->words(1,true),
            'description' => fake()->words(3,true),
            'image' => fake()->imageUrl(),
            // 'image' => 'https://via.placeholder.com/'.fake()->numberBetween(1100, 1111),
            'meta_title' => fake()->words(2,true),
            'meta_keyword' => fake()->words(3, true),
            'meta_description' => fake()->words(2,true),
            'status' => 0, 
            
        ];
    }
}
