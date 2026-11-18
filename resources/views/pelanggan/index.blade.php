@extends('layouts.app')

@section('title', 'Pelanggan - Tania Mutiara Laundry')


@push('styles')

<style>

    /* =========================================================
       PELANGGAN PREMIUM
    ========================================================= */

    .customer-page {
        width: 100%;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .customer-header {
        position: relative;
        overflow: hidden;

        display: flex;
        justify-content: space-between;
        align-items: center;

        gap: 25px;

        padding: 30px;
        margin-bottom: 25px;

        border-radius: 22px;

        color: white;

        background:
            linear-gradient(
                135deg,
                #1e3a8a 0%,
                #2563eb 55%,
                #0ea5e9 100%
            );

        box-shadow:
            0 16px 38px
            rgba(37,99,235,.18);
    }


    .customer-header::before {
        content: "";

        position: absolute;

        width: 260px;
        height: 260px;

        right: -90px;
        top: -130px;

        border-radius: 50%;

        background:
            rgba(255,255,255,.10);
    }


    .customer-header::after {
        content: "";

        position: absolute;

        width: 160px;
        height: 160px;

        right: 150px;
        bottom: -120px;

        border-radius: 50%;

        background:
            rgba(255,255,255,.06);
    }


    .customer-header-content {
        position: relative;
        z-index: 2;

        max-width: 650px;
    }


    .customer-header h1 {
        margin:
            0 0 8px;

        font-size: 29px;
    }


    .customer-header p {
        margin: 0;

        color:
            rgba(255,255,255,.84);

        font-size: 12px;

        line-height: 1.7;
    }


    .customer-header-icon {
        position: relative;
        z-index: 2;

        width: 100px;
        height: 100px;

        display: flex;
        align-items: center;
        justify-content: center;

        flex-shrink: 0;

        border:
            1px solid
            rgba(255,255,255,.18);

        border-radius: 27px;

        background:
            rgba(255,255,255,.13);

        backdrop-filter:
            blur(12px);

        font-size: 47px;
    }



    /* =========================================================
       ALERT
    ========================================================= */

    .customer-alert-success {
        margin-bottom: 20px;

        padding: 13px 15px;

        background: #dcfce7;

        border:
            1px solid #bbf7d0;

        border-radius: 11px;

        color: #166534;

        font-size: 11px;
    }


    .customer-alert-error {
        margin-bottom: 20px;

        padding: 14px 16px;

        background: #fee2e2;

        border:
            1px solid #fecaca;

        border-radius: 11px;

        color: #991b1b;

        font-size: 11px;
    }


    .customer-alert-error ul {
        margin:
            8px 0 0;

        padding-left: 20px;
    }



    /* =========================================================
       STATISTICS
    ========================================================= */

    .customer-stats-grid {
        display: grid;

        grid-template-columns:
            repeat(3, 1fr);

        gap: 16px;

        margin-bottom: 25px;
    }


    .customer-stat-card {
        position: relative;
        overflow: hidden;

        padding: 20px;

        background: white;

        border:
            1px solid #e8eef7;

        border-radius: 17px;

        box-shadow:
            0 7px 22px
            rgba(15,23,42,.06);

        transition: .2s;
    }


    .customer-stat-card:hover {
        transform:
            translateY(-3px);

        box-shadow:
            0 14px 30px
            rgba(15,23,42,.10);
    }


    .customer-stat-card::after {
        content: "";

        position: absolute;

        width: 85px;
        height: 85px;

        right: -38px;
        bottom: -38px;

        border-radius: 50%;

        background:
            rgba(37,99,235,.06);
    }


    .customer-stat-top {
        display: flex;
        justify-content: space-between;
        align-items: center;

        margin-bottom: 13px;
    }


    .customer-stat-top small {
        color: #64748b;

        font-size: 9px;
        font-weight: 700;

        text-transform: uppercase;

        letter-spacing: .5px;
    }


    .customer-stat-icon {
        width: 42px;
        height: 42px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 12px;

        background:
            linear-gradient(
                135deg,
                #eff6ff,
                #dbeafe
            );

        font-size: 19px;
    }


    .customer-stat-card h2 {
        margin:
            0 0 5px;

        color: #0f172a;

        font-size: 27px;
    }


    .customer-stat-card p {
        margin: 0;

        color: #94a3b8;

        font-size: 9px;
    }


    .stat-phone h2 {
        color: #2563eb;
    }


    .stat-address h2 {
        color: #059669;
    }



    /* =========================================================
       MAIN GRID
    ========================================================= */

    .customer-main-grid {
        display: grid;

        grid-template-columns:
            minmax(300px, .75fr)
            minmax(0, 1.8fr);

        gap: 20px;

        align-items: start;
    }



    /* =========================================================
       PANEL
    ========================================================= */

    .customer-panel {
        padding: 22px;

        background: white;

        border:
            1px solid #e8eef7;

        border-radius: 19px;

        box-shadow:
            0 8px 25px
            rgba(15,23,42,.06);
    }


    .customer-panel-header {
        display: flex;
        justify-content: space-between;
        align-items: center;

        gap: 12px;

        margin-bottom: 20px;

        flex-wrap: wrap;
    }


    .customer-panel-header h2 {
        margin: 0;

        color: #0f172a;

        font-size: 17px;
    }


    .customer-panel-header p {
        margin:
            5px 0 0;

        color: #94a3b8;

        font-size: 9px;

        line-height: 1.5;
    }



    /* =========================================================
       FORM
    ========================================================= */

    .customer-form-group {
        margin-bottom: 15px;
    }


    .customer-form-group label {
        display: block;

        margin-bottom: 7px;

        color: #334155;

        font-size: 11px;

        font-weight: 700;
    }


    .customer-form-group input,
    .customer-form-group textarea {
        width: 100%;

        padding: 11px 12px;

        background: white;

        border:
            1px solid #cbd5e1;

        border-radius: 9px;

        outline: none;

        color: #1e293b;

        font-size: 11px;

        transition: .2s;
    }


    .customer-form-group input:focus,
    .customer-form-group textarea:focus {
        border-color: #2563eb;

        box-shadow:
            0 0 0 3px
            rgba(37,99,235,.09);
    }


    .customer-form-group textarea {
        resize: vertical;
    }


    .customer-form-note {
        margin-top: -5px;
        margin-bottom: 16px;

        padding: 10px 11px;

        background: #f8fafc;

        border:
            1px solid #edf2f7;

        border-radius: 9px;

        color: #64748b;

        font-size: 8px;

        line-height: 1.5;
    }



    /* =========================================================
       BUTTON
    ========================================================= */

    .customer-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        gap: 5px;

        padding: 9px 13px;

        border: none;

        border-radius: 9px;

        cursor: pointer;

        text-decoration: none;

        font-size: 9px;

        font-weight: 700;

        transition: .2s;
    }


    .customer-btn:hover {
        transform:
            translateY(-1px);
    }


    .btn-primary {
        background: #2563eb;

        color: white;
    }


    .btn-primary:hover {
        background: #1d4ed8;
    }


    .btn-info {
        background: #0ea5e9;

        color: white;
    }


    .btn-warning {
        background: #f59e0b;

        color: white;
    }


    .btn-danger {
        background: #dc2626;

        color: white;
    }


    .btn-secondary {
        background: #64748b;

        color: white;
    }


    .btn-save {
        width: 100%;

        padding: 11px 16px;

        font-size: 10px;
    }



    /* =========================================================
       SEARCH
    ========================================================= */

    .customer-search {
        margin-bottom: 18px;

        padding: 14px;

        background: #f8fafc;

        border:
            1px solid #edf2f7;

        border-radius: 13px;
    }


    .customer-search-form {
        display: flex;

        gap: 7px;

        align-items: center;
    }


    .customer-search-form input {
        flex: 1;

        min-width: 0;

        padding: 10px 11px;

        background: white;

        border:
            1px solid #cbd5e1;

        border-radius: 8px;

        outline: none;

        color: #334155;

        font-size: 10px;
    }


    .customer-search-form input:focus {
        border-color: #2563eb;

        box-shadow:
            0 0 0 3px
            rgba(37,99,235,.07);
    }


    .search-result {
        margin-top: 10px;

        padding: 9px 11px;

        background: #eff6ff;

        border:
            1px solid #dbeafe;

        border-radius: 9px;

        color: #1d4ed8;

        font-size: 9px;
    }



    /* =========================================================
       TABLE
    ========================================================= */

    .customer-table-wrapper {
        width: 100%;

        overflow-x: auto;
    }


    .customer-table {
        width: 100%;

        min-width: 780px;

        border-collapse: collapse;
    }


    .customer-table th {
        padding: 11px;

        background: #f8fafc;

        border-bottom:
            1px solid #e2e8f0;

        color: #64748b;

        text-align: left;

        font-size: 8px;

        text-transform: uppercase;

        letter-spacing: .4px;
    }


    .customer-table td {
        padding: 13px 11px;

        border-bottom:
            1px solid #f1f5f9;

        color: #334155;

        vertical-align: middle;

        font-size: 10px;
    }


    .customer-table tbody tr {
        transition: .2s;
    }


    .customer-table tbody tr:hover {
        background: #f8fafc;
    }



    /* =========================================================
       CUSTOMER PROFILE
    ========================================================= */

    .customer-profile {
        display: flex;
        align-items: center;

        gap: 10px;
    }


    .customer-avatar {
        width: 38px;
        height: 38px;

        display: flex;
        align-items: center;
        justify-content: center;

        flex-shrink: 0;

        border-radius: 11px;

        background:
            linear-gradient(
                135deg,
                #dbeafe,
                #e0f2fe
            );

        color: #1d4ed8;

        font-size: 14px;

        font-weight: 800;

        text-transform: uppercase;
    }


    .customer-profile strong {
        display: block;

        color: #0f172a;

        font-size: 10px;
    }


    .customer-profile small {
        display: block;

        margin-top: 3px;

        color: #94a3b8;

        font-size: 8px;
    }


    .customer-address {
        max-width: 230px;

        color: #64748b;

        font-size: 9px;

        line-height: 1.5;
    }



    /* =========================================================
       NUMBER
    ========================================================= */

    .customer-number {
        width: 28px;
        height: 28px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        background: #f1f5f9;

        border-radius: 8px;

        color: #64748b;

        font-size: 9px;

        font-weight: 700;
    }



    /* =========================================================
       STATUS
    ========================================================= */

    .customer-status {
        display: inline-flex;
        align-items: center;

        gap: 4px;

        padding: 5px 8px;

        background: #dcfce7;

        border-radius: 20px;

        color: #166534;

        font-size: 8px;

        font-weight: 700;
    }



    /* =========================================================
       ACTION
    ========================================================= */

    .customer-actions {
        display: flex;

        gap: 5px;

        align-items: center;

        flex-wrap: wrap;
    }


    .customer-actions form {
        margin: 0;
    }



    /* =========================================================
       EMPTY
    ========================================================= */

    .customer-empty {
        padding: 45px 20px !important;

        text-align: center !important;

        color: #94a3b8 !important;
    }


    .customer-empty-icon {
        display: block;

        margin-bottom: 8px;

        font-size: 36px;
    }



    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media(max-width: 1150px) {

        .customer-main-grid {
            grid-template-columns:
                1fr;
        }


        .customer-stats-grid {
            grid-template-columns:
                repeat(3, 1fr);
        }

    }


    @media(max-width: 750px) {

        .customer-header {
            align-items: flex-start;

            flex-direction: column;
        }


        .customer-header-icon {
            display: none;
        }


        .customer-stats-grid {
            grid-template-columns:
                1fr;
        }


        .customer-search-form {
            align-items: stretch;

            flex-direction: column;
        }


        .customer-search-form
        .customer-btn {
            width: 100%;
        }

    }

