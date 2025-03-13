<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\Profile;
use Illuminate\Support\Facades\Route;

// Route::view('/', 'welcome');
Route::get('/', [FrontController::class, 'index'])->name('welcome');
// dashboard
Route::get('/dashboard', [Dashboard::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
// profile
Route::get('profile', [Profile::class, 'profile'])->middleware(('auth'))->name('profile');

// Posts
Route::middleware(['auth'])->group(function () {
    Route::resource('post', PostController::class);
});

Route::get('/logout', [LogoutController::class, 'show'])->name('logout.show')->middleware('auth');
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout')->middleware('auth');
require __DIR__.'/auth.php';
