<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Thread;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'thread_id' => Thread::factory(),
            'body' => fake()->paragraph(),
            'author_name' => fake()->name(),
        ];
    }
}
