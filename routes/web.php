<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TeacherStandAloneController;
use Illuminate\Support\Facades\Route;

// ********* Home
Route::get('/', function () {
    return view('welcome');
})->name('index')
    ->middleware('auth');

// ******** Start login process ********//
// ********* Login Page
Route::get('login', [AuthController::class, 'loginPage'])
    ->name('login');

// ********* Login
Route::post('login', [AuthController::class, 'login'])
    ->name('login.process');

// ********* Logout
Route::post('logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');
// ******** End login process ********//


// can be access only by admin
Route::middleware(['auth', 'Role:ADMIN'])->group(function () {
    Route::view(
        'admin/index',
        'admin.index-admin'
    )->name('index.admin');

    // admin route
    Route::resource('admin', AdminController::class);

    // school route
    Route::resource('school', SchoolController::class);
});

// Can be access by admin and teacher
Route::middleware(['auth', 'Role:ADMIN,TEACHER'])->group(function () {
    // if nest with school
    Route::resource('school.teacher', TeacherController::class);

    // standalone route
    Route::prefix('teacher')->name('teacher.')->group(function () {
        // index
        Route::get('/', [TeacherStandAloneController::class, 'index'])
            ->name('index');

        // show
        Route::get('/{teacher}', [TeacherStandAloneController::class, 'show'])
            ->name('show');
    });
});
