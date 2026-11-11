<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $layanans = Layanan::latest()->get();

        return view('layanan.index', compact('layanans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_layanan' => 'required|max:255',
            'harga' => 'required|integer|min:0',
            'estimasi' => 'nullable|max:100',
        ]);

        Layanan::create($request->only([
            'nama_layanan',
            'harga',
            'estimasi',
        ]));

        return redirect()
            ->route('layanan.index')
            ->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function edit(Layanan $layanan)
    {
        return view('layanan.edit', compact('layanan'));
    }

    public function update(Request $request, Layanan $layanan)
    {
        $request->validate([
            'nama_layanan' => 'required|max:255',
            'harga' => 'required|integer|min:0',
            'estimasi' => 'nullable|max:100',
        ]);

        $layanan->update($request->only([
            'nama_layanan',
            'harga',
            'estimasi',
        ]));

        return redirect()
            ->route('layanan.index')
            ->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy(Layanan $layanan)
    {
        $layanan->delete();

        return redirect()
            ->route('layanan.index')
            ->with('success', 'Layanan berhasil dihapus.');
    }
}