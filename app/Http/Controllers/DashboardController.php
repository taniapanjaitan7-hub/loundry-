<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Layanan;
use App\Models\Transaksi;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Menampilkan Dashboard Utama
     * Tania Mutiara Laundry.
     */
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | PENGATURAN TANGGAL INDONESIA
        |--------------------------------------------------------------------------
        */

        Carbon::setLocale('id');


        /*
        |--------------------------------------------------------------------------
        | TOTAL DATA UTAMA
        |--------------------------------------------------------------------------
        */

        $totalPelanggan = Pelanggan::count();

        $totalLayanan = Layanan::count();

        $totalTransaksi = Transaksi::count();


        /*
        |--------------------------------------------------------------------------
        | PESANAN / LAUNDRY AKTIF
        |--------------------------------------------------------------------------
        |
        | Laundry dianggap masih aktif apabila statusnya
        | belum Selesai, belum Diambil, dan belum Dikirim.
        |
        */

        $pesananMasuk = Transaksi::whereNotIn(
            'status_laundry',
            [
                'Selesai',
                'Diambil',
                'Dikirim'
            ]
        )->count();


        /*
        |--------------------------------------------------------------------------
        | LAUNDRY SELESAI
        |--------------------------------------------------------------------------
        */

        $laundrySelesai = Transaksi::whereIn(
            'status_laundry',
            [
                'Selesai',
                'Diambil',
                'Dikirim'
            ]
        )->count();


        /*
        |--------------------------------------------------------------------------
        | PEMBAYARAN BELUM LUNAS
        |--------------------------------------------------------------------------
        */

        $belumLunas = Transaksi::where(
            'status_pembayaran',
            'Belum Lunas'
        )->count();


        /*
        |--------------------------------------------------------------------------
        | TOTAL PENDAPATAN
        |--------------------------------------------------------------------------
        |
        | Hanya transaksi yang sudah berstatus Lunas.
        |
        */

        $pendapatan = Transaksi::where(
            'status_pembayaran',
            'Lunas'
        )->sum('total');


        /*
        |--------------------------------------------------------------------------
        | TRANSAKSI HARI INI
        |--------------------------------------------------------------------------
        */

        $transaksiHariIni = Transaksi::whereDate(
            'tanggal_masuk',
            Carbon::today()->toDateString()
        )->count();


        /*
        |--------------------------------------------------------------------------
        | PENDAPATAN HARI INI
        |--------------------------------------------------------------------------
        |
        | Pendapatan hari ini hanya menghitung transaksi
        | yang sudah dibayar / Lunas.
        |
        */

        $pendapatanHariIni = Transaksi::whereDate(
            'tanggal_masuk',
            Carbon::today()->toDateString()
        )
        ->where(
            'status_pembayaran',
            'Lunas'
        )
        ->sum('total');


        /*
        |--------------------------------------------------------------------------
        | TRANSAKSI TERBARU
        |--------------------------------------------------------------------------
        |
        | Mengambil maksimal 5 transaksi terakhir
        | beserta data pelanggan dan layanan.
        |
        */

        $transaksiTerbaru = Transaksi::with([
            'pelanggan',
            'layanan'
        ])
        ->latest()
        ->take(5)
        ->get();


        /*
        |--------------------------------------------------------------------------
        | GRAFIK PENDAPATAN 7 HARI TERAKHIR
        |--------------------------------------------------------------------------
        */

        $grafikTanggal = [];

        $grafikPendapatan = [];


        for ($i = 6; $i >= 0; $i--) {

            /*
             * Ambil tanggal mulai dari
             * 6 hari yang lalu sampai hari ini.
             */
            $tanggal = Carbon::today()
                ->copy()
                ->subDays($i);


            /*
             * Contoh label:
             *
             * 12 Nov
             * 13 Nov
             * 14 Nov
             */
            $grafikTanggal[] =
                $tanggal->translatedFormat('d M');


            /*
             * Hitung pendapatan lunas
             * pada tanggal tersebut.
             */
            $pendapatanTanggal =
                Transaksi::whereDate(
                    'tanggal_masuk',
                    $tanggal->toDateString()
                )
                ->where(
                    'status_pembayaran',
                    'Lunas'
                )
                ->sum('total');


            $grafikPendapatan[] =
                (int) $pendapatanTanggal;
        }


        /*
        |--------------------------------------------------------------------------
        | JUMLAH STATUS LAUNDRY
        |--------------------------------------------------------------------------
        */

        $statusDiterima = Transaksi::where(
            'status_laundry',
            'Diterima'
        )->count();


        $statusDicuci = Transaksi::where(
            'status_laundry',
            'Dicuci'
        )->count();


        $statusDikeringkan = Transaksi::where(
            'status_laundry',
            'Dikeringkan'
        )->count();


        $statusDisetrika = Transaksi::where(
            'status_laundry',
            'Disetrika'
        )->count();


        $statusSelesai = Transaksi::where(
            'status_laundry',
            'Selesai'
        )->count();


        $statusDiambil = Transaksi::where(
            'status_laundry',
            'Diambil'
        )->count();


        $statusDikirim = Transaksi::where(
            'status_laundry',
            'Dikirim'
        )->count();


        /*
        |--------------------------------------------------------------------------
        | DATA DASHBOARD
        |--------------------------------------------------------------------------
        */

        return view(
            'dashboard',
            compact(

                /*
                 * Data utama.
                 */
                'totalPelanggan',
                'totalLayanan',
                'totalTransaksi',


                /*
                 * Operasional laundry.
                 */
                'pesananMasuk',
                'laundrySelesai',


                /*
                 * Pembayaran.
                 */
                'belumLunas',
                'pendapatan',


                /*
                 * Statistik hari ini.
                 */
                'transaksiHariIni',
                'pendapatanHariIni',


                /*
                 * Transaksi terakhir.
                 */
                'transaksiTerbaru',


                /*
                 * Grafik 7 hari.
                 */
                'grafikTanggal',
                'grafikPendapatan',


                /*
                 * Status laundry.
                 */
                'statusDiterima',
                'statusDicuci',
                'statusDikeringkan',
                'statusDisetrika',
                'statusSelesai',
                'statusDiambil',
                'statusDikirim'
            )
        );
    }
}