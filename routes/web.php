<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// ********* Home
Route::get('/', function () {
    return view('welcome');
})->name('index');

// ********* Login Page
Route::view('login', 'login')->name('login');

// ********* Create account Page
Route::get('admin/create-account', [AdminController::class, 'create'])
    ->name('admin.create-account');

// ********* Store account
Route::post('admin/account-created', [AdminController::class, 'store'])
    ->name('admin.store-account');
