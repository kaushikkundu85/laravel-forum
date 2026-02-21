<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Thread;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    public function store(StorePostRequest $request, Thread $thread): RedirectResponse
    {
        $thread->posts()->create($request->validated());

        return redirect()
            ->route('threads.show', $thread)
            ->with('status', 'Reply added successfully.');
    }
}
