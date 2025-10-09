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


Route::middleware(['auth', 'Role:ADMIN'])->group(function () {
    Route::view(
        'admin/index',
        'admin.index-admin'
    )->name('index.admin');

    Route::resource('admin', AdminController::class);

    Route::resource('school', SchoolController::class);
});

Route::middleware(['auth', 'Role:ADMIN,TEACHER'])->group(function () {
    // if nest with school
    Route::resource('school.teacher', TeacherController::class);


    Route::prefix('teacher')->name('teacher.')->group(function () {
        // standalone route index
        Route::get('/', [TeacherStandAloneController::class, 'index'])
            ->name('index');

        // standalone route show
        Route::get('/{teacher}', [TeacherStandAloneController::class, 'show'])
            ->name('show');
    });
});
