<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Forum</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 900px; margin: 2rem auto; padding: 0 1rem; }
        a { color: #1d4ed8; text-decoration: none; }
        .thread, .post { border: 1px solid #e5e7eb; border-radius: 8px; padding: 1rem; margin-bottom: 1rem; }
        .meta { color: #6b7280; font-size: .9rem; }
        input, textarea { width: 100%; padding: .5rem; margin-top: .25rem; margin-bottom: .75rem; }
        button { background: #1d4ed8; color: white; border: 0; padding: .6rem 1rem; border-radius: 6px; }
    </style>
</head>
<body>
    <h1><a href="{{ route('threads.index') }}">Laravel Forum</a></h1>
    @if (session('status'))
        <p>{{ session('status') }}</p>
    @endif
    @yield('content')
</body>
</html>
