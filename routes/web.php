<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PosyanduController;
use App\Http\Controllers\JadwalPosyanduController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\KaderPosyanduController;
use App\Http\Controllers\LayananPosyanduController;
use App\Http\Controllers\CatatanImunisasiController;



Route::get('/', function () {
    return view('welcome');
});

Route::resource('posyandu', PosyanduController::class);
Route::resource('jadwal_posyandu', JadwalPosyanduController::class);
Route::resource('warga', WargaController::class);
Route::resource('kader-posyandu', KaderPosyanduController::class);
Route::resource('layanan-posyandu', LayananPosyanduController::class);
Route::resource('catatan-imunisasi', CatatanImunisasiController::class);

Route::get('dashboard', [DashboardController::class, 'index'])
->name('dashboard')
->middleware('auth');

// Auth Routes
Route::get('/login', [AuthController::class, 'index'])->name('auth');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::resource('users', UserController::class);
