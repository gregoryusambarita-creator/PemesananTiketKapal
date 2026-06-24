<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Pembayaran;

class LaporanController extends Controller
{
    public function index()
    {
        $pemesanans = Pemesanan::latest()->get();

        $totalPemesanan = Pemesanan::count();

        $totalTiket = Pemesanan::sum('jumlah_tiket');

        $totalPendapatan = Pembayaran::sum('jumlah_bayar');

        return view('laporan.index', compact(
            'pemesanans',
            'totalPemesanan',
            'totalTiket',
            'totalPendapatan'
        ));
    }
}
    