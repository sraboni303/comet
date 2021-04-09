<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TagController;
use Symfony\Component\HttpKernel\Profiler\Profile;

// General Routes
Route::get('/dashboard', [PagesController::class, 'showIndexPage'])->name('index.backend');
Route::get('/register', [PagesController::class, 'showRegisterPage'])->name('register.backend');
Route::get('/login', [PagesController::class, 'showLoginPage'])->name('login.backend');

Route::post('/registered', [RegisterController::class, 'register'])->name('registered.backend');
Route::post('/logedin', [LoginController::class, 'login'])->name('logedin.backend');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout.backend');

// Role Routes
// Route::prefix('/role')->group(function () {
//     Route::get('/', [RoleController::class, 'showRolePage'])->name('role.backend');
//     Route::post('/store', [RoleController::class, 'store']);
// });

// Profile
Route::get('/user-profile', [ProfileController::class, 'showUserProfile'])->name('user-profile');
Route::put('/user-profile-update', [ProfileController::class, 'update']);
Route::put('/change-password', [ProfileController::class, 'changePassword']);
Route::put('/change-photo', [ProfileController::class, 'changePhoto']);

// Tag Routes
Route::get('/tags', [TagController::class, 'showPage'])->name('tag.backend');
Route::post('/tag-add', [TagController::class, 'store']);
Route::get('/tag/get-records', [TagController::class, 'getRecords']);
Route::get('/tag-delete/{id}', [TagController::class, 'delete']);
Route::get('/tag-status/{id}', [TagController::class, 'status']);
Route::get('/tag-edit/{id}', [TagController::class, 'edit']);
Route::put('/tag-update', [TagController::class, 'update']);
