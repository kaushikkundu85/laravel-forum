@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('threads.store') }}" class="panel">
        @csrf

        <label>Title
            <input type="text" name="title" value="{{ old('title') }}" required minlength="5" maxlength="255">
        </label>

        <label>Your name
            <input type="text" name="author_name" value="{{ old('author_name') }}" required minlength="2" maxlength="120">
        </label>

        <label>Message
            <textarea name="body" rows="8" required minlength="10">{{ old('body') }}</textarea>
        </label>

        <button type="submit">Create Thread</button>
    </form>
@endsection
