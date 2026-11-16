<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\StatusLaundryController;
use App\Http\Controllers\LaporanController;


/*
|--------------------------------------------------------------------------
| LOGIN ADMIN
|--------------------------------------------------------------------------
*/

Route::get(
    '/login',
    [AuthController::class, 'showLogin']
)->name('login');


Route::post(
    '/login',
    [AuthController::class, 'login']
)->name('login.process');


Route::post(
    '/logout',
    [AuthController::class, 'logout']
)->name('logout');


/*
|--------------------------------------------------------------------------
| HALAMAN YANG HARUS LOGIN
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/',
        [DashboardController::class, 'index']
    )->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | PELANGGAN
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'pelanggan',
        PelangganController::class
    )->except([
        'create',
        'show'
    ]);


    /*
    |--------------------------------------------------------------------------
    | LAYANAN
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'layanan',
        LayananController::class
    )->except([
        'create',
        'show'
    ]);


    /*
    |--------------------------------------------------------------------------
    | TRANSAKSI
    |--------------------------------------------------------------------------
    */

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


    /*
    |--------------------------------------------------------------------------
    | STATUS LAUNDRY
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/status-laundry',
        [StatusLaundryController::class, 'index']
    )->name('status.index');


    /*
    |--------------------------------------------------------------------------
    | LAPORAN
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/laporan',
        [LaporanController::class, 'index']
    )->name('laporan.index');

});