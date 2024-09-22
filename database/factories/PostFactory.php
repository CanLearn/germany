<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'image' => $this->faker->imageUrl(),
            'video' => $this->faker->url,
            'content' => $this->faker->paragraph,
            'body' => $this->faker->text,
            'confirmation_post' => $this->faker->randomElement(['head', 'body']),
            'status' => $this->faker->randomElement(['peding', 'success', 'good' , 'reject']),
            'user_id' => User::factory(), // ارتباط با یک کاربر
        ];
    }
}
