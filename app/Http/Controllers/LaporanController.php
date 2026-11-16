<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Layanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $tanggalMulai = $request->get('tanggal_mulai');
        $tanggalAkhir = $request->get('tanggal_akhir');

        $queryTransaksi = Transaksi::with([
            'pelanggan',
            'layanan'
        ]);

        if ($tanggalMulai) {
            $queryTransaksi->whereDate(
                'tanggal_masuk',
                '>=',
                $tanggalMulai
            );
        }

        if ($tanggalAkhir) {
            $queryTransaksi->whereDate(
                'tanggal_masuk',
                '<=',
                $tanggalAkhir
            );
        }

        $transaksis = $queryTransaksi
            ->latest('tanggal_masuk')
            ->get();

        $pelanggans = Pelanggan::latest()->get();

        $layanans = Layanan::latest()->get();

        $totalPelanggan = Pelanggan::count();

        $totalLayanan = Layanan::count();

        $totalTransaksi = $transaksis->count();

        $totalPendapatan = $transaksis
            ->where('status_pembayaran', 'Lunas')
            ->sum('total');

        $belumLunas = $transaksis
            ->where('status_pembayaran', 'Belum Lunas')
            ->count();

        return view('laporan.index', compact(
            'pelanggans',
            'layanans',
            'transaksis',
            'totalPelanggan',
            'totalLayanan',
            'totalTransaksi',
            'totalPendapatan',
            'belumLunas',
            'tanggalMulai',
            'tanggalAkhir'
        ));
    }
}