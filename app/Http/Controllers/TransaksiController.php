<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class TransaksiController extends Controller
{
    private string $timezone = 'Asia/Jakarta';

    /**
     * Daftar transaksi + pencarian + filter + statistik.
     */
    public function index(Request $request)
    {
        Carbon::setLocale('id');

        /*
        |--------------------------------------------------------------------------
        | VALIDASI FILTER
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate(
            [
                'search' => [
                    'nullable',
                    'string',
                    'max:100',
                ],

                'status_pembayaran' => [
                    'nullable',
                    Rule::in([
                        'Lunas',
                        'Belum Lunas',
                    ]),
                ],

                'status_laundry' => [
                    'nullable',
                    Rule::in([
                        'Diterima',
                        'Dicuci',
                        'Dikeringkan',
                        'Disetrika',
                        'Selesai',
                        'Diambil',
                        'Dikirim',
                    ]),
                ],

                'jenis_pengambilan' => [
                    'nullable',
                    Rule::in([
                        'ambil_sendiri',
                        'kirim',
                    ]),
                ],

                'tanggal_mulai' => [
                    'nullable',
                    'date',
                ],

                'tanggal_akhir' => [
                    'nullable',
                    'date',
                ],
            ],
            [
                'search.max' =>
                    'Pencarian maksimal 100 karakter.',

                'status_pembayaran.in' =>
                    'Filter pembayaran tidak valid.',

                'status_laundry.in' =>
                    'Filter status laundry tidak valid.',

                'jenis_pengambilan.in' =>
                    'Filter jenis pengambilan tidak valid.',

                'tanggal_mulai.date' =>
                    'Tanggal mulai tidak valid.',

                'tanggal_akhir.date' =>
                    'Tanggal akhir tidak valid.',
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | AMBIL FILTER
        |--------------------------------------------------------------------------
        */

        $search = trim(
            (string) ($validated['search'] ?? '')
        );

        $statusPembayaran =
            $validated['status_pembayaran']
            ?? null;

        $statusLaundry =
            $validated['status_laundry']
            ?? null;

        $jenisPengambilan =
            $validated['jenis_pengambilan']
            ?? null;

        $tanggalMulai =
            $validated['tanggal_mulai']
            ?? null;

        $tanggalAkhir =
            $validated['tanggal_akhir']
            ?? null;


        /*
        |--------------------------------------------------------------------------
        | CEK RENTANG TANGGAL
        |--------------------------------------------------------------------------
        */

        if (
            $tanggalMulai
            &&
            $tanggalAkhir
            &&
            Carbon::parse($tanggalAkhir)
                ->lt(Carbon::parse($tanggalMulai))
        ) {
            return back()
                ->withInput()
                ->withErrors([
                    'tanggal_akhir' =>
                        'Tanggal akhir harus sama atau setelah tanggal mulai.',
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | QUERY
        |--------------------------------------------------------------------------
        */

        $query = Transaksi::query()
            ->with([
                'pelanggan',
                'layanan',
            ]);


        /*
        |--------------------------------------------------------------------------
        | SEARCH
        |--------------------------------------------------------------------------
        |
        | Bisa mencari:
        | - kode transaksi
        | - nama pelanggan
        | - nomor HP pelanggan
        | - nama layanan
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

                            $pelangganQuery
                                ->where(
                                    'nama',
                                    'like',
                                    '%' . $search . '%'
                                )
                                ->orWhere(
                                    'no_hp',
                                    'like',
                                    '%' . $search . '%'
                                );
                        }
                    )

                    ->orWhereHas(
                        'layanan',
                        function ($layananQuery) use ($search) {

                            $layananQuery->where(
                                'nama_layanan',
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
        | FILTER PEMBAYARAN
        |--------------------------------------------------------------------------
        */

        if ($statusPembayaran) {

            $query->where(
                'status_pembayaran',
                $statusPembayaran
            );
        }


        /*
        |--------------------------------------------------------------------------
        | FILTER STATUS LAUNDRY
        |--------------------------------------------------------------------------
        */

        if ($statusLaundry) {

            $query->where(
                'status_laundry',
                $statusLaundry
            );
        }


        /*
        |--------------------------------------------------------------------------
        | FILTER PENGAMBILAN
        |--------------------------------------------------------------------------
        */

        if ($jenisPengambilan) {

            $query->where(
                'jenis_pengambilan',
                $jenisPengambilan
            );
        }


        /*
        |--------------------------------------------------------------------------
        | FILTER TANGGAL
        |--------------------------------------------------------------------------
        */

        if ($tanggalMulai) {

            $query->whereDate(
                'tanggal_masuk',
                '>=',
                $tanggalMulai
            );
        }


        if ($tanggalAkhir) {

            $query->whereDate(
                'tanggal_masuk',
                '<=',
                $tanggalAkhir
            );
        }


        /*
        |--------------------------------------------------------------------------
        | HASIL TRANSAKSI
        |--------------------------------------------------------------------------
        */

        $transaksis = $query
            ->orderByDesc('tanggal_masuk')
            ->orderByDesc('id')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | MASTER DATA
        |--------------------------------------------------------------------------
        */

        $pelanggans = Pelanggan::orderBy(
            'nama'
        )->get();


        $layanans = Layanan::orderBy(
            'nama_layanan'
        )->get();


        /*
        |--------------------------------------------------------------------------
        | STATISTIK
        |--------------------------------------------------------------------------
        */

        $totalTransaksi =
            Transaksi::count();


        $totalLunas =
            Transaksi::where(
                'status_pembayaran',
                'Lunas'
            )->count();


        $belumLunas =
            Transaksi::where(
                'status_pembayaran',
                'Belum Lunas'
            )->count();


        $nominalBelumLunas =
            Transaksi::where(
                'status_pembayaran',
                'Belum Lunas'
            )->sum('total');


        $pendapatan =
            Transaksi::where(
                'status_pembayaran',
                'Lunas'
            )->sum('total');


        $transaksiAktif =
            Transaksi::whereNotIn(
                'status_laundry',
                [
                    'Selesai',
                    'Diambil',
                    'Dikirim',
                ]
            )->count();


        $totalBerat =
            Transaksi::sum('berat');


        /*
        |--------------------------------------------------------------------------
        | HARI INI
        |--------------------------------------------------------------------------
        */

        $hariIni = Carbon::today(
            $this->timezone
        )->toDateString();


        $transaksiHariIni =
            Transaksi::whereDate(
                'tanggal_masuk',
                $hariIni
            )->count();


        $pendapatanHariIni =
            Transaksi::whereDate(
                'tanggal_masuk',
                $hariIni
            )
            ->where(
                'status_pembayaran',
                'Lunas'
            )
            ->sum('total');


        /*
        |--------------------------------------------------------------------------
        | JUMLAH HASIL FILTER
        |--------------------------------------------------------------------------
        */

        $totalHasilFilter =
            $transaksis->count();


        /*
        |--------------------------------------------------------------------------
        | RETURN VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'transaksi.index',
            compact(
                'transaksis',
                'pelanggans',
                'layanans',

                'totalTransaksi',
                'totalLunas',
                'belumLunas',
                'nominalBelumLunas',
                'pendapatan',
                'transaksiAktif',
                'totalBerat',
                'transaksiHariIni',
                'pendapatanHariIni',
                'totalHasilFilter',

                'search',
                'statusPembayaran',
                'statusLaundry',
                'jenisPengambilan',
                'tanggalMulai',
                'tanggalAkhir'
            )
        );
    }


    /**
     * Simpan transaksi baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'pelanggan_id' => [
                    'required',
                    'exists:pelanggans,id',
                ],

                'layanan_id' => [
                    'required',
                    'exists:layanans,id',
                ],

                'berat' => [
                    'required',
                    'numeric',
                    'min:0.1',
                    'max:1000',
                ],

                'jenis_pengambilan' => [
                    'required',
                    Rule::in([
                        'ambil_sendiri',
                        'kirim',
                    ]),
                ],

                'alamat_kirim' => [
                    'nullable',
                    'required_if:jenis_pengambilan,kirim',
                    'string',
                    'max:1000',
                ],

                'cara_bayar' => [
                    'required',
                    Rule::in([
                        'langsung',
                        'nanti',
                    ]),
                ],

                'metode_pembayaran' => [
                    'nullable',
                    'required_if:cara_bayar,langsung',
                    Rule::in([
                        'Tunai',
                        'Transfer',
                        'QRIS',
                    ]),
                ],

                'tanggal_selesai' => [
                    'nullable',
                    'date',
                ],

                'catatan' => [
                    'nullable',
                    'string',
                    'max:2000',
                ],
            ],
            [
                'pelanggan_id.required' =>
                    'Pelanggan wajib dipilih.',

                'pelanggan_id.exists' =>
                    'Pelanggan tidak ditemukan.',

                'layanan_id.required' =>
                    'Layanan wajib dipilih.',

                'layanan_id.exists' =>
                    'Layanan tidak ditemukan.',

                'berat.required' =>
                    'Berat laundry wajib diisi.',

                'berat.numeric' =>
                    'Berat laundry harus berupa angka.',

                'berat.min' =>
                    'Berat laundry minimal 0,1 Kg.',

                'berat.max' =>
                    'Berat laundry terlalu besar.',

                'jenis_pengambilan.required' =>
                    'Jenis pengambilan wajib dipilih.',

                'alamat_kirim.required_if' =>
                    'Alamat pengiriman wajib diisi.',

                'cara_bayar.required' =>
                    'Cara pembayaran wajib dipilih.',

                'metode_pembayaran.required_if' =>
                    'Metode pembayaran wajib dipilih.',

                'tanggal_selesai.date' =>
                    'Tanggal selesai tidak valid.',

                'catatan.max' =>
                    'Catatan maksimal 2000 karakter.',
            ]
        );


        /*
        |--------------------------------------------------------------------------
        | LAYANAN + TOTAL
        |--------------------------------------------------------------------------
        */

        $layanan = Layanan::findOrFail(
            $validated['layanan_id']
        );


        $harga = (int) $layanan->harga;


        $total = (int) round(
            $harga
            *
            (float) $validated['berat']
        );


        /*
        |--------------------------------------------------------------------------
        | KODE TRANSAKSI
        |--------------------------------------------------------------------------
        */

        $sekarang = Carbon::now(
            $this->timezone
        );


        do {

            $kode =
                'TRX-'
                .
                $sekarang->format('YmdHis')
                .
                '-'
                .
                strtoupper(
                    Str::random(4)
                );

        } while (
            Transaksi::where(
                'kode_transaksi',
                $kode
            )->exists()
        );


        /*
        |--------------------------------------------------------------------------
        | PEMBAYARAN
        |--------------------------------------------------------------------------
        */

        $langsung =
            $validated['cara_bayar']
            === 'langsung';


        $statusPembayaran =
            $langsung
                ? 'Lunas'
                : 'Belum Lunas';


        /*
        |--------------------------------------------------------------------------
        | SIMPAN
        |--------------------------------------------------------------------------
        */

        $transaksi = Transaksi::create([
            'kode_transaksi' =>
                $kode,

            'pelanggan_id' =>
                $validated['pelanggan_id'],

            'layanan_id' =>
                $validated['layanan_id'],

            'berat' =>
                $validated['berat'],

            'harga_per_kg' =>
                $harga,

            'total' =>
                $total,

            'jenis_pengambilan' =>
                $validated['jenis_pengambilan'],

            'alamat_kirim' =>
                $validated['jenis_pengambilan']
                === 'kirim'
                    ? trim(
                        $validated['alamat_kirim']
                    )
                    : null,

            'cara_bayar' =>
                $validated['cara_bayar'],

            'metode_pembayaran' =>
                $langsung
                    ? $validated[
                        'metode_pembayaran'
                    ]
                    : null,

            'status_pembayaran' =>
                $statusPembayaran,

            'status_laundry' =>
                'Diterima',

            'tanggal_masuk' =>
                $sekarang->toDateString(),

            'tanggal_selesai' =>
                $validated[
                    'tanggal_selesai'
                ]
                ?? null,

            'catatan' =>
                isset($validated['catatan'])
                    ? trim(
                        $validated['catatan']
                    )
                    : null,
        ]);


        return redirect()
            ->route(
                'transaksi.show',
                $transaksi
            )
            ->with(
                'success',
                'Transaksi '
                .
                $kode
                .
                ' berhasil dibuat.'
            );
    }


    /**
     * Detail / struk transaksi.
     */
    public function show(
        Transaksi $transaksi
    ) {
        $transaksi->load([
            'pelanggan',
            'layanan',
        ]);


        return view(
            'transaksi.show',
            compact('transaksi')
        );
    }


    /**
     * Form edit.
     */
    public function edit(
        Transaksi $transaksi
    ) {
        $pelanggans =
            Pelanggan::orderBy(
                'nama'
            )->get();


        $layanans =
            Layanan::orderBy(
                'nama_layanan'
            )->get();


        return view(
            'transaksi.edit',
            compact(
                'transaksi',
                'pelanggans',
                'layanans'
            )
        );
    }


    /**
     * Update transaksi.
     */
    public function update(
        Request $request,
        Transaksi $transaksi
    ) {
        $validated = $request->validate(
            [
                'pelanggan_id' => [
                    'required',
                    'exists:pelanggans,id',
                ],

                'layanan_id' => [
                    'required',
                    'exists:layanans,id',
                ],

                'berat' => [
                    'required',
                    'numeric',
                    'min:0.1',
                    'max:1000',
                ],

                'jenis_pengambilan' => [
                    'required',
                    Rule::in([
                        'ambil_sendiri',
                        'kirim',
                    ]),
                ],

                'alamat_kirim' => [
                    'nullable',
                    'required_if:jenis_pengambilan,kirim',
                    'string',
                    'max:1000',
                ],

                'tanggal_selesai' => [
                    'nullable',
                    'date',
                ],

                'catatan' => [
                    'nullable',
                    'string',
                    'max:2000',
                ],
            ],
            [
                'pelanggan_id.required' =>
                    'Pelanggan wajib dipilih.',

                'layanan_id.required' =>
                    'Layanan wajib dipilih.',

                'berat.required' =>
                    'Berat laundry wajib diisi.',

                'berat.numeric' =>
                    'Berat harus berupa angka.',

                'berat.min' =>
                    'Berat minimal 0,1 Kg.',

                'alamat_kirim.required_if' =>
                    'Alamat wajib diisi untuk pengiriman.',

                'tanggal_selesai.date' =>
                    'Tanggal selesai tidak valid.',
            ]
        );


        $layanan = Layanan::findOrFail(
            $validated['layanan_id']
        );


        $total = (int) round(
            $layanan->harga
            *
            (float) $validated['berat']
        );


        $transaksi->update([
            'pelanggan_id' =>
                $validated['pelanggan_id'],

            'layanan_id' =>
                $validated['layanan_id'],

            'berat' =>
                $validated['berat'],

            'harga_per_kg' =>
                $layanan->harga,

            'total' =>
                $total,

            'jenis_pengambilan' =>
                $validated['jenis_pengambilan'],

            'alamat_kirim' =>
                $validated['jenis_pengambilan']
                === 'kirim'
                    ? trim(
                        $validated['alamat_kirim']
                    )
                    : null,

            'tanggal_selesai' =>
                $validated[
                    'tanggal_selesai'
                ]
                ?? null,

            'catatan' =>
                isset($validated['catatan'])
                    ? trim(
                        $validated['catatan']
                    )
                    : null,
        ]);


        return redirect()
            ->route(
                'transaksi.show',
                $transaksi
            )
            ->with(
                'success',
                'Transaksi berhasil diperbarui.'
            );
    }


    /**
     * Bayar transaksi.
     */
    public function bayar(
        Request $request,
        Transaksi $transaksi
    ) {
        if (
            $transaksi->status_pembayaran
            === 'Lunas'
        ) {
            return back()->with(
                'success',
                'Transaksi ini sudah Lunas.'
            );
        }


        $validated = $request->validate(
            [
                'metode_pembayaran' => [
                    'required',
                    Rule::in([
                        'Tunai',
                        'Transfer',
                        'QRIS',
                    ]),
                ],
            ],
            [
                'metode_pembayaran.required' =>
                    'Pilih metode pembayaran.',

                'metode_pembayaran.in' =>
                    'Metode pembayaran tidak valid.',
            ]
        );


        $transaksi->update([
            'cara_bayar' =>
                'langsung',

            'metode_pembayaran' =>
                $validated[
                    'metode_pembayaran'
                ],

            'status_pembayaran' =>
                'Lunas',
        ]);


        return back()->with(
            'success',
            'Pembayaran berhasil. Transaksi sudah Lunas.'
        );
    }


    /**
     * Update status laundry.
     */
    public function updateStatus(
        Request $request,
        Transaksi $transaksi
    ) {
        $validated = $request->validate(
            [
                'status_laundry' => [
                    'required',
                    Rule::in([
                        'Diterima',
                        'Dicuci',
                        'Dikeringkan',
                        'Disetrika',
                        'Selesai',
                        'Diambil',
                        'Dikirim',
                    ]),
                ],
            ],
            [
                'status_laundry.required' =>
                    'Status laundry wajib dipilih.',

                'status_laundry.in' =>
                    'Status laundry tidak valid.',
            ]
        );


        $dataUpdate = [
            'status_laundry' =>
                $validated['status_laundry'],
        ];


        /*
        |--------------------------------------------------------------------------
        | TANGGAL SELESAI OTOMATIS
        |--------------------------------------------------------------------------
        */

        if (
            $validated['status_laundry']
            === 'Selesai'
            &&
            empty($transaksi->tanggal_selesai)
        ) {
            $dataUpdate['tanggal_selesai'] =
                Carbon::now(
                    $this->timezone
                )->toDateString();
        }


        $transaksi->update(
            $dataUpdate
        );


        return back()->with(
            'success',
            'Status laundry berhasil diubah menjadi '
            .
            $validated['status_laundry']
            .
            '.'
        );
    }


    /**
     * Hapus transaksi.
     */
    public function destroy(
        Transaksi $transaksi
    ) {
        $kode =
            $transaksi->kode_transaksi;


        $transaksi->delete();


        return redirect()
            ->route('transaksi.index')
            ->with(
                'success',
                'Transaksi '
                .
                $kode
                .
                ' berhasil dihapus.'
            );
    }
}