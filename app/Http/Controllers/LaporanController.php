<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Layanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Menampilkan halaman laporan
     * Tania Mutiara Laundry.
     */
    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDASI FILTER TANGGAL
        |--------------------------------------------------------------------------
        */

        $request->validate([
            'tanggal_mulai' => [
                'nullable',
                'date',
            ],

            'tanggal_akhir' => [
                'nullable',
                'date',
                'after_or_equal:tanggal_mulai',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | AMBIL FILTER
        |--------------------------------------------------------------------------
        */

        $tanggalMulai =
            $request->get(
                'tanggal_mulai'
            );


        $tanggalAkhir =
            $request->get(
                'tanggal_akhir'
            );


        /*
        |--------------------------------------------------------------------------
        | QUERY TRANSAKSI
        |--------------------------------------------------------------------------
        |
        | Pelanggan dan layanan langsung di-load agar halaman laporan
        | tidak melakukan query berulang.
        |
        */

        $queryTransaksi =
            Transaksi::with([
                'pelanggan',
                'layanan',
            ]);


        /*
        |--------------------------------------------------------------------------
        | FILTER TANGGAL MULAI
        |--------------------------------------------------------------------------
        */

        if ($tanggalMulai) {

            $queryTransaksi
                ->whereDate(
                    'tanggal_masuk',
                    '>=',
                    $tanggalMulai
                );

        }


        /*
        |--------------------------------------------------------------------------
        | FILTER TANGGAL AKHIR
        |--------------------------------------------------------------------------
        */

        if ($tanggalAkhir) {

            $queryTransaksi
                ->whereDate(
                    'tanggal_masuk',
                    '<=',
                    $tanggalAkhir
                );

        }


        /*
        |--------------------------------------------------------------------------
        | DATA TRANSAKSI
        |--------------------------------------------------------------------------
        */

        $transaksis =
            $queryTransaksi
                ->orderByDesc(
                    'tanggal_masuk'
                )
                ->orderByDesc(
                    'id'
                )
                ->get();


        /*
        |--------------------------------------------------------------------------
        | DATA PELANGGAN
        |--------------------------------------------------------------------------
        */

        $pelanggans =
            Pelanggan::orderBy(
                'nama'
            )
            ->get();


        /*
        |--------------------------------------------------------------------------
        | DATA LAYANAN
        |--------------------------------------------------------------------------
        */

        $layanans =
            Layanan::orderBy(
                'nama_layanan'
            )
            ->get();


        /*
        |--------------------------------------------------------------------------
        | TOTAL PELANGGAN
        |--------------------------------------------------------------------------
        */

        $totalPelanggan =
            Pelanggan::count();


        /*
        |--------------------------------------------------------------------------
        | TOTAL LAYANAN
        |--------------------------------------------------------------------------
        */

        $totalLayanan =
            Layanan::count();


        /*
        |--------------------------------------------------------------------------
        | TOTAL TRANSAKSI SESUAI PERIODE
        |--------------------------------------------------------------------------
        */

        $totalTransaksi =
            $transaksis->count();


        /*
        |--------------------------------------------------------------------------
        | TRANSAKSI LUNAS
        |--------------------------------------------------------------------------
        */

        $transaksiLunas =
            $transaksis
                ->where(
                    'status_pembayaran',
                    'Lunas'
                );


        /*
        |--------------------------------------------------------------------------
        | TOTAL PENDAPATAN
        |--------------------------------------------------------------------------
        |
        | Hanya transaksi dengan status pembayaran Lunas yang dihitung.
        |
        */

        $totalPendapatan =
            $transaksiLunas
                ->sum(
                    'total'
                );


        /*
        |--------------------------------------------------------------------------
        | JUMLAH TRANSAKSI LUNAS
        |--------------------------------------------------------------------------
        */

        $totalLunas =
            $transaksiLunas
                ->count();


        /*
        |--------------------------------------------------------------------------
        | JUMLAH BELUM LUNAS
        |--------------------------------------------------------------------------
        */

        $belumLunas =
            $transaksis
                ->where(
                    'status_pembayaran',
                    'Belum Lunas'
                )
                ->count();


        /*
        |--------------------------------------------------------------------------
        | TOTAL NOMINAL BELUM LUNAS
        |--------------------------------------------------------------------------
        */

        $nominalBelumLunas =
            $transaksis
                ->where(
                    'status_pembayaran',
                    'Belum Lunas'
                )
                ->sum(
                    'total'
                );


        /*
        |--------------------------------------------------------------------------
        | TOTAL BERAT LAUNDRY
        |--------------------------------------------------------------------------
        */

        $totalBerat =
            $transaksis
                ->sum(
                    'berat'
                );


        /*
        |--------------------------------------------------------------------------
        | STATUS LAUNDRY
        |--------------------------------------------------------------------------
        */

        $statusDiterima =
            $transaksis
                ->where(
                    'status_laundry',
                    'Diterima'
                )
                ->count();


        $statusDicuci =
            $transaksis
                ->where(
                    'status_laundry',
                    'Dicuci'
                )
                ->count();


        $statusDikeringkan =
            $transaksis
                ->where(
                    'status_laundry',
                    'Dikeringkan'
                )
                ->count();


        $statusDisetrika =
            $transaksis
                ->where(
                    'status_laundry',
                    'Disetrika'
                )
                ->count();


        $statusSelesai =
            $transaksis
                ->where(
                    'status_laundry',
                    'Selesai'
                )
                ->count();


        $statusDiambil =
            $transaksis
                ->where(
                    'status_laundry',
                    'Diambil'
                )
                ->count();


        $statusDikirim =
            $transaksis
                ->where(
                    'status_laundry',
                    'Dikirim'
                )
                ->count();


        /*
        |--------------------------------------------------------------------------
        | KIRIM DATA KE VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'laporan.index',
            compact(
                'pelanggans',
                'layanans',
                'transaksis',

                'totalPelanggan',
                'totalLayanan',
                'totalTransaksi',

                'totalPendapatan',
                'totalLunas',

                'belumLunas',
                'nominalBelumLunas',

                'totalBerat',

                'tanggalMulai',
                'tanggalAkhir',

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