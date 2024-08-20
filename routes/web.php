<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth'])->group(function () {
    Route::view('/', 'index')->name('home');
    Route::view('/entry', 'entry')->name('entry');
    Route::view('/settings', 'settings')->name('settings');
    Route::get('/logout', [AuthController::class, 'logout']);
});

// TODO: Make middleware for admin
Route::middleware(['auth'])->group(function () {
    Route::view('/admin', 'admin')->name('admin');
    Route::view('/admin/user', '/admin/user')->name('admin-user');
    Route::view('/admin/entries', 'admin/entries')->name('admin-entries');
    Route::view('/admin/job', '/admin/job')->name('admin-job');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginHandler']);
