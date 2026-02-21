@extends('layouts.app')

@section('content')
    <div class="panel">
        <p><a href="{{ route('threads.create') }}">+ Start New Thread</a></p>
    </div>

    @forelse ($threads as $thread)
        <article class="thread">
            <h2><a href="{{ route('threads.show', $thread) }}">{{ $thread->title }}</a></h2>
            <p>{{ \Illuminate\Support\Str::limit($thread->body, 220) }}</p>
            <p class="meta">
                Started by {{ $thread->author_name }} · {{ $thread->created_at?->diffForHumans() }} · {{ $thread->posts_count }} replies
            </p>
        </article>
    @empty
        <p>No threads yet. Be the first to post.</p>
    @endforelse

    {{ $threads->links() }}
@endsection
