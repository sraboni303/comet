<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');









// General Routes
Route::get('/', [PagesController::class, 'showIndexPage'])->name('index.backend');
Route::get('/register', [PagesController::class, 'showRegisterPage'])->name('register.backend');
Route::get('/login', [PagesController::class, 'showLoginPage'])->name('login.backend');

