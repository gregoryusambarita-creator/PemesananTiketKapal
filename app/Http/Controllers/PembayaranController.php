<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayarans = Pembayaran::with('pemesanan')
            ->latest()
            ->get();

        return view('pembayaran.index', compact('pembayarans'));
    }

    public function create()
    {
        $pemesanans = Pemesanan::all();

        return view('pembayaran.create', compact('pemesanans'));
    }

    public function store(Request $request)
    {
        Pembayaran::create([
            'pemesanan_id' => $request->pemesanan_id,
            'tanggal_bayar' => $request->tanggal_bayar,
            'jumlah_bayar' => $request->jumlah_bayar,
            'metode_pembayaran' => $request->metode_pembayaran,
        ]);

        $pemesanan = Pemesanan::find($request->pemesanan_id);

        if ($pemesanan) {
            $pemesanan->update([
                'status' => 'Lunas'
            ]);
        }

        return redirect()
            ->route('pembayaran.index')
            ->with('success', 'Pembayaran berhasil ditambahkan');
    }

    public function show(Pembayaran $pembayaran)
    {
        //
    }

    public function edit(Pembayaran $pembayaran)
    {
        $pemesanans = Pemesanan::all();

        return view('pembayaran.edit', compact(
            'pembayaran',
            'pemesanans'
        ));
    }

    public function update(Request $request, Pembayaran $pembayaran)
    {
        $pembayaran->update([
            'pemesanan_id' => $request->pemesanan_id,
            'tanggal_bayar' => $request->tanggal_bayar,
            'jumlah_bayar' => $request->jumlah_bayar,
            'metode_pembayaran' => $request->metode_pembayaran,
        ]);

        return redirect()
            ->route('pembayaran.index')
            ->with('success', 'Pembayaran berhasil diubah');
    }

    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();

        return redirect()
            ->route('pembayaran.index')
            ->with('success', 'Pembayaran berhasil dihapus');
    }
}