<?php

use App\Http\Controllers\temp\PDFController;
use App\Http\Controllers\WelcomeController;
// PDF: Print into PDF format the table
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\ParentMiddleware;
// Middleware
use App\Http\Middleware\StudentMiddleware;
use App\Http\Middleware\TeacherMiddleware;
use App\Livewire\Academic\Create as CreateAcademic;
use App\Livewire\Academic\Index as IndexAcademic;
// Academic: Add Academic Years
use App\Livewire\Academic\Show as ShowAcademic;
use App\Livewire\Grades\Create as CreateGrades;
use App\Livewire\Grades\Index as IndexGrades;
// Permissions: Create different permissions for different users, such as admin, teacher, student, and parents
use App\Livewire\Parent\ParentProfile;
use App\Livewire\Parent\ParentUpdateProfile;
use App\Livewire\Parent\StudentDetails;
// Permissions
use App\Livewire\Permissions\CreatePermission;
use App\Livewire\Permissions\Edit as EditPermissions;
use App\Livewire\Permissions\GrantPermission;
use App\Livewire\Permissions\Index as IndexPermission;
// Scores: Admin can see all scores
use App\Livewire\Reports\Scores as ScoreReports;
// Teahcers: Only Teachers can see this
use App\Livewire\Scores\CreateScore;
use App\Livewire\Scores\EditScore;
// New Users
use App\Livewire\Scores\ScoresAdmin;
// Parent: Create Parent profiles
use App\Livewire\Teachers\Profile as ShowTeacherProfile;
use App\Livewire\Teachers\Register as RegisterTeacherProfile;
use App\Livewire\UserProfile\Index as UserProfileIndex;
use App\Livewire\UserProfile\Update as UpdateUserProfile;
use App\Livewire\Users\User as RegisterNewUsers;
use Illuminate\Support\Facades\Route;

// Welcome
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

// Teachers
Route::middleware([TeacherMiddleware::class])->group(function () {
    Route::get('academic/index', IndexAcademic::class)->name(name: 'academic.index'); // academic index
    Route::get('scores/create-score', CreateScore::class)->name('scores.create-score'); // new scores
    Route::get('scores/{id}/edit-score', action: EditScore::class)->name('scores.edit-score'); // edit scores
    Route::get('academic/{year}/show', ShowAcademic::class)->name('academic.show');
    Route::get('teachers/register', RegisterTeacherProfile::class)->name('teachers.register');
    Route::get('teachers/profile', ShowTeacherProfile::class)->name('teachers.profile');
});

// Admin
Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('permissions/index', IndexPermission::class)->name('permissions.index'); // permissions index
    Route::get('permissions/create-permission', CreatePermission::class)->name('permissions.create-permission'); // new permissions
    Route::get('permissions/{id}/edit', EditPermissions::class)->name('permissions.edit'); // new permissions
    Route::get('permissions/grant-permission', GrantPermission::class)->name('permissions.grant-permission');
    // academic years
    Route::get('academic/create', CreateAcademic::class)->name('academic.create');
    Route::get('scores/scores-admin', ScoresAdmin::class)->name('scores.scores-admin');
    Route::get('reports/scores-reports', [PDFController::class, 'scorePDF'])->name('reports.scores-reports');
    // create new users, like students, teachers, and parents
    Route::get('users/user', RegisterNewUsers::class)->name('users.user');
    Route::get('grades/index', IndexGrades::class)->name('grades.index');
    Route::get('grades/create', CreateGrades::class)->name('grades.create');
});

// students
Route::middleware([StudentMiddleware::class])->group(function () {});
Route::get('user-profile/index', UserProfileIndex::class)->name('user-profile.index');
Route::get('user-profile/update', action: UpdateUserProfile::class)->name('user-profile.update');
Route::get('reports/scores', ScoreReports::class)->name('reports.scores');

// Parent
Route::middleware([ParentMiddleware::class])->group(function () {
    Route::get('parent/parent-profile', ParentProfile::class)->name('parent.parent-profile');
    Route::get('parent/student-details/{id}', StudentDetails::class)->name('parent.student-details');
    Route::get('parent/parent-update-profile', ParentUpdateProfile::class)->name('parent.parent-update-profile');
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
