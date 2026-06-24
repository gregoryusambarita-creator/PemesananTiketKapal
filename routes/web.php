<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KapalController;
use App\Http\Controllers\RuteController;
Route::get('/', function () {
    return view('dashboard.index');
});

Route::resource('kapal', KapalController::class);
Route::resource('Rute', KapalController::class);