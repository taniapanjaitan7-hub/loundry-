<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();

            $table->string('kode_transaksi')->unique();

            $table->foreignId('pelanggan_id')
                ->constrained('pelanggans')
                ->restrictOnDelete();

            $table->foreignId('layanan_id')
                ->constrained('layanans')
                ->restrictOnDelete();

            $table->decimal('berat', 8, 2);

            $table->integer('harga_per_kg');

            $table->integer('total');

            $table->string('jenis_pengambilan')
                ->default('ambil_sendiri');

            $table->text('alamat_kirim')->nullable();

            $table->string('cara_bayar')
                ->default('nanti');

            $table->string('metode_pembayaran')
                ->nullable();

            $table->string('status_pembayaran')
                ->default('Belum Lunas');

            $table->string('status_laundry')
                ->default('Diterima');

            $table->date('tanggal_masuk');

            $table->date('tanggal_selesai')
                ->nullable();

            $table->text('catatan')
                ->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};