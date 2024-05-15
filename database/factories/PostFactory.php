<?php

namespace Database\Factories;

use App\Models\Post;
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
            Post::TITLE      => fake()->text(256),
            Post::CONTENT    => fake()->paragraph(),
            Post::VIEWS      => fake()->randomNumber(),
            Post::USER_ID    => User::inRandomOrder()->first()->id,
            Post::THUMBNAIL  => 'img/posts/default.jpg',
            Post::TYPE_ID    => fake()->numberBetween(1, 3),
            Post::CREATED_AT => fake()->dateTime(),
         ];
    }
}
