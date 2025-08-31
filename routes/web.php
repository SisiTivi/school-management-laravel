<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\TeacherController;
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

    Route::resource('admin/school', SchoolController::class);
});

Route::middleware(['auth', 'Role:ADMIN,TEACHER'])->group(function () {
    Route::resource('school.teacher', TeacherController::class);
});
