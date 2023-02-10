<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Mockery\Undefined;

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
            'price' => fake() -> randomFloat(null,1,100),
            'discount' => fake() -> boolean(50)
        ];
    }
}
