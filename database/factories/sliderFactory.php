<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\slider>
 */
class sliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=>fake()->words(2,true),
            'description'=>fake()->words(4,true),
            // 'image' => 'https://via.placeholder.com/'.fake()->numberBetween(1100, 1111),
            'image' => fake()->imageUrl(),
            'status'=>0,
        ];
    }
}
