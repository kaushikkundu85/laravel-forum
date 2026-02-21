@extends('layouts.app')

@section('content')
    <p><a href="{{ route('threads.create') }}">+ New Thread</a></p>

    @forelse ($threads as $thread)
        <div class="thread">
            <h2><a href="{{ route('threads.show', $thread) }}">{{ $thread->title }}</a></h2>
            <p>{{ \Illuminate\Support\Str::limit($thread->body, 180) }}</p>
            <p class="meta">Started by {{ $thread->author_name }} · {{ $thread->created_at?->diffForHumans() }}</p>
        </div>
    @empty
        <p>No threads yet.</p>
    @endforelse
@endsection
