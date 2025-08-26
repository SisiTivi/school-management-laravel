<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SchoolController;
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


Route::middleware(['auth', 'Admin'])->group(function () {
    Route::view(
        'admin/index',
        'admin.index-admin'
    )->name('index.admin');

    // ********* Create account Page
    Route::get('admin/create-account', [AdminController::class, 'create'])
        ->name('admin.create-account');

    // ********* Store account
    Route::post('admin/account-created', [AdminController::class, 'store'])
        ->name('admin.store-account');


    // ********* Create School Page
    Route::get('admin/school/create', [SchoolController::class, 'create'])
        ->name('school.create');

    // ********* store school data
    Route::post('admin/school/school-created', [SchoolController::class, 'store'])
        ->name('school.store');

    // ********* store school data
    Route::get('admin/school', [SchoolController::class, 'index'])
        ->name('school.index');

    Route::get('admin/school/{school}', [SchoolController::class, 'show'])
        ->name('school.show');
});
