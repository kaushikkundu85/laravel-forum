@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('threads.store') }}">
        @csrf

        <label>Title
            <input type="text" name="title" value="{{ old('title') }}" required>
        </label>

        <label>Your name
            <input type="text" name="author_name" value="{{ old('author_name') }}" required>
        </label>

        <label>Message
            <textarea name="body" rows="8" required>{{ old('body') }}</textarea>
        </label>

        <button type="submit">Create Thread</button>
    </form>
@endsection
