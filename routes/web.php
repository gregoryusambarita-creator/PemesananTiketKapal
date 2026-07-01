<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KapalController;
use App\Http\Controllers\RuteController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\UserController;

use App\Models\Kapal;
use App\Models\Rute;
use App\Models\Jadwal;
use App\Models\Pemesanan;
use App\Models\Pembayaran;

/*
|--------------------------------------------------------------------------
| Login & Logout
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Route yang wajib login
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */
    Route::get('/', function () {

        $totalKapal = Kapal::count();
        $totalRute = Rute::count();
        $totalJadwal = Jadwal::count();
        $totalPemesanan = Pemesanan::count();
        $totalPendapatan = Pembayaran::sum('jumlah_bayar');

        return view('dashboard.index', compact(
            'totalKapal',
            'totalRute',
            'totalJadwal',
            'totalPemesanan',
            'totalPendapatan'
        ));
    })->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Khusus Admin
    |--------------------------------------------------------------------------
    */
    Route::middleware('role:admin')->group(function () {
        Route::resource('kapal', KapalController::class);
        Route::resource('rute', RuteController::class);
        Route::resource('users', UserController::class);
    });

    /*
    |--------------------------------------------------------------------------
    | Admin dan Petugas
    |--------------------------------------------------------------------------
    */
    Route::resource('jadwal', JadwalController::class);
    Route::resource('pemesanan', PemesananController::class);
    Route::resource('pembayaran', PembayaranController::class);

    Route::get('/laporan', [LaporanController::class, 'index'])
        ->name('laporan.index');
});