<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EntryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth'])->group(function() {
    Route::view('/', 'index')->name('home');

    Route::view('/entries', 'entries')->name('entries');

    Route::view('/entry', 'entry')->name('entry');
    Route::post('/entry/add', [EntryController::class, 'add']);
    Route::post('/entry/edit', [EntryController::class, 'edit']);
    Route::get('/entry/delete', [EntryController::class, 'delete']);

    Route::view('/settings', 'settings')->name('settings');
    Route::post('/settings', [UserController::class, 'update']);

    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::middleware(['auth'])->group(function() {
    Route::view('/admin', 'admin')->name('admin');
    Route::view('/admin/job', '/admin/job')->name('admin-job');
    Route::view('/admin/user', '/admin/user')->name('admin-user');
    Route::view('/admin/entries', '/admin/entries')->name('admin-entries');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginHandler']);
