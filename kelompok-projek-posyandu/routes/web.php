<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PosyanduController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('posyandu', PosyanduController::class);
