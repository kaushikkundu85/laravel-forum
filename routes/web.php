<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ThreadController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('threads.index'));

Route::resource('threads', ThreadController::class)->only(['index', 'create', 'store', 'show']);
Route::post('/threads/{thread}/posts', [PostController::class, 'store'])->name('threads.posts.store');
