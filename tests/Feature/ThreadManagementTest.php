<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\Thread;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ThreadManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_threads_index_displays_threads(): void
    {
        $thread = Thread::factory()->create(['title' => 'Welcome Thread']);

        $response = $this->get(route('threads.index'));

        $response->assertOk();
        $response->assertSee('Welcome Thread');
        $response->assertSee($thread->author_name);
    }

    public function test_user_can_create_thread(): void
    {
        $response = $this->post(route('threads.store'), [
            'title' => 'How do I install this project?',
            'body' => 'I am trying to run migrations and need help with sqlite setup.',
            'author_name' => 'Taylor',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('threads', [
            'title' => 'How do I install this project?',
            'author_name' => 'Taylor',
        ]);
    }

    public function test_user_can_reply_to_thread(): void
    {
        $thread = Thread::factory()->create();

        $response = $this->post(route('threads.posts.store', $thread), [
            'body' => 'Thanks for sharing this!',
            'author_name' => 'Jamie',
        ]);

        $response->assertRedirect(route('threads.show', $thread));
        $this->assertDatabaseHas('posts', [
            'thread_id' => $thread->id,
            'author_name' => 'Jamie',
        ]);
    }

    public function test_thread_show_displays_replies(): void
    {
        $thread = Thread::factory()->create();
        Post::factory()->for($thread)->create(['body' => 'First reply']);

        $response = $this->get(route('threads.show', $thread));

        $response->assertOk();
        $response->assertSee($thread->title);
        $response->assertSee('First reply');
    }
}
