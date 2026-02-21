<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ThreadController extends Controller
{
    public function index(): View
    {
        $threads = Thread::latest()->get();

        return view('threads.index', compact('threads'));
    }

    public function create(): View
    {
        return view('threads.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
            'author_name' => ['required', 'string', 'max:120'],
        ]);

        $thread = Thread::create($validated);

        return redirect()->route('threads.show', $thread)->with('status', 'Thread created.');
    }

    public function show(Thread $thread): View
    {
        $thread->load('posts');

        return view('threads.show', compact('thread'));
    }
}
