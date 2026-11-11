<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\StatusLaundryController;
use App\Http\Controllers\LaporanController;


Route::get(
    '/',
    [DashboardController::class, 'index']
)->name('dashboard');


Route::resource(
    'pelanggan',
    PelangganController::class
)->except([
    'create',
    'show'
]);


Route::resource(
    'layanan',
    LayananController::class
)->except([
    'create',
    'show'
]);


Route::resource(
    'transaksi',
    TransaksiController::class
)->except([
    'create',
    'show'
]);


Route::post(
    '/transaksi/{transaksi}/bayar',
    [TransaksiController::class, 'bayar']
)->name('transaksi.bayar');


Route::post(
    '/transaksi/{transaksi}/status',
    [TransaksiController::class, 'updateStatus']
)->name('transaksi.status');


Route::get(
    '/status-laundry',
    [StatusLaundryController::class, 'index']
)->name('status.index');


Route::get(
    '/laporan',
    [LaporanController::class, 'index']
)->name('laporan.index');