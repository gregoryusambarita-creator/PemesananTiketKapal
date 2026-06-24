<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function index()
    {
        $pemesanans = Pemesanan::with('jadwal.rute')
            ->latest()
            ->get();

        return view('pemesanan.index', compact('pemesanans'));
    }

    public function create()
    {
        $jadwals = Jadwal::with(['kapal', 'rute'])->get();

        return view('pemesanan.create', compact('jadwals'));
    }

    public function store(Request $request)
    {
        $jadwal = Jadwal::with('rute')
            ->findOrFail($request->jadwal_id);

        $totalHarga = $jadwal->rute->harga * $request->jumlah_tiket;

        Pemesanan::create([
            'jadwal_id' => $request->jadwal_id,
            'nama_penumpang' => $request->nama_penumpang,
            'nik' => $request->nik,
            'telepon' => $request->telepon,
            'jumlah_tiket' => $request->jumlah_tiket,
            'total_harga' => $totalHarga,
            'status' => 'Menunggu'
        ]);

        return redirect()
            ->route('pemesanan.index')
            ->with('success', 'Pemesanan berhasil ditambahkan');
    }

    public function show(Pemesanan $pemesanan)
    {
        //
    }

    public function edit(Pemesanan $pemesanan)
    {
        $jadwals = Jadwal::with(['kapal', 'rute'])->get();

        return view('pemesanan.edit', compact(
            'pemesanan',
            'jadwals'
        ));
    }

    public function update(Request $request, Pemesanan $pemesanan)
    {
        $jadwal = Jadwal::with('rute')
            ->findOrFail($request->jadwal_id);

        $totalHarga = $jadwal->rute->harga * $request->jumlah_tiket;

        $pemesanan->update([
            'jadwal_id' => $request->jadwal_id,
            'nama_penumpang' => $request->nama_penumpang,
            'nik' => $request->nik,
            'telepon' => $request->telepon,
            'jumlah_tiket' => $request->jumlah_tiket,
            'total_harga' => $totalHarga,
            'status' => $request->status
        ]);

        return redirect()
            ->route('pemesanan.index')
            ->with('success', 'Pemesanan berhasil diubah');
    }

    public function destroy(Pemesanan $pemesanan)
    {
        $pemesanan->delete();

        return redirect()
            ->route('pemesanan.index')
            ->with('success', 'Pemesanan berhasil dihapus');
    }
}