<?php

use App\Http\Middleware\EnsureUser;
use App\Http\Middleware\EnsureAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\EnsureTeacher;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SettingsController;

// Admin Routes

Route::get('admin/xunnatech', [AdminController::class, 'registerForm'])->name('admin.register');
Route::get('admin/login', [AdminController::class, 'loginForm'])->name('admin.login');
Route::post('admin/register', [AdminController::class, 'store'])->name('admin.create');
Route::post('admin/login', [AdminController::class, 'login'])->name('admin.signin');
Route::post('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('admin');
Route::get('admin/general-settings', [SettingsController::class, 'viewGeneralSettings'])->name('admin.general-settings')->middleware('admin');
