<?php

namespace Database\Factories;

use App\Models\User;
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
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'detail' => fake()->paragraph(),
            'price' => fake()->numberBetween(100, 1000),
            'stock' => fake()->randomDigit(),
            'discount' => fake()->numberBetween(2, 30),
            'user_id' => function(){
                return User::all()->random();
            }
        ];
    }
}
