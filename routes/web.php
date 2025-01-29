<?php

// Welcome: The default page, welcome
use App\Http\Controllers\temp\PDFController;
// PDF: Print into PDF format the table
use App\Http\Controllers\WelcomeController;
use App\Http\Middleware\AdminMiddleware;
// Middleware
use App\Http\Middleware\ParentMiddleware;
use App\Http\Middleware\StudentMiddleware;
use App\Http\Middleware\TeacherMiddleware;
use App\Livewire\Academic\Create as CreateAcademic;
// Academic: Add Academic Years
use App\Livewire\Academic\Index as IndexAcademic;
use App\Livewire\Academic\Show as ShowAcademic;
use App\Livewire\Grades\Create as CreateGrades;
// Grade: Add grades/classes
use App\Livewire\Grades\Index as IndexGrades;
use App\Livewire\Parent\Profile as ParentProfile;
// Parent: Create Parent profiles
use App\Livewire\Parent\RegisterProfile;
use App\Livewire\Parent\StudentDetails;
// Permissions: Create different permissions for different users, such as admin, teacher, student, and parents
use App\Livewire\Permissions\Create as CreatePermissions;
use App\Livewire\Permissions\Edit as EditPermissions;
use App\Livewire\Permissions\Index as IndexPermissions;
use App\Livewire\Permissions\UserRoleManager;
use App\Livewire\Reports\Scores as ScoreReports;
// Scores: Add scores to students
use App\Livewire\Scores\Create as CreateScores;
use App\Livewire\Scores\Edit as EditScores;
// Scores: Admin can see all scores
use App\Livewire\Scores\ScoresAdmin;
// Teahcers: Only Teachers can see this
use App\Livewire\Teachers\Profile as ShowTeacherProfile;
use App\Livewire\Teachers\Register as RegisterTeacherProfile;
// parent
use App\Livewire\UserProfile\Index as UserProfileIndex;
use App\Livewire\UserProfile\Update as UpdateUserProfile;
use App\Livewire\Users\User as NewUser;
use Illuminate\Support\Facades\Route;

// Welcome
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

// Teachers
Route::middleware([TeacherMiddleware::class])->group(function () {
    Route::get('/academic.index', IndexAcademic::class)->name('academic.index'); // academic index
    Route::get('/scores', CreateScores::class)->name('scores.create'); // new scores
    Route::get('/scores/{id}/edit', EditScores::class)->name('scores.edit'); // edit scores
    Route::get('/academic/{year}/show', ShowAcademic::class)->name('academic.show');
    Route::get('/teachers/register', RegisterTeacherProfile::class)->name('teachers.register');
    Route::get('/teachers/profile', ShowTeacherProfile::class)->name('teachers.profile');
});

// Admin
Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/permissions.index', IndexPermissions::class)->name('permissions.index'); // permissions index
    Route::get('/permissions.create', CreatePermissions::class)->name('permissions.create'); // new permissions
    Route::get('/permissions/{id}/edit', EditPermissions::class)->name('permissions.edit'); // new permissions
    Route::get('/permissions.user-role-manager', UserRoleManager::class)->name('permissions.user-role-manager');
    Route::get('/academic.create', CreateAcademic::class)->name('academic.create');
    Route::get('/scores.scores-admin', ScoresAdmin::class)->name('scores.scores-admin');
    Route::get('/reports.scores-reports', [PDFController::class, 'scorePDF'])->name('reports.scores-reports');
    Route::get('users/user', NewUser::class)->name('users.user');
    Route::get('grades/index', IndexGrades::class)->name('grades.index');
    Route::get('grades/create', CreateGrades::class)->name('grades.create');
});

// students
Route::middleware([StudentMiddleware::class])->group(function () {});
Route::get('/user-profile.index', UserProfileIndex::class)->name('user-profile.index');
Route::get('/user-profile.update', action: UpdateUserProfile::class)->name('user-profile.update');
Route::get('/reports.scores', ScoreReports::class)->name('reports.scores');

// Parent
Route::middleware([ParentMiddleware::class])->group(function () {
    Route::get('parent/student-details/{id}', StudentDetails::class)->name('parent.student-details');
    Route::get('parent/profile', ParentProfile::class)->name('parent.profile');
    Route::get('parent/register-profile', RegisterProfile::class)->name('parent.register-profile');
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
