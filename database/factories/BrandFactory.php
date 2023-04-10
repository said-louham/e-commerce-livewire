<?php

namespace Database\Factories;

use App\Models\category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->word(1,true),
            'slug' => fake()->word(1,true),
            'status' => fake()->randomElement([0, 1]),
            'category_id' => category::inRandomOrder()->first(),
        ];
    }
}
