<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request, Thread $thread): RedirectResponse
    {
        $validated = $request->validate([
            'body' => ['required', 'string'],
            'author_name' => ['required', 'string', 'max:120'],
        ]);

        $thread->posts()->create($validated);

        return redirect()->route('threads.show', $thread)->with('status', 'Reply added.');
    }
}
