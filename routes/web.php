<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
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
Route::get('/role', [RoleController::class, 'showRolePage'])->name('role.backend');
Route::post('/role-store', [RoleController::class, 'store']);
Route::get('/role-all', [RoleController::class, 'all']);
Route::get('/role-status/{id}', [RoleController::class, 'status']);
Route::get('/role-delete/{id}', [RoleController::class, 'delete']);
Route::get('/role-edit/{id}', [RoleController::class, 'edit']);
Route::put('/role-update', [RoleController::class, 'update']);

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


// Category Routes
Route::get('/categories', [CategoryController::class, 'showPage'])->name('category.backend');
Route::post('/category-store', [CategoryController::class, 'store']);
Route::get('/category-all', [CategoryController::class, 'getRecords']);
Route::get('/category-status/{id}', [CategoryController::class, 'status']);
Route::get('/category-edit/{id}', [CategoryController::class, 'edit']);
Route::put('/category-update', [CategoryController::class, 'update']);
Route::get('/category-delete/{id}', [CategoryController::class, 'delete']);


// Member Routes
Route::get('/members', [MemberController::class, 'showPage'])->name('member.backend');
Route::post('/member-store', [MemberController::class, 'store']);
Route::get('/member-all', [MemberController::class, 'all']);
Route::get('/member-status/{id}', [MemberController::class, 'status']);
Route::get('/member-delete/{id}', [MemberController::class, 'delete']);


// Post Routes
Route::get('/posts', [PostController::class, 'showPage'])->name('create.post');
Route::post('/post-store', [PostController::class, 'store'])->name('store.posts');
Route::get('/post-list', [PostController::class, 'postList'])->name('list.posts');
Route::get('/post-active/{id}', [PostController::class, 'active']);
Route::get('/post-inactive/{id}', [PostController::class, 'inactive']);
Route::get('/post-trash/{id}', [PostController::class, 'trash'])->name('trash.posts');
Route::get('/post-untrash/{id}', [PostController::class, 'untrash'])->name('untrash.posts');
Route::get('/post-trashes', [PostController::class, 'showTrashes'])->name('trashes.posts');
Route::get('/post-delete/{id}', [PostController::class, 'delete'])->name('delete.posts');


// Route::get('/edit/{id}', [PostController::class, 'edit'])->name('edit.posts');

