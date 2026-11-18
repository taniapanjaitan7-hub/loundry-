<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DAFTAR PELANGGAN
    |--------------------------------------------------------------------------
    |
    | Menampilkan seluruh pelanggan dan menyediakan fitur pencarian
    | berdasarkan nama, nomor HP, dan alamat.
    |
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
        | QUERY PELANGGAN
        |--------------------------------------------------------------------------
        */

        $query = Pelanggan::query();


        /*
        |--------------------------------------------------------------------------
        | FILTER PENCARIAN
        |--------------------------------------------------------------------------
        */

        if ($search !== '') {

            $query->where(
                function ($q) use ($search) {

                    $q->where(
                        'nama',
                        'like',
                        '%' . $search . '%'
                    )
                    ->orWhere(
                        'no_hp',
                        'like',
                        '%' . $search . '%'
                    )
                    ->orWhere(
                        'alamat',
                        'like',
                        '%' . $search . '%'
                    );

                }
            );

        }


        /*
        |--------------------------------------------------------------------------
        | DATA PELANGGAN
        |--------------------------------------------------------------------------
        |
        | Pelanggan terbaru ditampilkan paling atas.
        |
        */

        $pelanggans = $query
            ->orderByDesc('created_at')
            ->orderByDesc('id')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | TOTAL DATA PELANGGAN
        |--------------------------------------------------------------------------
        */

        $totalPelanggan = Pelanggan::count();


        /*
        |--------------------------------------------------------------------------
        | TOTAL PELANGGAN MEMILIKI NOMOR HP
        |--------------------------------------------------------------------------
        */

        $pelangganDenganHp = Pelanggan::whereNotNull('no_hp')
            ->where('no_hp', '!=', '')
            ->count();


        /*
        |--------------------------------------------------------------------------
        | TOTAL PELANGGAN MEMILIKI ALAMAT
        |--------------------------------------------------------------------------
        */

        $pelangganDenganAlamat = Pelanggan::whereNotNull('alamat')
            ->where('alamat', '!=', '')
            ->count();


        /*
        |--------------------------------------------------------------------------
        | KIRIM DATA KE VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'pelanggan.index',
            compact(
                'pelanggans',
                'search',
                'totalPelanggan',
                'pelangganDenganHp',
                'pelangganDenganAlamat'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | SIMPAN PELANGGAN
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDASI
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate(
            [
                'nama' => [
                    'required',
                    'string',
                    'max:255',
                ],

                'no_hp' => [
                    'nullable',
                    'string',
                    'max:20',
                ],

                'alamat' => [
                    'nullable',
                    'string',
                    'max:1000',
                ],
            ],
            [
                'nama.required' =>
                    'Nama pelanggan wajib diisi.',

                'nama.string' =>
                    'Nama pelanggan harus berupa teks.',

                'nama.max' =>
                    'Nama pelanggan maksimal 255 karakter.',

                'no_hp.string' =>
                    'Nomor HP harus berupa teks.',

                'no_hp.max' =>
                    'Nomor HP maksimal 20 karakter.',

                'alamat.string' =>
                    'Alamat harus berupa teks.',

                'alamat.max' =>
                    'Alamat maksimal 1000 karakter.',
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | BERSIHKAN DATA
        |--------------------------------------------------------------------------
        */

        $validated['nama'] = trim(
            $validated['nama']
        );


        $validated['no_hp'] =
            isset($validated['no_hp'])
            && trim($validated['no_hp']) !== ''
                ? trim($validated['no_hp'])
                : null;


        $validated['alamat'] =
            isset($validated['alamat'])
            && trim($validated['alamat']) !== ''
                ? trim($validated['alamat'])
                : null;


        /*
        |--------------------------------------------------------------------------
        | SIMPAN
        |--------------------------------------------------------------------------
        */

        Pelanggan::create(
            $validated
        );


        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('pelanggan.index')
            ->with(
                'success',
                'Data pelanggan berhasil ditambahkan.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | DETAIL / RIWAYAT PELANGGAN
    |--------------------------------------------------------------------------
    */

    public function show(Pelanggan $pelanggan)
    {
        /*
        |--------------------------------------------------------------------------
        | LOAD RIWAYAT TRANSAKSI
        |--------------------------------------------------------------------------
        |
        | Setiap transaksi juga mengambil data layanan.
        |
        */

        $pelanggan->load([
            'transaksis' => function ($query) {

                $query
                    ->with('layanan')
                    ->orderByDesc('tanggal_masuk')
                    ->orderByDesc('id');

            },
        ]);


        /*
        |--------------------------------------------------------------------------
        | TOTAL TRANSAKSI
        |--------------------------------------------------------------------------
        */

        $totalTransaksi =
            $pelanggan
                ->transaksis
                ->count();


        /*
        |--------------------------------------------------------------------------
        | TOTAL PEMBAYARAN LUNAS
        |--------------------------------------------------------------------------
        */

        $totalBelanja =
            $pelanggan
                ->transaksis
                ->where(
                    'status_pembayaran',
                    'Lunas'
                )
                ->sum('total');


        /*
        |--------------------------------------------------------------------------
        | JUMLAH TRANSAKSI BELUM LUNAS
        |--------------------------------------------------------------------------
        */

        $belumLunas =
            $pelanggan
                ->transaksis
                ->where(
                    'status_pembayaran',
                    'Belum Lunas'
                )
                ->count();


        /*
        |--------------------------------------------------------------------------
        | NOMINAL BELUM LUNAS
        |--------------------------------------------------------------------------
        */

        $nominalBelumLunas =
            $pelanggan
                ->transaksis
                ->where(
                    'status_pembayaran',
                    'Belum Lunas'
                )
                ->sum('total');


        /*
        |--------------------------------------------------------------------------
        | TOTAL BERAT
        |--------------------------------------------------------------------------
        */

        $totalBerat =
            $pelanggan
                ->transaksis
                ->sum('berat');


        /*
        |--------------------------------------------------------------------------
        | TRANSAKSI SELESAI
        |--------------------------------------------------------------------------
        */

        $transaksiSelesai =
            $pelanggan
                ->transaksis
                ->whereIn(
                    'status_laundry',
                    [
                        'Selesai',
                        'Diambil',
                        'Dikirim',
                    ]
                )
                ->count();


        /*
        |--------------------------------------------------------------------------
        | TRANSAKSI YANG MASIH DIPROSES
        |--------------------------------------------------------------------------
        */

        $transaksiProses =
            $pelanggan
                ->transaksis
                ->whereNotIn(
                    'status_laundry',
                    [
                        'Selesai',
                        'Diambil',
                        'Dikirim',
                    ]
                )
                ->count();


        /*
        |--------------------------------------------------------------------------
        | TRANSAKSI TERAKHIR
        |--------------------------------------------------------------------------
        */

        $transaksiTerakhir =
            $pelanggan
                ->transaksis
                ->first();


        /*
        |--------------------------------------------------------------------------
        | KIRIM DATA KE VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'pelanggan.show',
            compact(
                'pelanggan',
                'totalTransaksi',
                'totalBelanja',
                'belumLunas',
                'nominalBelumLunas',
                'totalBerat',
                'transaksiSelesai',
                'transaksiProses',
                'transaksiTerakhir'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | HALAMAN EDIT
    |--------------------------------------------------------------------------
    */

    public function edit(Pelanggan $pelanggan)
    {
        return view(
            'pelanggan.edit',
            compact(
                'pelanggan'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE PELANGGAN
    |--------------------------------------------------------------------------
    */

    public function update(
        Request $request,
        Pelanggan $pelanggan
    ) {
        /*
        |--------------------------------------------------------------------------
        | VALIDASI
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate(
            [
                'nama' => [
                    'required',
                    'string',
                    'max:255',
                ],

                'no_hp' => [
                    'nullable',
                    'string',
                    'max:20',
                ],

                'alamat' => [
                    'nullable',
                    'string',
                    'max:1000',
                ],
            ],
            [
                'nama.required' =>
                    'Nama pelanggan wajib diisi.',

                'nama.string' =>
                    'Nama pelanggan harus berupa teks.',

                'nama.max' =>
                    'Nama pelanggan maksimal 255 karakter.',

                'no_hp.string' =>
                    'Nomor HP harus berupa teks.',

                'no_hp.max' =>
                    'Nomor HP maksimal 20 karakter.',

                'alamat.string' =>
                    'Alamat harus berupa teks.',

                'alamat.max' =>
                    'Alamat maksimal 1000 karakter.',
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | BERSIHKAN DATA
        |--------------------------------------------------------------------------
        */

        $validated['nama'] = trim(
            $validated['nama']
        );


        $validated['no_hp'] =
            isset($validated['no_hp'])
            && trim($validated['no_hp']) !== ''
                ? trim($validated['no_hp'])
                : null;


        $validated['alamat'] =
            isset($validated['alamat'])
            && trim($validated['alamat']) !== ''
                ? trim($validated['alamat'])
                : null;


        /*
        |--------------------------------------------------------------------------
        | UPDATE
        |--------------------------------------------------------------------------
        */

        $pelanggan->update(
            $validated
        );


        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('pelanggan.index')
            ->with(
                'success',
                'Data pelanggan berhasil diperbarui.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | HAPUS PELANGGAN
    |--------------------------------------------------------------------------
    */

    public function destroy(Pelanggan $pelanggan)
    {
        /*
        |--------------------------------------------------------------------------
        | CEK TRANSAKSI PELANGGAN
        |--------------------------------------------------------------------------
        |
        | Pelanggan yang masih memiliki transaksi tidak langsung
        | dihapus agar riwayat transaksi laundry tetap aman.
        |
        */

        if (
            $pelanggan
                ->transaksis()
                ->exists()
        ) {

            return redirect()
                ->route('pelanggan.index')
                ->withErrors([
                    'pelanggan' =>
                        'Pelanggan tidak dapat dihapus karena masih memiliki riwayat transaksi.',
                ]);

        }


        /*
        |--------------------------------------------------------------------------
        | HAPUS
        |--------------------------------------------------------------------------
        */

        $pelanggan->delete();


        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('pelanggan.index')
            ->with(
                'success',
                'Data pelanggan berhasil dihapus.'
            );
    }
}