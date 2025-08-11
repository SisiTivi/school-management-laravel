<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// ********* Home
Route::get('/', function () {
    return view('welcome');
})->name('index');

// ********* Login Page
Route::get('login', [AuthController::class, 'loginpage'])
    ->name('login.form');

// ********* Login
Route::post('login', [AuthController::class, 'login'])
    ->name('login.process');

// ********* Logout
Route::post('logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

// ********* Create account Page
Route::get('admin/create-account', [AdminController::class, 'create'])
    ->name('admin.create-account');

// ********* Store account
Route::post('admin/account-created', [AdminController::class, 'store'])
    ->name('admin.store-account');


Route::view(
    'admin/index',
    'admin.index-admin'
)->name('index.admin');
