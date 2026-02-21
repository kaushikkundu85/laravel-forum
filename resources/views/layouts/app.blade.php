<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Forum</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 900px; margin: 2rem auto; padding: 0 1rem; }
        a { color: #1d4ed8; text-decoration: none; }
        .thread, .post, .panel { border: 1px solid #e5e7eb; border-radius: 8px; padding: 1rem; margin-bottom: 1rem; }
        .meta { color: #6b7280; font-size: .9rem; }
        input, textarea { width: 100%; padding: .5rem; margin-top: .25rem; margin-bottom: .75rem; box-sizing: border-box; }
        button { background: #1d4ed8; color: white; border: 0; padding: .6rem 1rem; border-radius: 6px; cursor: pointer; }
        .error-list { border: 1px solid #fecaca; background: #fef2f2; color: #991b1b; border-radius: 8px; padding: .75rem 1rem; }
        .status { border: 1px solid #bbf7d0; background: #f0fdf4; color: #166534; border-radius: 8px; padding: .75rem 1rem; }
        nav[role='navigation'] { margin-top: 1rem; }
    </style>
</head>
<body>
    <h1><a href="{{ route('threads.index') }}">Laravel Forum</a></h1>

    @if (session('status'))
        <p class="status">{{ session('status') }}</p>
    @endif

    @if ($errors->any())
        <div class="error-list">
            <strong>Please fix the following:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @yield('content')
</body>
</html>
