<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with(['pelanggan', 'layanan'])
            ->latest()
            ->get();

        $pelanggans = Pelanggan::orderBy('nama')->get();

        $layanans = Layanan::orderBy('nama_layanan')->get();

        $totalTransaksi = Transaksi::count();

        $belumLunas = Transaksi::where(
            'status_pembayaran',
            'Belum Lunas'
        )->count();

        $pendapatan = Transaksi::where(
            'status_pembayaran',
            'Lunas'
        )->sum('total');

        return view('transaksi.index', compact(
            'transaksis',
            'pelanggans',
            'layanans',
            'totalTransaksi',
            'belumLunas',
            'pendapatan'
        ));
    }


    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'layanan_id' => 'required|exists:layanans,id',
            'berat' => 'required|numeric|min:0.1',

            'jenis_pengambilan' =>
                'required|in:ambil_sendiri,kirim',

            'alamat_kirim' =>
                'nullable|required_if:jenis_pengambilan,kirim',

            'cara_bayar' =>
                'required|in:langsung,nanti',

            'metode_pembayaran' =>
                'nullable|required_if:cara_bayar,langsung',

            'tanggal_selesai' => 'nullable|date',
            'catatan' => 'nullable',
        ]);

        $layanan = Layanan::findOrFail(
            $request->layanan_id
        );

        $harga = $layanan->harga;

        $total = round(
            $harga * $request->berat
        );

        $kode = 'TRX-' .
            now()->format('YmdHis') .
            '-' .
            strtoupper(Str::random(3));

        $statusPembayaran =
            $request->cara_bayar === 'langsung'
                ? 'Lunas'
                : 'Belum Lunas';

        Transaksi::create([
            'kode_transaksi' => $kode,

            'pelanggan_id' =>
                $request->pelanggan_id,

            'layanan_id' =>
                $request->layanan_id,

            'berat' =>
                $request->berat,

            'harga_per_kg' =>
                $harga,

            'total' =>
                $total,

            'jenis_pengambilan' =>
                $request->jenis_pengambilan,

            'alamat_kirim' =>
                $request->jenis_pengambilan === 'kirim'
                    ? $request->alamat_kirim
                    : null,

            'cara_bayar' =>
                $request->cara_bayar,

            'metode_pembayaran' =>
                $request->cara_bayar === 'langsung'
                    ? $request->metode_pembayaran
                    : null,

            'status_pembayaran' =>
                $statusPembayaran,

            'status_laundry' =>
                'Diterima',

            'tanggal_masuk' =>
                now()->toDateString(),

            'tanggal_selesai' =>
                $request->tanggal_selesai,

            'catatan' =>
                $request->catatan,
        ]);

        return redirect()
            ->route('transaksi.index')
            ->with(
                'success',
                'Transaksi berhasil ditambahkan.'
            );
    }


    public function edit(Transaksi $transaksi)
    {
        $pelanggans = Pelanggan::orderBy('nama')
            ->get();

        $layanans = Layanan::orderBy('nama_layanan')
            ->get();

        return view(
            'transaksi.edit',
            compact(
                'transaksi',
                'pelanggans',
                'layanans'
            )
        );
    }


    public function update(
        Request $request,
        Transaksi $transaksi
    ) {
        $request->validate([
            'pelanggan_id' =>
                'required|exists:pelanggans,id',

            'layanan_id' =>
                'required|exists:layanans,id',

            'berat' =>
                'required|numeric|min:0.1',

            'jenis_pengambilan' =>
                'required|in:ambil_sendiri,kirim',

            'alamat_kirim' =>
                'nullable|required_if:jenis_pengambilan,kirim',

            'tanggal_selesai' =>
                'nullable|date',

            'catatan' =>
                'nullable',
        ]);

        $layanan = Layanan::findOrFail(
            $request->layanan_id
        );

        $total = round(
            $layanan->harga *
            $request->berat
        );

        $transaksi->update([
            'pelanggan_id' =>
                $request->pelanggan_id,

            'layanan_id' =>
                $request->layanan_id,

            'berat' =>
                $request->berat,

            'harga_per_kg' =>
                $layanan->harga,

            'total' =>
                $total,

            'jenis_pengambilan' =>
                $request->jenis_pengambilan,

            'alamat_kirim' =>
                $request->jenis_pengambilan === 'kirim'
                    ? $request->alamat_kirim
                    : null,

            'tanggal_selesai' =>
                $request->tanggal_selesai,

            'catatan' =>
                $request->catatan,
        ]);

        return redirect()
            ->route('transaksi.index')
            ->with(
                'success',
                'Transaksi berhasil diperbarui.'
            );
    }


    public function bayar(
        Request $request,
        Transaksi $transaksi
    ) {
        $request->validate([
            'metode_pembayaran' =>
                'required|in:Tunai,Transfer,QRIS',
        ]);

        $transaksi->update([
            'cara_bayar' =>
                'langsung',

            'metode_pembayaran' =>
                $request->metode_pembayaran,

            'status_pembayaran' =>
                'Lunas',
        ]);

        return redirect()
            ->route('transaksi.index')
            ->with(
                'success',
                'Pembayaran berhasil. Transaksi sudah lunas.'
            );
    }


    public function updateStatus(
        Request $request,
        Transaksi $transaksi
    ) {
        $request->validate([
            'status_laundry' =>
                'required|in:Diterima,Dicuci,Dikeringkan,Disetrika,Selesai,Diambil,Dikirim',
        ]);

        $transaksi->update([
            'status_laundry' =>
                $request->status_laundry,
        ]);

        return redirect()
            ->route('transaksi.index')
            ->with(
                'success',
                'Status laundry berhasil diperbarui.'
            );
    }


    public function destroy(
        Transaksi $transaksi
    ) {
        $transaksi->delete();

        return redirect()
            ->route('transaksi.index')
            ->with(
                'success',
                'Transaksi berhasil dihapus.'
            );
    }
}