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
        | PENGATURAN WAKTU INDONESIA
        |--------------------------------------------------------------------------
        |
        | Menggunakan timezone Asia/Jakarta agar waktu Dashboard
        | sesuai dengan waktu Indonesia Barat.
        |
        */

        Carbon::setLocale('id');

        $timezone = 'Asia/Jakarta';

        $sekarang = Carbon::now($timezone);

        $hariIni = Carbon::today($timezone);

        $kemarin = Carbon::yesterday($timezone);


        /*
        |--------------------------------------------------------------------------
        | SAPAAN OTOMATIS
        |--------------------------------------------------------------------------
        |
        | 04.00 - 10.59 = Selamat Pagi
        | 11.00 - 14.59 = Selamat Siang
        | 15.00 - 17.59 = Selamat Sore
        | 18.00 - 03.59 = Selamat Malam
        |
        */

        $jam = $sekarang->hour;


        if ($jam >= 4 && $jam < 11) {

            $sapaan = 'Selamat Pagi';

            $ikonSapaan = '☀️';

        } elseif ($jam >= 11 && $jam < 15) {

            $sapaan = 'Selamat Siang';

            $ikonSapaan = '🌤️';

        } elseif ($jam >= 15 && $jam < 18) {

            $sapaan = 'Selamat Sore';

            $ikonSapaan = '🌅';

        } else {

            $sapaan = 'Selamat Malam';

            $ikonSapaan = '🌙';

        }


        /*
        |--------------------------------------------------------------------------
        | INFORMASI TANGGAL
        |--------------------------------------------------------------------------
        */

        $tanggalHariIni =
            $sekarang->translatedFormat(
                'd F Y'
            );


        /*
        |--------------------------------------------------------------------------
        | TOTAL DATA UTAMA
        |--------------------------------------------------------------------------
        */

        $totalPelanggan =
            Pelanggan::count();


        $totalLayanan =
            Layanan::count();


        $totalTransaksi =
            Transaksi::count();


        /*
        |--------------------------------------------------------------------------
        | PESANAN / LAUNDRY AKTIF
        |--------------------------------------------------------------------------
        |
        | Laundry dianggap aktif apabila statusnya
        | belum Selesai, belum Diambil, dan belum Dikirim.
        |
        */

        $pesananMasuk =
            Transaksi::whereNotIn(
                'status_laundry',
                [
                    'Selesai',
                    'Diambil',
                    'Dikirim'
                ]
            )->count();


        /*
        |--------------------------------------------------------------------------
        | TOTAL LAUNDRY SELESAI
        |--------------------------------------------------------------------------
        */

        $laundrySelesai =
            Transaksi::whereIn(
                'status_laundry',
                [
                    'Selesai',
                    'Diambil',
                    'Dikirim'
                ]
            )->count();


        /*
        |--------------------------------------------------------------------------
        | LAUNDRY SIAP DIAMBIL
        |--------------------------------------------------------------------------
        */

        $siapDiambil =
            Transaksi::where(
                'status_laundry',
                'Selesai'
            )->count();


        /*
        |--------------------------------------------------------------------------
        | LAUNDRY DIKIRIM
        |--------------------------------------------------------------------------
        */

        $sedangDikirim =
            Transaksi::where(
                'status_laundry',
                'Dikirim'
            )->count();


        /*
        |--------------------------------------------------------------------------
        | PEMBAYARAN BELUM LUNAS
        |--------------------------------------------------------------------------
        */

        $belumLunas =
            Transaksi::where(
                'status_pembayaran',
                'Belum Lunas'
            )->count();


        /*
        |--------------------------------------------------------------------------
        | NOMINAL BELUM LUNAS
        |--------------------------------------------------------------------------
        */

        $nominalBelumLunas =
            Transaksi::where(
                'status_pembayaran',
                'Belum Lunas'
            )->sum('total');


        /*
        |--------------------------------------------------------------------------
        | TOTAL PENDAPATAN
        |--------------------------------------------------------------------------
        |
        | Hanya transaksi dengan status pembayaran Lunas.
        |
        */

        $pendapatan =
            Transaksi::where(
                'status_pembayaran',
                'Lunas'
            )->sum('total');


        /*
        |--------------------------------------------------------------------------
        | TRANSAKSI HARI INI
        |--------------------------------------------------------------------------
        */

        $transaksiHariIni =
            Transaksi::whereDate(
                'tanggal_masuk',
                $hariIni->toDateString()
            )->count();


        /*
        |--------------------------------------------------------------------------
        | PENDAPATAN HARI INI
        |--------------------------------------------------------------------------
        */

        $pendapatanHariIni =
            Transaksi::whereDate(
                'tanggal_masuk',
                $hariIni->toDateString()
            )
            ->where(
                'status_pembayaran',
                'Lunas'
            )
            ->sum('total');


        /*
        |--------------------------------------------------------------------------
        | TRANSAKSI KEMARIN
        |--------------------------------------------------------------------------
        */

        $transaksiKemarin =
            Transaksi::whereDate(
                'tanggal_masuk',
                $kemarin->toDateString()
            )->count();


        /*
        |--------------------------------------------------------------------------
        | PENDAPATAN KEMARIN
        |--------------------------------------------------------------------------
        */

        $pendapatanKemarin =
            Transaksi::whereDate(
                'tanggal_masuk',
                $kemarin->toDateString()
            )
            ->where(
                'status_pembayaran',
                'Lunas'
            )
            ->sum('total');


        /*
        |--------------------------------------------------------------------------
        | TREN PENDAPATAN
        |--------------------------------------------------------------------------
        */

        if (
            $pendapatanHariIni
            > $pendapatanKemarin
        ) {

            $trenPendapatan = 'naik';

        } elseif (
            $pendapatanHariIni
            < $pendapatanKemarin
        ) {

            $trenPendapatan = 'turun';

        } else {

            $trenPendapatan = 'tetap';

        }


        /*
        |--------------------------------------------------------------------------
        | PERSENTASE PERUBAHAN PENDAPATAN
        |--------------------------------------------------------------------------
        */

        if ($pendapatanKemarin > 0) {

            $persentasePendapatan =
                (
                    (
                        $pendapatanHariIni
                        -
                        $pendapatanKemarin
                    )
                    /
                    $pendapatanKemarin
                )
                * 100;


            $persentasePendapatan =
                round(
                    abs(
                        $persentasePendapatan
                    ),
                    1
                );

        } elseif (
            $pendapatanHariIni > 0
        ) {

            $persentasePendapatan = 100;

        } else {

            $persentasePendapatan = 0;

        }


        /*
        |--------------------------------------------------------------------------
        | TOTAL NOTIFIKASI DASHBOARD
        |--------------------------------------------------------------------------
        */

        $totalNotifikasi =
            $belumLunas
            +
            $siapDiambil
            +
            $sedangDikirim;


        /*
        |--------------------------------------------------------------------------
        | TRANSAKSI TERBARU
        |--------------------------------------------------------------------------
        */

        $transaksiTerbaru =
            Transaksi::with([
                'pelanggan',
                'layanan'
            ])
            ->orderByDesc(
                'tanggal_masuk'
            )
            ->orderByDesc(
                'id'
            )
            ->take(5)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | GRAFIK PENDAPATAN 7 HARI TERAKHIR
        |--------------------------------------------------------------------------
        */

        $grafikTanggal = [];

        $grafikPendapatan = [];


        for (
            $i = 6;
            $i >= 0;
            $i--
        ) {

            $tanggal =
                Carbon::today($timezone)
                    ->copy()
                    ->subDays($i);


            $grafikTanggal[] =
                $tanggal->translatedFormat(
                    'd M'
                );


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
                (int)
                $pendapatanTanggal;
        }


        /*
        |--------------------------------------------------------------------------
        | JUMLAH STATUS LAUNDRY
        |--------------------------------------------------------------------------
        */

        $statusDiterima =
            Transaksi::where(
                'status_laundry',
                'Diterima'
            )->count();


        $statusDicuci =
            Transaksi::where(
                'status_laundry',
                'Dicuci'
            )->count();


        $statusDikeringkan =
            Transaksi::where(
                'status_laundry',
                'Dikeringkan'
            )->count();


        $statusDisetrika =
            Transaksi::where(
                'status_laundry',
                'Disetrika'
            )->count();


        $statusSelesai =
            Transaksi::where(
                'status_laundry',
                'Selesai'
            )->count();


        $statusDiambil =
            Transaksi::where(
                'status_laundry',
                'Diambil'
            )->count();


        $statusDikirim =
            Transaksi::where(
                'status_laundry',
                'Dikirim'
            )->count();


        /*
        |--------------------------------------------------------------------------
        | KIRIM DATA KE DASHBOARD
        |--------------------------------------------------------------------------
        */

        return view(
            'dashboard',
            compact(

                /*
                 * Sapaan.
                 */
                'sapaan',
                'ikonSapaan',
                'tanggalHariIni',


                /*
                 * Total utama.
                 */
                'totalPelanggan',
                'totalLayanan',
                'totalTransaksi',


                /*
                 * Operasional.
                 */
                'pesananMasuk',
                'laundrySelesai',
                'siapDiambil',
                'sedangDikirim',


                /*
                 * Pembayaran.
                 */
                'belumLunas',
                'nominalBelumLunas',
                'pendapatan',


                /*
                 * Hari ini.
                 */
                'transaksiHariIni',
                'pendapatanHariIni',


                /*
                 * Kemarin.
                 */
                'transaksiKemarin',
                'pendapatanKemarin',


                /*
                 * Tren pendapatan.
                 */
                'trenPendapatan',
                'persentasePendapatan',


                /*
                 * Notifikasi.
                 */
                'totalNotifikasi',


                /*
                 * Transaksi terbaru.
                 */
                'transaksiTerbaru',


                /*
                 * Grafik.
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