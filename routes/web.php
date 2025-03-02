<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Profile;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
// dashboard
Route::get('/dashboard', [Dashboard::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
// profile
Route::get('profile', [Profile::class, 'profile'])->middleware(('auth'))->name('profile');
// Route::view('profile', 'profile')
//     ->middleware(['auth'])
//     ->name('profile');
require __DIR__.'/auth.php';
