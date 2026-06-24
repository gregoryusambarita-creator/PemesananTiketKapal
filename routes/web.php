<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KapalController;

Route::get('/', function () {
    return view('dashboard.index');
});

Route::resource('kapal', KapalController::class);