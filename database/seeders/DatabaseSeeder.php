<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Thread;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        Thread::factory()
            ->count(12)
            ->create()
            ->each(function (Thread $thread): void {
                Post::factory()->count(fake()->numberBetween(0, 8))->create([
                    'thread_id' => $thread->id,
                ]);
            });
    }
}
