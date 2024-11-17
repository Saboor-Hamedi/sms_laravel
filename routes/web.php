<?php

use App\Livewire\Permissions\Create as PermissionsCreate;
use App\Livewire\Scores\Create;
use Illuminate\Support\Facades\Route;
use App\Livewire\Scores\Edit;

Route::view('/', 'welcome');

Route::get('/scores', Create::class)->name('scores.create');
Route::get('/scores/{id}/edit', Edit::class)->name('scores.edit');
Route::get('/permissions', PermissionsCreate::class)->name('permissions.create');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
