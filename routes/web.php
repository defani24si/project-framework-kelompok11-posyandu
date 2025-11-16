<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PosyanduController;
use App\Http\Controllers\JadwalPosyanduController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('posyandu', PosyanduController::class);
Route::resource('jadwal_posyandu', JadwalPosyanduController::class);
