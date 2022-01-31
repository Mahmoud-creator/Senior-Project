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
            'shop_id' => Shop::factory(),
            'slug' => $this->faker->slug(),
            'category_id' => Category::factory(),
            'price' => $this->faker->numberBetween(10,100),
            'description' => '<p>' . implode('</p><p>', $this->faker->paragraphs(2)) . '</p>',
            'is_verified' => false,
        ];
    }
}
