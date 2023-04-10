<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\color>
 */
class colorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $colorName = fake()->colorName();
        $rgbColor = fake()->rgbColor();

        // Convert RGB color to hex color
        $hexColor = sprintf("#%02x%02x%02x", $rgbColor[0], $rgbColor[1], $rgbColor[2]);

        return [
            'name' => $colorName,
            'code' => $hexColor,
            'status' => fake()->randomElement([0, 1]),
        ];
    }
}
