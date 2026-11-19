<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DAFTAR LAYANAN
    |--------------------------------------------------------------------------
    |
    | Menampilkan seluruh layanan laundry.
    |
    */

    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | DATA LAYANAN
        |--------------------------------------------------------------------------
        */

        $layanans = Layanan::orderByDesc('created_at')
            ->orderByDesc('id')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | TOTAL LAYANAN
        |--------------------------------------------------------------------------
        */

        $totalLayanan = Layanan::count();


        /*
        |--------------------------------------------------------------------------
        | RATA-RATA HARGA
        |--------------------------------------------------------------------------
        */

        $rataHarga = Layanan::avg('harga') ?? 0;


        /*
        |--------------------------------------------------------------------------
        | LAYANAN HARGA TERTINGGI
        |--------------------------------------------------------------------------
        */

        $layananTermahal = Layanan::orderByDesc('harga')
            ->first();


        /*
        |--------------------------------------------------------------------------
        | LAYANAN HARGA TERENDAH
        |--------------------------------------------------------------------------
        */

        $layananTermurah = Layanan::orderBy('harga')
            ->first();


        /*
        |--------------------------------------------------------------------------
        | KIRIM DATA KE VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'layanan.index',
            compact(
                'layanans',
                'totalLayanan',
                'rataHarga',
                'layananTermahal',
                'layananTermurah'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | SIMPAN LAYANAN
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
                'nama_layanan' => [
                    'required',
                    'string',
                    'max:255',
                ],

                'harga' => [
                    'required',
                    'integer',
                    'min:0',
                ],

                'estimasi' => [
                    'nullable',
                    'string',
                    'max:100',
                ],
            ],
            [
                'nama_layanan.required' =>
                    'Nama layanan wajib diisi.',

                'nama_layanan.string' =>
                    'Nama layanan harus berupa teks.',

                'nama_layanan.max' =>
                    'Nama layanan maksimal 255 karakter.',

                'harga.required' =>
                    'Harga layanan wajib diisi.',

                'harga.integer' =>
                    'Harga layanan harus berupa angka.',

                'harga.min' =>
                    'Harga layanan tidak boleh kurang dari 0.',

                'estimasi.string' =>
                    'Estimasi harus berupa teks.',

                'estimasi.max' =>
                    'Estimasi maksimal 100 karakter.',
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | BERSIHKAN DATA
        |--------------------------------------------------------------------------
        */

        $validated['nama_layanan'] = trim(
            $validated['nama_layanan']
        );


        $validated['estimasi'] =
            isset($validated['estimasi'])
            && trim($validated['estimasi']) !== ''
                ? trim($validated['estimasi'])
                : null;


        /*
        |--------------------------------------------------------------------------
        | CEK NAMA LAYANAN
        |--------------------------------------------------------------------------
        |
        | Mencegah nama layanan yang sama persis dibuat berulang kali.
        |
        */

        $layananSudahAda = Layanan::where(
            'nama_layanan',
            $validated['nama_layanan']
        )->exists();


        if ($layananSudahAda) {

            return redirect()
                ->route('layanan.index')
                ->withInput()
                ->withErrors([
                    'nama_layanan' =>
                        'Nama layanan tersebut sudah tersedia.',
                ]);

        }


        /*
        |--------------------------------------------------------------------------
        | SIMPAN LAYANAN
        |--------------------------------------------------------------------------
        */

        Layanan::create([
            'nama_layanan' =>
                $validated['nama_layanan'],

            'harga' =>
                $validated['harga'],

            'estimasi' =>
                $validated['estimasi'],
        ]);


        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('layanan.index')
            ->with(
                'success',
                'Layanan berhasil ditambahkan.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | HALAMAN EDIT LAYANAN
    |--------------------------------------------------------------------------
    */

    public function edit(Layanan $layanan)
    {
        return view(
            'layanan.edit',
            compact(
                'layanan'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE LAYANAN
    |--------------------------------------------------------------------------
    */

    public function update(
        Request $request,
        Layanan $layanan
    ) {
        /*
        |--------------------------------------------------------------------------
        | VALIDASI
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate(
            [
                'nama_layanan' => [
                    'required',
                    'string',
                    'max:255',
                ],

                'harga' => [
                    'required',
                    'integer',
                    'min:0',
                ],

                'estimasi' => [
                    'nullable',
                    'string',
                    'max:100',
                ],
            ],
            [
                'nama_layanan.required' =>
                    'Nama layanan wajib diisi.',

                'nama_layanan.string' =>
                    'Nama layanan harus berupa teks.',

                'nama_layanan.max' =>
                    'Nama layanan maksimal 255 karakter.',

                'harga.required' =>
                    'Harga layanan wajib diisi.',

                'harga.integer' =>
                    'Harga layanan harus berupa angka.',

                'harga.min' =>
                    'Harga layanan tidak boleh kurang dari 0.',

                'estimasi.string' =>
                    'Estimasi harus berupa teks.',

                'estimasi.max' =>
                    'Estimasi maksimal 100 karakter.',
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | BERSIHKAN DATA
        |--------------------------------------------------------------------------
        */

        $validated['nama_layanan'] = trim(
            $validated['nama_layanan']
        );


        $validated['estimasi'] =
            isset($validated['estimasi'])
            && trim($validated['estimasi']) !== ''
                ? trim($validated['estimasi'])
                : null;


        /*
        |--------------------------------------------------------------------------
        | CEK DUPLIKAT NAMA
        |--------------------------------------------------------------------------
        |
        | Abaikan layanan yang sedang diedit.
        |
        */

        $namaDipakai = Layanan::where(
            'nama_layanan',
            $validated['nama_layanan']
        )
        ->where(
            'id',
            '!=',
            $layanan->id
        )
        ->exists();


        if ($namaDipakai) {

            return redirect()
                ->route(
                    'layanan.edit',
                    $layanan
                )
                ->withInput()
                ->withErrors([
                    'nama_layanan' =>
                        'Nama layanan tersebut sudah digunakan.',
                ]);

        }


        /*
        |--------------------------------------------------------------------------
        | UPDATE
        |--------------------------------------------------------------------------
        */

        $layanan->update([
            'nama_layanan' =>
                $validated['nama_layanan'],

            'harga' =>
                $validated['harga'],

            'estimasi' =>
                $validated['estimasi'],
        ]);


        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('layanan.index')
            ->with(
                'success',
                'Layanan berhasil diperbarui.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | HAPUS LAYANAN
    |--------------------------------------------------------------------------
    */

    public function destroy(Layanan $layanan)
    {
        /*
        |--------------------------------------------------------------------------
        | CEK APAKAH LAYANAN DIPAKAI TRANSAKSI
        |--------------------------------------------------------------------------
        |
        | Jangan hapus layanan jika sudah digunakan pada transaksi,
        | karena dapat merusak riwayat transaksi laundry.
        |
        */

        $dipakaiTransaksi = Transaksi::where(
            'layanan_id',
            $layanan->id
        )->exists();


        if ($dipakaiTransaksi) {

            return redirect()
                ->route('layanan.index')
                ->withErrors([
                    'layanan' =>
                        'Layanan tidak dapat dihapus karena masih digunakan pada riwayat transaksi.',
                ]);

        }


        /*
        |--------------------------------------------------------------------------
        | HAPUS
        |--------------------------------------------------------------------------
        */

        $namaLayanan =
            $layanan->nama_layanan;


        $layanan->delete();


        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('layanan.index')
            ->with(
                'success',
                'Layanan "' .
                $namaLayanan .
                '" berhasil dihapus.'
            );
    }
}