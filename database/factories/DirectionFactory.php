<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class DirectionFactory extends Factory
{
    public function definition()
    {
        return [
            'street' => fake()->name(),
            'number' => fake()->integer(),
            'postal_code' => fake()->integer(),
            'city' => fake()->name(),
        ];
    }
}
