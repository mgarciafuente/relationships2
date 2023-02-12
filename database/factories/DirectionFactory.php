<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Direction;

class DirectionFactory extends Factory
{
    public function definition()
    {
        return [
            'street' => fake()->randomElement(['C/', 'Avda.', 'Paseo']) ." ". fake()->name(),
            'number' => fake()->numberBetween(1,60),
            'postal_code' => fake()->numberBetween(1000,99999),
            'city' => fake()->city(),
        ];
    }
}
