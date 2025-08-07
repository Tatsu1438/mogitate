<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'price' => $this->faker->numberBetween(100, 2000),
            'image' => $this->faker->randomElement([
                'kiwi.jpg',
                'muscat.png',
                'orange.png',
                'peach.png',
                'watermelon.png',
                'strovery.png'
            ]),
        ];
    }
}