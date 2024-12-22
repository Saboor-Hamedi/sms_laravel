<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
// pdf print
use App\Livewire\Reports\Scores as ScoreReports;
use App\Http\Controllers\temp\PDFController;

// middleware
use App\Http\Middleware\AdminPermissions;
use App\Http\Middleware\ScorePermissions;
use App\Http\Middleware\StudentPermissions;

// permissions
use App\Livewire\Permissions\Index as IndexPermissions;
use App\Livewire\Permissions\Create as CreatePermissions;
use App\Livewire\Permissions\Edit as EditPermissions;
use App\Livewire\Permissions\UserRoleManager;

// scores
use App\Livewire\Scores\Create as CreateScores;
use App\Livewire\Scores\ScoresAdmin;
use App\Livewire\Scores\Edit as EditScores;

// academic
use App\Livewire\Academic\Create as CreateAcademic;
use App\Livewire\Academic\Index as IndexAcademic;
use App\Livewire\Academic\Show as ShowAcademic;

// students 
use App\Livewire\Users\User as NewUser;

// update profile 
use App\Livewire\UserProfile\Index as UserProfileIndex;
use App\Livewire\UserProfile\Update as UpdateUserProfile;

// Grades/Clcass 
use App\Livewire\Grades\Index as IndexGrades;
use App\Livewire\Grades\Create as CreateGrades;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome'); // home

Route::middleware([ScorePermissions::class])->group(function () {
    Route::get('/academic.index', IndexAcademic::class)->name('academic.index'); // academic index
    Route::get('/scores', CreateScores::class)->name('scores.create'); // new scores
    Route::get('/scores/{id}/edit', EditScores::class)->name('scores.edit'); // edit scores
    Route::get('/academic/{year}/show', ShowAcademic::class)->name('academic.show');
});

Route::middleware([AdminPermissions::class])->group(function () {
    Route::get('/permissions.index', IndexPermissions::class)->name('permissions.index'); // permissions index
    Route::get('/permissions.create', CreatePermissions::class)->name('permissions.create'); // new permissions
    Route::get('/permissions/{id}/edit', EditPermissions::class)->name('permissions.edit'); // new permissions
    Route::get('/permissions.user-role-manager', UserRoleManager::class)->name('permissions.user-role-manager');
    Route::get('/academic.create', CreateAcademic::class)->name('academic.create');
    Route::get('/scores.scores-admin', ScoresAdmin::class)->name('scores.scores-admin');
    Route::get('/reports.scores-reports', [PDFController::class, 'scorePDF'])->name('reports.scores-reports');
    // Register Students
    Route::get('users/user', NewUser::class)->name('users.user');

    // grades 
    Route::get('grades/index', IndexGrades::class)->name('grades.index');
    Route::get('grades/create', CreateGrades::class)->name('grades.create');
});

// students 
Route::middleware([StudentPermissions::class])->group(function () {});
Route::get('/user-profile.index', UserProfileIndex::class)->name('user-profile.index');
Route::get('/user-profile.update', action: UpdateUserProfile::class)->name('user-profile.update');
Route::get('/reports.scores', ScoreReports::class)->name('reports.scores');

// end
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
