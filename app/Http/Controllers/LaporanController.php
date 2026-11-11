<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Layanan;

class LaporanController extends Controller
{
    public function index()
    {
        $pelanggans = Pelanggan::latest()->get();
        $layanans = Layanan::latest()->get();

        $totalPelanggan = Pelanggan::count();
        $totalLayanan = Layanan::count();

        return view('laporan.index', compact(
            'pelanggans',
            'layanans',
            'totalPelanggan',
            'totalLayanan'
        ));
    }
}