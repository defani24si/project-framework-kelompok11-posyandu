<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PosyanduController;
use App\Http\Controllers\JadwalPosyanduController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('posyandu', PosyanduController::class);
Route::resource('jadwal_posyandu', JadwalPosyanduController::class);
Route::resource('users', UserController::class);
