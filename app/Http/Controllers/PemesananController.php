<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $request->validate([
            'jadwal_id' => 'required',
            'nama_penumpang' => 'required',
            'nik' => 'required',
            'telepon' => 'required',
            'jumlah_tiket' => 'required|integer|min:1'
        ]);

        DB::beginTransaction();

        try {

            $jadwal = Jadwal::with('rute')->findOrFail($request->jadwal_id);

            if ($request->jumlah_tiket > $jadwal->stok_tiket) {
                return back()
                    ->withInput()
                    ->with('error', 'Stok tiket tidak mencukupi.');
            }

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

            // Kurangi stok tiket
            $jadwal->stok_tiket -= $request->jumlah_tiket;
            $jadwal->save();

            DB::commit();

            return redirect()
                ->route('pemesanan.index')
                ->with('success', 'Pemesanan berhasil ditambahkan');

        } catch (\Exception $e) {

            DB::rollBack();

            return back()->with('error', $e->getMessage());
        }
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
        $request->validate([
            'jadwal_id' => 'required',
            'nama_penumpang' => 'required',
            'nik' => 'required',
            'telepon' => 'required',
            'jumlah_tiket' => 'required|integer|min:1',
            'status' => 'required'
        ]);

        DB::beginTransaction();

        try {

            $jadwal = Jadwal::with('rute')->findOrFail($request->jadwal_id);

            // Kembalikan stok lama
            $jadwal->stok_tiket += $pemesanan->jumlah_tiket;

            // Cek stok setelah dikembalikan
            if ($request->jumlah_tiket > $jadwal->stok_tiket) {
                return back()
                    ->withInput()
                    ->with('error', 'Stok tiket tidak mencukupi.');
            }

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

            // Kurangi stok baru
            $jadwal->stok_tiket -= $request->jumlah_tiket;
            $jadwal->save();

            DB::commit();

            return redirect()
                ->route('pemesanan.index')
                ->with('success', 'Pemesanan berhasil diubah');

        } catch (\Exception $e) {

            DB::rollBack();

            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy(Pemesanan $pemesanan)
    {
        // Kembalikan stok tiket
        $jadwal = Jadwal::find($pemesanan->jadwal_id);

        if ($jadwal) {
            $jadwal->stok_tiket += $pemesanan->jumlah_tiket;
            $jadwal->save();
        }

        $pemesanan->delete();

        return redirect()
            ->route('pemesanan.index')
            ->with('success', 'Pemesanan berhasil dihapus');
    }
}