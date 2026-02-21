<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreThreadRequest;
use App\Models\Thread;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ThreadController extends Controller
{
    public function index(): View
    {
        $threads = Thread::query()
            ->withCount('posts')
            ->latest()
            ->paginate(10);

        return view('threads.index', compact('threads'));
    }

    public function create(): View
    {
        return view('threads.create');
    }

    public function store(StoreThreadRequest $request): RedirectResponse
    {
        $thread = Thread::create($request->validated());

        return redirect()->route('threads.show', $thread)
            ->with('status', 'Thread created successfully.');
    }

    public function show(Thread $thread): View
    {
        $posts = $thread->posts()->latest()->paginate(10);

        return view('threads.show', compact('thread', 'posts'));
    }
}