</style>

@endpush



@section('content')


@php

    /*
    |--------------------------------------------------------------------------
    | RINGKASAN DATA YANG SEDANG DITAMPILKAN
    |--------------------------------------------------------------------------
    */

    $jumlahPelangganDitampilkan =
        $pelanggans->count();


    $jumlahDenganHp =
        $pelanggans
            ->filter(
                function ($pelanggan) {

                    return
                        !empty(
                            $pelanggan->no_hp
                        );

                }
            )
            ->count();


    $jumlahDenganAlamat =
        $pelanggans
            ->filter(
                function ($pelanggan) {

                    return
                        !empty(
                            $pelanggan->alamat
                        );

                }
            )
            ->count();

@endphp



<div class="customer-page">


    <!-- =====================================================
         HEADER
    ====================================================== -->

    <section class="customer-header">


        <div class="customer-header-content">

            <h1>
                👥 Data Pelanggan
            </h1>

            <p>
                Kelola data pelanggan Tania Mutiara Laundry,
                cari pelanggan dengan cepat, lihat riwayat
                transaksi, dan perbarui informasi pelanggan
                dari satu halaman.
            </p>

        </div>


        <div class="customer-header-icon">

            👤

        </div>


    </section>



    <!-- =====================================================
         SUCCESS
    ====================================================== -->

    @if(session('success'))

        <div class="customer-alert-success">

            ✓ {{ session('success') }}

        </div>

    @endif



    <!-- =====================================================
         VALIDATION
    ====================================================== -->

    @if($errors->any())

        <div class="customer-alert-error">

            <strong>
                Data pelanggan belum benar:
            </strong>


            <ul>

                @foreach(
                    $errors->all()
                    as $error
                )

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif



    <!-- =====================================================
         STATISTICS
    ====================================================== -->

    <div class="customer-stats-grid">


        <!-- JUMLAH PELANGGAN -->

        <div class="customer-stat-card">


            <div class="customer-stat-top">

                <small>
                    Pelanggan Ditampilkan
                </small>

                <div class="customer-stat-icon">
                    👥
                </div>

            </div>


            <h2>
                {{ $jumlahPelangganDitampilkan }}
            </h2>


            <p>

                @if(request('search'))

                    Data sesuai hasil pencarian

                @else

                    Data pelanggan yang terdaftar

                @endif

            </p>


        </div>



        <!-- NOMOR HP -->

        <div
            class="
                customer-stat-card
                stat-phone
            "
        >


            <div class="customer-stat-top">

                <small>
                    Memiliki Nomor HP
                </small>

                <div class="customer-stat-icon">
                    📱
                </div>

            </div>


            <h2>
                {{ $jumlahDenganHp }}
            </h2>


            <p>
                Pelanggan dengan nomor yang tersimpan
            </p>


        </div>



        <!-- ALAMAT -->

        <div
            class="
                customer-stat-card
                stat-address
            "
        >


            <div class="customer-stat-top">

                <small>
                    Memiliki Alamat
                </small>

                <div class="customer-stat-icon">
                    📍
                </div>

            </div>


            <h2>
                {{ $jumlahDenganAlamat }}
            </h2>


            <p>
                Pelanggan dengan alamat yang tersimpan
            </p>


        </div>


    </div>



    <!-- =====================================================
         MAIN GRID
    ====================================================== -->

    <div class="customer-main-grid">


        <!-- =================================================
             TAMBAH PELANGGAN
        ================================================== -->

        <div class="customer-panel">


            <div class="customer-panel-header">


                <div>

                    <h2>
                        ➕ Tambah Pelanggan
                    </h2>

                    <p>
                        Tambahkan pelanggan baru sebelum
                        membuat transaksi laundry.
                    </p>

                </div>


            </div>



            <form
                action="{{
                    route(
                        'pelanggan.store'
                    )
                }}"
                method="POST"
            >

                @csrf



                <!-- NAMA -->

                <div class="customer-form-group">


                    <label>
                        👤 Nama Pelanggan
                    </label>


                    <input
                        type="text"
                        name="nama"
                        value="{{ old('nama') }}"
                        placeholder="Masukkan nama pelanggan"
                        autocomplete="name"
                        required
                    >


                </div>



                <!-- HP -->

                <div class="customer-form-group">


                    <label>
                        📱 Nomor HP
                    </label>


                    <input
                        type="text"
                        name="no_hp"
                        value="{{ old('no_hp') }}"
                        placeholder="Contoh: 08123456789"
                        autocomplete="tel"
                    >


                </div>



                <!-- ALAMAT -->

                <div class="customer-form-group">


                    <label>
                        📍 Alamat
                    </label>


                    <textarea
                        name="alamat"
                        rows="4"
                        placeholder="Masukkan alamat pelanggan"
                    >{{ old('alamat') }}</textarea>


                </div>



                <div class="customer-form-note">

                    💡 Pastikan nama dan nomor HP
                    pelanggan sudah benar agar mudah
                    dicari ketika membuat transaksi.

                </div>



                <button
                    type="submit"
                    class="
                        customer-btn
                        btn-primary
                        btn-save
                    "
                >

                    💾 Simpan Pelanggan

                </button>


            </form>


        </div>



        <!-- =================================================
             DAFTAR PELANGGAN
        ================================================== -->

        <div class="customer-panel">


            <div class="customer-panel-header">


                <div>

                    <h2>
                        📋 Daftar Pelanggan
                    </h2>

                    <p>
                        Cari dan kelola informasi pelanggan
                        Tania Mutiara Laundry.
                    </p>

                </div>


                <span class="customer-status">

                    ●
                    {{ $jumlahPelangganDitampilkan }}
                    Pelanggan

                </span>


            </div>



            <!-- =============================================
                 SEARCH
            ============================================== -->

            <div class="customer-search">


                <form
                    action="{{
                        route(
                            'pelanggan.index'
                        )
                    }}"
                    method="GET"
                    class="customer-search-form"
                >


                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Cari nama, nomor HP, atau alamat..."
                    >


                    <button
                        type="submit"
                        class="
                            customer-btn
                            btn-primary
                        "
                    >

                        🔍 Cari

                    </button>



                    @if(request('search'))

                        <a
                            href="{{
                                route(
                                    'pelanggan.index'
                                )
                            }}"
                            class="
                                customer-btn
                                btn-secondary
                            "
                        >

                            Reset

                        </a>

                    @endif


                </form>



                @if(request('search'))

                    <div class="search-result">

                        🔍 Hasil pencarian untuk

                        <strong>
                            "{{ request('search') }}"
                        </strong>

                        —
                        ditemukan

                        <strong>
                            {{ $pelanggans->count() }}
                        </strong>

                        data.

                    </div>

                @endif


            </div>



            <!-- =============================================
                 TABLE
            ============================================== -->

            <div class="customer-table-wrapper">


                <table class="customer-table">


                    <thead>

                        <tr>

                            <th>
                                No
                            </th>

                            <th>
                                Pelanggan
                            </th>

                            <th>
                                Nomor HP
                            </th>

                            <th>
                                Alamat
                            </th>

                            <th>
                                Aksi
                            </th>

                        </tr>

                    </thead>



                    <tbody>


                    @forelse(
                        $pelanggans
                        as $pelanggan
                    )


                        <tr>


                            <!-- NOMOR -->

                            <td>

                                <span class="customer-number">

                                    {{
                                        $loop->iteration
                                    }}

                                </span>

                            </td>



                            <!-- PROFILE -->

                            <td>


                                <div class="customer-profile">


                                    <div class="customer-avatar">

                                        {{
                                            strtoupper(
                                                substr(
                                                    $pelanggan->nama,
                                                    0,
                                                    1
                                                )
                                            )
                                        }}

                                    </div>



                                    <div>

                                        <strong>

                                            {{
                                                $pelanggan
                                                    ->nama
                                            }}

                                        </strong>


                                        <small>

                                            ID Pelanggan:
                                            #{{ $pelanggan->id }}

                                        </small>

                                    </div>


                                </div>


                            </td>



                            <!-- HP -->

                            <td>


                                @if($pelanggan->no_hp)

                                    📱
                                    {{ $pelanggan->no_hp }}

                                @else

                                    <span
                                        style="
                                            color:#94a3b8;
                                        "
                                    >
                                        -
                                    </span>

                                @endif


                            </td>



                            <!-- ALAMAT -->

                            <td>

                                <div class="customer-address">

                                    @if($pelanggan->alamat)

                                        📍
                                        {{
                                            $pelanggan
                                                ->alamat
                                        }}

                                    @else

                                        -

                                    @endif

                                </div>

                            </td>



                            <!-- ACTION -->

                            <td>


                                <div class="customer-actions">


                                    <!-- RIWAYAT -->

                                    <a
                                        href="{{
                                            route(
                                                'pelanggan.show',
                                                $pelanggan
                                            )
                                        }}"
                                        class="
                                            customer-btn
                                            btn-info
                                        "
                                    >

                                        📋 Riwayat

                                    </a>



                                    <!-- EDIT -->

                                    <a
                                        href="{{
                                            route(
                                                'pelanggan.edit',
                                                $pelanggan
                                            )
                                        }}"
                                        class="
                                            customer-btn
                                            btn-warning
                                        "
                                    >

                                        ✏️ Edit

                                    </a>



                                    <!-- DELETE -->

                                    <form
                                        action="{{
                                            route(
                                                'pelanggan.destroy',
                                                $pelanggan
                                            )
                                        }}"
                                        method="POST"

                                        onsubmit="
                                            return confirm(
                                                'Yakin ingin menghapus pelanggan ini? Data yang sudah dihapus tidak dapat dikembalikan.'
                                            )
                                        "
                                    >

                                        @csrf

                                        @method('DELETE')


                                        <button
                                            type="submit"
                                            class="
                                                customer-btn
                                                btn-danger
                                            "
                                        >

                                            🗑 Hapus

                                        </button>


                                    </form>


                                </div>


                            </td>


                        </tr>


                    @empty


                        <tr>


                            <td
                                colspan="5"
                                class="customer-empty"
                            >


                                <span class="customer-empty-icon">
                                    👥
                                </span>


                                @if(request('search'))

                                    <strong>
                                        Pelanggan tidak ditemukan.
                                    </strong>

                                    <br>

                                    Coba gunakan nama,
                                    nomor HP, atau alamat lain.

                                @else

                                    <strong>
                                        Belum ada pelanggan.
                                    </strong>

                                    <br>

                                    Tambahkan pelanggan pertama
                                    melalui form di sebelah kiri.

                                @endif


                            </td>


                        </tr>


                    @endforelse


                    </tbody>


                </table>


            </div>


        </div>


    </div>


</div>


@endsection