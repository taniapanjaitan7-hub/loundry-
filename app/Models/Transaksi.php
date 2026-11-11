<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksis';

    protected $fillable = [
        'kode_transaksi',
        'pelanggan_id',
        'layanan_id',
        'berat',
        'harga_per_kg',
        'total',
        'jenis_pengambilan',
        'alamat_kirim',
        'cara_bayar',
        'metode_pembayaran',
        'status_pembayaran',
        'status_laundry',
        'tanggal_masuk',
        'tanggal_selesai',
        'catatan',
    ];

    protected $casts = [
        'tanggal_masuk' => 'date',
        'tanggal_selesai' => 'date',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }
}