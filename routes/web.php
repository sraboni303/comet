<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;

// General Routes
Route::get('/dashboard', [PagesController::class, 'showIndexPage'])->name('index.backend');
Route::get('/register', [PagesController::class, 'showRegisterPage'])->name('register.backend');
Route::get('/login', [PagesController::class, 'showLoginPage'])->name('login.backend');

Route::post('/registered', [RegisterController::class, 'register'])->name('registered.backend');
Route::post('/logedin', [LoginController::class, 'login'])->name('logedin.backend');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout.backend');

// Role Routes
Route::get('/role', [PagesController::class, 'showRolePage'])->name('role.backend');

// Profile
Route::get('/user-profile', [ProfileController::class, 'showUserProfile'])->name('user-profile');
Route::put('/user-profile-update', [ProfileController::class, 'update']);

