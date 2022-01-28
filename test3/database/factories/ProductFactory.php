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
            'name' => $this->faker->title(),
            'price' => $this->faker->numberBetween(10,100),
            'description' => '<p>' . implode('</p><p>', $this->faker->paragraphs(2)) . '</p>',
            'is_verified' => $this->faker->boolean()
        ];
    }
}
