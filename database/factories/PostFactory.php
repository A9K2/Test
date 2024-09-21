<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'title'=> $this->faker->word(5),
           'content'=> $this->faker->text(20),
           //'image'=> $this->faker->imageUrl(),
           'is_published'=> 1,
           'category_id'=>Category::get()->random()->id,
        ];
    }
}
