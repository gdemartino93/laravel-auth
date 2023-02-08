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
            'name' => fake() -> sentence(1),
            'description' => fake() -> paragraph(1),
            'price' => fake() -> numberBetween(1,300),
            'img' => fake() -> imageUrl(100, 100, 'animals', true),
            'discount' => fake() -> boolean(50)
        ];
    }
}
