<?php

namespace App\Http\Controllers;

use App\Models\Kapal;
use Illuminate\Http\Request;

class KapalController extends Controller
{
    public function index()
    {
        $kapals = Kapal::latest()->get();
        return view('kapal.index', compact('kapals'));
    }

    public function create()
    {
        return view('kapal.create');
    }

    public function store(Request $request)
    {
        Kapal::create($request->all());

        return redirect()->route('kapal.index')
            ->with('success', 'Data kapal berhasil ditambahkan');
    }

    public function edit(Kapal $kapal)
    {
        return view('kapal.edit', compact('kapal'));
    }

    public function update(Request $request, Kapal $kapal)
    {
        $kapal->update($request->all());

        return redirect()->route('kapal.index')
            ->with('success', 'Data kapal berhasil diubah');
    }

    public function destroy(Kapal $kapal)
    {
        $kapal->delete();

        return redirect()->route('kapal.index')
            ->with('success', 'Data kapal berhasil dihapus');
    }
}