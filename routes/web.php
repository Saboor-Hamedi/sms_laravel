<?php

use App\Http\Controllers\temp\PDFController;
use App\Http\Controllers\WelcomeController;
use App\Http\Middleware\CheckPermissions;
use App\Http\Middleware\ScorePermissions;
use App\Livewire\Permissions\Index as IndexPermissions;
use App\Livewire\Permissions\Create as CreatePermissions;
use App\Livewire\Permissions\Edit as EditPermissions;
use App\Livewire\Permissions\UserRoleManager;
use App\Livewire\Reports\Scores as ScoreReports;
use App\Livewire\UserProfile\Index as UserProfileIndex;
use App\Livewire\Scores\Create as CreateScores;
use App\Livewire\Academic\Create as CreateAcademic;
use App\Livewire\Academic\Index as IndexAcademic;
use App\Livewire\Academic\Show as ShowAcademic;
use App\Livewire\Scores\ScoresAdmin;
use Illuminate\Support\Facades\Route;
use App\Livewire\Scores\Edit;

// students 
use App\Livewire\Students\Create as CreateStudents;

// Route::view('/', 'welcome');
Route::get('/', [WelcomeController::class, 'index'])->name('welcome'); // home

Route::middleware([ScorePermissions::class])->group(function () {
    Route::get('/academic.index', IndexAcademic::class)->name('academic.index'); // academic index
    Route::get('/scores', CreateScores::class)->name('scores.create'); // new scores
    Route::get('/scores/{id}/edit', Edit::class)->name('scores.edit'); // edit scores
    Route::get('/academic/{year}/show', ShowAcademic::class)->name('academic.show');
});

Route::middleware([CheckPermissions::class])->group(function () {
    Route::get('/permissions.index', IndexPermissions::class)->name('permissions.index'); // permissions index
    Route::get('/permissions.create', CreatePermissions::class)->name('permissions.create'); // new permissions
    Route::get('/permissions/{id}/edit', EditPermissions::class)->name('permissions.edit'); // new permissions
    Route::get('/permissions.user-role-manager', UserRoleManager::class)->name('permissions.user-role-manager');
    Route::get('/academic.create', CreateAcademic::class)->name('academic.create');
    Route::get('/scores.scores-admin', ScoresAdmin::class)->name('scores.scores-admin');
    Route::get('/reports.scores-reports', [PDFController::class, 'scorePDF'])->name('reports.scores-reports');

    // Register Students

    Route::get('/students.create', CreateStudents::class)->name('students.create');
});

Route::get('/user-profile.index', UserProfileIndex::class)->name('user-profile.index');

Route::get('/reports.scores', ScoreReports::class)->name('reports.scores');

// end
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
