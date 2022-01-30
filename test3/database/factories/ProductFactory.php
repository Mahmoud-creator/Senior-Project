<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Shop;
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
            'name' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'category_id' => Category::factory(),
            'num_of_verifications' => $this->faker->numberBetween(0,5),
            'num_of_upvotes' => $this->faker->numberBetween(0,0),
            'price' => $this->faker->numberBetween(10,100),
            'description' => '<p>' . implode('</p><p>', $this->faker->paragraphs(2)) . '</p>',
            'is_verified' => $this->faker->boolean()
        ];
    }
}
