<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// ********* Home
Route::get('/', function () {
    return view('welcome');
})->name('index');

// ********* Login Page
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');

// ********* Create account Page
    