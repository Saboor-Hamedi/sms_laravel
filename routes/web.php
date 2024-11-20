<?php

use App\Http\Controllers\temp\PDFController;
use App\Http\Controllers\WelcomeController;
use App\Livewire\Academic\Create;
use App\Livewire\Pdf\ScoringReports;
use App\Livewire\Permissions\Index as IndexPermissions;
use App\Livewire\Permissions\Create as CreatePermissions;
use App\Livewire\Permissions\Edit as EditPermissions;
use App\Livewire\Scores\Create as CreateScores;
use App\Livewire\Academic\Create as CreateAcademic;
use Illuminate\Support\Facades\Route;
use App\Livewire\Scores\Edit;

// Route::view('/', 'welcome');
Route::get('/', [WelcomeController::class, 'index'])->name('welcome'); // home

Route::get('/scores', CreateScores::class)->name('scores.create'); // new scores
Route::get('/scores/{id}/edit', Edit::class)->name('scores.edit'); // edit scores
Route::get('/permissions.index', IndexPermissions::class)->name('permissions.index'); // permissions index
Route::get('/permissions.create', CreatePermissions::class)->name('permissions.create'); // new permissions
Route::get('/permissions/{id}/edit', EditPermissions::class)->name('permissions.edit'); // new permissions


// academic routes 
Route::get('/academic.create', CreateAcademic::class)->name('academic.create');
// pdf routes - scores 

Route::get('/pdf', ScoringReports::class)->name('pdf.scoring-reports');

// Temporary pdf controller 
Route::get('/pdf/report', [PDFController::class, 'tempReport'])->name('pdf.report');

// end
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
