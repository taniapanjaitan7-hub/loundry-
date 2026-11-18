<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class StatusLaundryController extends Controller
{
    /**
     * Menampilkan halaman monitoring
     * Status Laundry Tania Mutiara Laundry.
     */
    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | AMBIL PENCARIAN
        |--------------------------------------------------------------------------
        */

        $search = trim(
            (string) $request->get('search', '')
        );


        /*
        |--------------------------------------------------------------------------
        | QUERY TRANSAKSI
        |--------------------------------------------------------------------------
        |
        | Pelanggan dan layanan langsung dimuat agar halaman
        | status tidak melakukan query berulang.
        |
        */

        $query = Transaksi::with([
            'pelanggan',
            'layanan',
        ]);


        /*
        |--------------------------------------------------------------------------
        | PENCARIAN
        |--------------------------------------------------------------------------
        |
        | Pencarian dapat menggunakan:
        | - Kode transaksi
        | - Nama pelanggan
        |
        */

        if ($search !== '') {

            $query->where(
                function ($q) use ($search) {

                    $q->where(
                        'kode_transaksi',
                        'like',
                        '%' . $search . '%'
                    )
                    ->orWhereHas(
                        'pelanggan',
                        function ($pelangganQuery) use ($search) {

                            $pelangganQuery->where(
                                'nama',
                                'like',
                                '%' . $search . '%'
                            );

                        }
                    );

                }
            );

        }


        /*
        |--------------------------------------------------------------------------
        | DATA TRANSAKSI
        |--------------------------------------------------------------------------
        |
        | Tampilkan transaksi terbaru terlebih dahulu.
        |
        */

        $transaksis = $query
            ->orderByDesc('tanggal_masuk')
            ->orderByDesc('id')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | TOTAL SEDANG DIPROSES
        |--------------------------------------------------------------------------
        |
        | Semua transaksi yang belum mencapai tahap:
        | - Selesai
        | - Diambil
        | - Dikirim
        |
        */

        $totalProses = Transaksi::whereNotIn(
            'status_laundry',
            [
                'Selesai',
                'Diambil',
                'Dikirim',
            ]
        )->count();


        /*
        |--------------------------------------------------------------------------
        | TOTAL SIAP DIAMBIL
        |--------------------------------------------------------------------------
        |
        | Laundry sudah selesai tetapi belum diserahkan.
        |
        */

        $totalSelesai = Transaksi::where(
            'status_laundry',
            'Selesai'
        )->count();


        /*
        |--------------------------------------------------------------------------
        | TOTAL SUDAH DISERAHKAN
        |--------------------------------------------------------------------------
        |
        | Laundry sudah:
        | - Diambil pelanggan
        | - Dikirim kepada pelanggan
        |
        */

        $totalDiambil = Transaksi::whereIn(
            'status_laundry',
            [
                'Diambil',
                'Dikirim',
            ]
        )->count();


        /*
        |--------------------------------------------------------------------------
        | DETAIL JUMLAH SETIAP STATUS
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
        | TOTAL TRANSAKSI
        |--------------------------------------------------------------------------
        */

        $totalTransaksi = Transaksi::count();


        /*
        |--------------------------------------------------------------------------
        | PEMBAYARAN
        |--------------------------------------------------------------------------
        */

        $totalLunas = Transaksi::where(
            'status_pembayaran',
            'Lunas'
        )->count();


        $totalBelumLunas = Transaksi::where(
            'status_pembayaran',
            'Belum Lunas'
        )->count();


        /*
        |--------------------------------------------------------------------------
        | KIRIM DATA KE VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'status.index',
            compact(
                'transaksis',
                'search',

                'totalProses',
                'totalSelesai',
                'totalDiambil',

                'totalTransaksi',
                'totalLunas',
                'totalBelumLunas',

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