<?php

namespace Database\Factories;

use App\Models\Category;
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
            'category_id' => Category::all()->random()->id,
            'name' => $this->faker->title,
            'slug' => uniqid(time()),
            'image' => 'image/user.jpg',
            'description' => $this->faker->text,
            'price' => 1000,
            'view_count' => 100
        ];
    }
}
