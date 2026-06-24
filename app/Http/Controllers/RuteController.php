<?php

namespace App\Http\Controllers;

use App\Models\Rute;
use Illuminate\Http\Request;

class RuteController extends Controller
{
    public function index()
    {
        $rutes = Rute::latest()->get();
        return view('rute.index', compact('rutes'));
    }

    public function create()
    {
        return view('rute.create');
    }

    public function store(Request $request)
    {
        Rute::create($request->all());

        return redirect()->route('rute.index')
            ->with('success', 'Data rute berhasil ditambahkan');
    }

    public function edit(Rute $rute)
    {
        return view('rute.edit', compact('rute'));
    }

    public function update(Request $request, Rute $rute)
    {
        $rute->update($request->all());

        return redirect()->route('rute.index')
            ->with('success', 'Data rute berhasil diubah');
    }

    public function destroy(Rute $rute)
    {
        $rute->delete();

        return redirect()->route('rute.index')
            ->with('success', 'Data rute berhasil dihapus');
    }
}