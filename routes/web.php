<?php

use App\Livewire\Score\Edit;
use App\Livewire\Score\Scores;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::get('/score', Scores::class)->name('score.scores');
Route::get('/score/{id}/edit', Edit::class)->name('score.edit');
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
