<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PosyanduController;
use App\Http\Controllers\JadwalPosyanduController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;



Route::get('/', function () {
    return view('welcome');
});

Route::resource('posyandu', PosyanduController::class);
Route::resource('jadwal_posyandu', JadwalPosyanduController::class);

Route::get('dashboard', [DashboardController::class, 'index'])
->name('dashboard')
->middleware('auth');

// Auth Routes
Route::get('/login', [AuthController::class, 'index'])->name('auth');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::resource('users', UserController::class);
