<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\Profile;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
// dashboard
Route::get('/dashboard', [Dashboard::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
// profile
Route::get('profile', [Profile::class, 'profile'])->middleware(('auth'))->name('profile');

// Posts

Route::resource('post', PostController::class)->middleware(['auth']);
Route::get('/post.show/{slug}', [PostController::class, 'show'])->name('post.show');
Route::delete('/posts/{slug}', [PostController::class, 'destroy'])->name('post.destroy');
// Route::view('profile', 'profile');
//     ->middleware(['auth'])
//     ->name('profile');
require __DIR__.'/auth.php';
