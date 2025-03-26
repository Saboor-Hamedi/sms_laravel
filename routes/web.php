<?php

use App\Http\Controllers\Post\PostController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

//Route::view('/', 'app');

Route::get('/', function () {
    return Inertia::render('Home');
});

Route::get('/post', [PostController::class, 'index']);


require __DIR__.'/auth.php';
