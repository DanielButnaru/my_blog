<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


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
          'title_post' => $this->faker->sentence(3, true),
            'body_post' => $this->faker->paragraph(3, true),
            'category_post' => $this->faker->randomElement(['sport', 'lifestyle', 'tech', 'politics', 'fashion']),
            'user_id' => $this->faker->numberBetween(1, 10),

        ];
    }
}
