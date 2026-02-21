@extends('layouts.app')

@section('content')
    <article class="thread">
        <h2>{{ $thread->title }}</h2>
        <p>{{ $thread->body }}</p>
        <p class="meta">Started by {{ $thread->author_name }} · {{ $thread->created_at?->diffForHumans() }}</p>
    </article>

    <h3>Replies</h3>
    @forelse ($posts as $post)
        <article class="post">
            <p>{{ $post->body }}</p>
            <p class="meta">{{ $post->author_name }} · {{ $post->created_at?->diffForHumans() }}</p>
        </article>
    @empty
        <p>No replies yet.</p>
    @endforelse

    {{ $posts->links() }}

    <h3>Add Reply</h3>
    <form method="POST" action="{{ route('threads.posts.store', $thread) }}" class="panel">
        @csrf

        <label>Your name
            <input type="text" name="author_name" value="{{ old('author_name') }}" required minlength="2" maxlength="120">
        </label>

        <label>Reply
            <textarea name="body" rows="5" required minlength="3">{{ old('body') }}</textarea>
        </label>

        <button type="submit">Post Reply</button>
    </form>
@endsection
