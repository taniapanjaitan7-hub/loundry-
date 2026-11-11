<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Layanan;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPelanggan = Pelanggan::count();

        $totalLayanan = Layanan::count();

        $pesananMasuk = Transaksi::whereNotIn(
            'status_laundry',
            [
                'Selesai',
                'Diambil',
                'Dikirim'
            ]
        )->count();

        $laundrySelesai = Transaksi::whereIn(
            'status_laundry',
            [
                'Selesai',
                'Diambil',
                'Dikirim'
            ]
        )->count();

        $belumLunas = Transaksi::where(
            'status_pembayaran',
            'Belum Lunas'
        )->count();

        $pendapatan = Transaksi::where(
            'status_pembayaran',
            'Lunas'
        )->sum('total');


        $transaksiTerbaru = Transaksi::with([
            'pelanggan',
            'layanan'
        ])
        ->latest()
        ->take(5)
        ->get();


        return view(
            'dashboard',
            compact(
                'totalPelanggan',
                'totalLayanan',
                'pesananMasuk',
                'laundrySelesai',
                'belumLunas',
                'pendapatan',
                'transaksiTerbaru'
            )
        );
    }
}