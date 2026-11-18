@extends('layouts.app')

@section('title', 'Riwayat Pelanggan - Tania Mutiara Laundry')


@push('styles')

<style>

    /* =========================================================
       CUSTOMER HISTORY PREMIUM
    ========================================================= */

    .customer-history-page {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
    }


    /* =========================================================
       HERO
    ========================================================= */

    .customer-history-hero {
        position: relative;
        overflow: hidden;

        display: flex;
        justify-content: space-between;
        align-items: center;

        gap: 25px;

        margin-bottom: 24px;
        padding: 30px;

        border-radius: 22px;

        color: white;

        background:
            linear-gradient(
                135deg,
                #1e3a8a,
                #2563eb,
                #0ea5e9
            );

        box-shadow:
            0 16px 38px
            rgba(37, 99, 235, .18);
    }


    .customer-history-hero::before {
        content: "";

        position: absolute;

        width: 270px;
        height: 270px;

        right: -100px;
        top: -140px;

        border-radius: 50%;

        background:
            rgba(255,255,255,.10);
    }


    .customer-history-hero::after {
        content: "";

        position: absolute;

        width: 170px;
        height: 170px;

        right: 170px;
        bottom: -130px;

        border-radius: 50%;

        background:
            rgba(255,255,255,.06);
    }


    .history-hero-content {
        position: relative;
        z-index: 2;
    }


    .history-hero-content h1 {
        margin:
            0 0 7px;

        font-size: 29px;
    }


    .history-hero-content p {
        margin: 0;

        max-width: 620px;

        color:
            rgba(255,255,255,.84);

        font-size: 12px;

        line-height: 1.6;
    }


    .history-hero-actions {
        position: relative;
        z-index: 2;

        display: flex;
        gap: 8px;

        flex-wrap: wrap;
    }



    /* =========================================================
       BUTTON
    ========================================================= */

    .history-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        gap: 6px;

        padding: 10px 14px;

        border: none;

        border-radius: 9px;

        cursor: pointer;

        text-decoration: none;

        font-size: 10px;
        font-weight: 700;

        transition: .2s;
    }


    .history-btn:hover {
        transform:
            translateY(-1px);
    }


    .btn-light {
        background: white;

        color: #1d4ed8;
    }


    .btn-warning {
        background: #f59e0b;

        color: white;
    }


    .btn-primary {
        background: #2563eb;

        color: white;
    }


    .btn-success {
        background: #16a34a;

        color: white;
    }



    /* =========================================================
       PROFILE
    ========================================================= */

    .customer-profile-card {
        display: grid;

        grid-template-columns:
            180px
            minmax(0, 1fr);

        gap: 22px;

        margin-bottom: 24px;
        padding: 24px;

        background: white;

        border:
            1px solid #e8eef7;

        border-radius: 19px;

        box-shadow:
            0 8px 25px
            rgba(15,23,42,.06);
    }


    .profile-main {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;

        padding: 18px;

        background:
            linear-gradient(
                135deg,
                #eff6ff,
                #f0f9ff
            );

        border:
            1px solid #dbeafe;

        border-radius: 16px;

        text-align: center;
    }


    .profile-avatar {
        width: 78px;
        height: 78px;

        display: flex;
        align-items: center;
        justify-content: center;

        margin-bottom: 12px;

        border-radius: 24px;

        background:
            linear-gradient(
                135deg,
                #2563eb,
                #0ea5e9
            );

        color: white;

        font-size: 30px;
        font-weight: 800;

        text-transform: uppercase;

        box-shadow:
            0 10px 25px
            rgba(37,99,235,.20);
    }


    .profile-main h2 {
        margin:
            0 0 4px;

        color: #0f172a;

        font-size: 16px;
    }


    .profile-main p {
        margin: 0;

        color: #64748b;

        font-size: 9px;
    }


    .profile-info {
        display: grid;

        grid-template-columns:
            repeat(2, 1fr);

        gap: 12px;
    }


    .profile-info-item {
        padding: 15px;

        background: #f8fafc;

        border:
            1px solid #edf2f7;

        border-radius: 12px;
    }


    .profile-info-item small {
        display: block;

        margin-bottom: 6px;

        color: #64748b;

        font-size: 8px;

        font-weight: 700;

        text-transform: uppercase;

        letter-spacing: .4px;
    }


    .profile-info-item strong {
        color: #0f172a;

        font-size: 11px;

        line-height: 1.5;
    }



    /* =========================================================
       STATISTICS
    ========================================================= */

    .history-stats-grid {
        display: grid;

        grid-template-columns:
            repeat(4, 1fr);

        gap: 15px;

        margin-bottom: 24px;
    }


    .history-stat-card {
        position: relative;
        overflow: hidden;

        padding: 19px;

        background: white;

        border:
            1px solid #e8eef7;

        border-radius: 16px;

        box-shadow:
            0 7px 22px
            rgba(15,23,42,.05);

        transition: .2s;
    }


    .history-stat-card:hover {
        transform:
            translateY(-3px);

        box-shadow:
            0 13px 28px
            rgba(15,23,42,.09);
    }


    .history-stat-card::after {
        content: "";

        position: absolute;

        width: 80px;
        height: 80px;

        right: -35px;
        bottom: -35px;

        border-radius: 50%;

        background:
            rgba(37,99,235,.05);
    }


    .history-stat-top {
        display: flex;
        justify-content: space-between;
        align-items: center;

        margin-bottom: 12px;
    }


    .history-stat-top small {
        color: #64748b;

        font-size: 8px;
        font-weight: 700;

        text-transform: uppercase;
    }


    .history-stat-icon {
        width: 38px;
        height: 38px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 11px;

        background:
            linear-gradient(
                135deg,
                #eff6ff,
                #dbeafe
            );

        font-size: 17px;
    }


    .history-stat-card h2 {
        margin:
            0 0 4px;

        color: #0f172a;

        font-size: 24px;
    }


    .history-stat-card p {
        margin: 0;

        color: #94a3b8;

        font-size: 8px;
    }


    .stat-money h2 {
        color: #059669;

        font-size: 20px;
    }


    .stat-unpaid h2 {
        color: #e11d48;
    }


    .stat-weight h2 {
        color: #2563eb;
    }



    /* =========================================================
       PANEL
    ========================================================= */

    .history-panel {
        padding: 22px;

        background: white;

        border:
            1px solid #e8eef7;

        border-radius: 19px;

        box-shadow:
            0 8px 25px
            rgba(15,23,42,.06);
    }


    .history-panel-header {
        display: flex;
        justify-content: space-between;
        align-items: center;

        gap: 15px;

        margin-bottom: 18px;

        flex-wrap: wrap;
    }


    .history-panel-header h2 {
        margin: 0;

        color: #0f172a;

        font-size: 17px;
    }


    .history-panel-header p {
        margin:
            5px 0 0;

        color: #94a3b8;

        font-size: 9px;
    }


    .transaction-count-badge {
        display: inline-flex;
        align-items: center;

        padding: 6px 10px;

        background: #eff6ff;

        border:
            1px solid #dbeafe;

        border-radius: 20px;

        color: #1d4ed8;

        font-size: 8px;
        font-weight: 700;
    }



    /* =========================================================
       TABLE
    ========================================================= */

    .history-table-wrapper {
        width: 100%;

        overflow-x: auto;
    }


    .history-table {
        width: 100%;

        min-width: 1000px;

        border-collapse: collapse;
    }


    .history-table th {
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


    .history-table td {
        padding: 13px 11px;

        border-bottom:
            1px solid #f1f5f9;

        color: #334155;

        vertical-align: middle;

        font-size: 10px;
    }


    .history-table tbody tr:hover {
        background: #f8fafc;
    }


    .transaction-number {
        width: 27px;
        height: 27px;

        display: inline-flex;
        align-items: center;
        justify-content: center;

        background: #f1f5f9;

        border-radius: 7px;

        color: #64748b;

        font-size: 8px;

        font-weight: 700;
    }


    .transaction-code {
        color: #2563eb;

        font-weight: 800;
    }


    .transaction-total {
        color: #0f172a;

        font-weight: 800;
    }



    /* =========================================================
       BADGES
    ========================================================= */

    .history-badge {
        display: inline-flex;
        align-items: center;

        padding: 5px 8px;

        border-radius: 20px;

        font-size: 8px;
        font-weight: 700;
    }


    .badge-green {
        background: #dcfce7;

        color: #166534;
    }


    .badge-red {
        background: #fee2e2;

        color: #991b1b;
    }


    .badge-blue {
        background: #dbeafe;

        color: #1d4ed8;
    }


    .badge-orange {
        background: #ffedd5;

        color: #9a3412;
    }



    /* =========================================================
       EMPTY
    ========================================================= */

    .history-empty {
        padding: 45px 20px !important;

        text-align: center !important;

        color: #94a3b8 !important;
    }


    .history-empty span {
        display: block;

        margin-bottom: 8px;

        font-size: 40px;
    }



    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media(max-width: 1050px) {

        .history-stats-grid {
            grid-template-columns:
                repeat(2, 1fr);
        }


        .customer-profile-card {
            grid-template-columns:
                1fr;
        }

    }


    @media(max-width: 700px) {

        .customer-history-hero {
            align-items: flex-start;

            flex-direction: column;
        }


        .history-stats-grid {
            grid-template-columns:
                1fr;
        }


        .profile-info {
            grid-template-columns:
                1fr;
        }


        .history-hero-actions {
            width: 100%;
        }


        .history-hero-actions
        .history-btn {
            flex: 1;
        }

    }

</style>

@endpush



@section('content')


@php

    /*
    |--------------------------------------------------------------------------
    | DATA TAMBAHAN RIWAYAT
    |--------------------------------------------------------------------------
    */

    $riwayatTransaksi =
        $pelanggan->transaksis;


    $totalBerat =
        $riwayatTransaksi
            ->sum('berat');


    $transaksiSelesai =
        $riwayatTransaksi
            ->whereIn(
                'status_laundry',
                [
                    'Selesai',
                    'Diambil',
                    'Dikirim'
                ]
            )
            ->count();


    $transaksiTerakhir =
        $riwayatTransaksi
            ->sortByDesc(
                function ($transaksi) {

                    return
                        $transaksi->tanggal_masuk
                        ?? $transaksi->created_at;

                }
            )
            ->first();

@endphp



<div class="customer-history-page">


    <!-- =====================================================
         HERO
    ====================================================== -->

    <section class="customer-history-hero">


        <div class="history-hero-content">

            <h1>
                👤 Riwayat Pelanggan
            </h1>

            <p>
                Lihat profil pelanggan, total transaksi,
                pembayaran, berat laundry, serta seluruh
                riwayat pesanan di Tania Mutiara Laundry.
            </p>

        </div>



        <div class="history-hero-actions">


            <a
                href="{{ route('pelanggan.index') }}"
                class="
                    history-btn
                    btn-light
                "
            >
                ← Kembali
            </a>


            <a
                href="{{
                    route(
                        'pelanggan.edit',
                        $pelanggan
                    )
                }}"
                class="
                    history-btn
                    btn-warning
                "
            >
                ✏️ Edit Pelanggan
            </a>


        </div>


    </section>



    <!-- =====================================================
         PROFILE
    ====================================================== -->

    <div class="customer-profile-card">


        <div class="profile-main">


            <div class="profile-avatar">

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


            <h2>
                {{ $pelanggan->nama }}
            </h2>


            <p>
                ID Pelanggan #{{ $pelanggan->id }}
            </p>


        </div>



        <div class="profile-info">


            <!-- NAMA -->

            <div class="profile-info-item">

                <small>
                    👤 Nama Pelanggan
                </small>

                <strong>
                    {{ $pelanggan->nama }}
                </strong>

            </div>



            <!-- HP -->

            <div class="profile-info-item">

                <small>
                    📱 Nomor HP
                </small>

                <strong>
                    {{ $pelanggan->no_hp ?? '-' }}
                </strong>

            </div>



            <!-- ALAMAT -->

            <div class="profile-info-item">

                <small>
                    📍 Alamat
                </small>

                <strong>
                    {{ $pelanggan->alamat ?? '-' }}
                </strong>

            </div>



            <!-- TRANSAKSI TERAKHIR -->

            <div class="profile-info-item">

                <small>
                    🕒 Transaksi Terakhir
                </small>

                <strong>

                    @if(
                        $transaksiTerakhir
                        &&
                        $transaksiTerakhir
                            ->tanggal_masuk
                    )

                        {{
                            \Carbon\Carbon::parse(
                                $transaksiTerakhir
                                    ->tanggal_masuk
                            )
                            ->translatedFormat(
                                'd F Y'
                            )
                        }}

                    @elseif(
                        $transaksiTerakhir
                    )

                        {{
                            $transaksiTerakhir
                                ->created_at
                                ?->translatedFormat(
                                    'd F Y'
                                )
                            ?? '-'
                        }}

                    @else

                        Belum ada transaksi

                    @endif

                </strong>

            </div>


        </div>


    </div>



    <!-- =====================================================
         STATISTICS
    ====================================================== -->

    <div class="history-stats-grid">


        <!-- TOTAL TRANSAKSI -->

        <div class="history-stat-card">


            <div class="history-stat-top">

                <small>
                    Total Transaksi
                </small>

                <div class="history-stat-icon">
                    🧾
                </div>

            </div>


            <h2>
                {{ $totalTransaksi }}
            </h2>


            <p>
                Seluruh pesanan pelanggan
            </p>


        </div>



        <!-- TOTAL BELANJA -->

        <div
            class="
                history-stat-card
                stat-money
            "
        >


            <div class="history-stat-top">

                <small>
                    Total Pembayaran Lunas
                </small>

                <div class="history-stat-icon">
                    💰
                </div>

            </div>


            <h2>

                Rp
                {{
                    number_format(
                        $totalBelanja,
                        0,
                        ',',
                        '.'
                    )
                }}

            </h2>


            <p>
                Total transaksi yang sudah lunas
            </p>


        </div>



        <!-- BELUM LUNAS -->

        <div
            class="
                history-stat-card
                stat-unpaid
            "
        >


            <div class="history-stat-top">

                <small>
                    Belum Lunas
                </small>

                <div class="history-stat-icon">
                    💳
                </div>

            </div>


            <h2>
                {{ $belumLunas }}
            </h2>


            <p>
                Transaksi menunggu pembayaran
            </p>


        </div>



        <!-- TOTAL BERAT -->

        <div
            class="
                history-stat-card
                stat-weight
            "
        >


            <div class="history-stat-top">

                <small>
                    Total Berat Laundry
                </small>

                <div class="history-stat-icon">
                    ⚖️
                </div>

            </div>


            <h2>

                {{
                    number_format(
                        $totalBerat,
                        1,
                        ',',
                        '.'
                    )
                }}
                Kg

            </h2>


            <p>
                Akumulasi berat seluruh transaksi
            </p>


        </div>


    </div>



    <!-- =====================================================
         TRANSACTION HISTORY
    ====================================================== -->

    <div class="history-panel">


        <div class="history-panel-header">


            <div>

                <h2>
                    🧾 Riwayat Transaksi
                </h2>

                <p>
                    Seluruh aktivitas transaksi pelanggan
                    di Tania Mutiara Laundry.
                </p>

            </div>


            <div class="transaction-count-badge">

                ✅
                {{ $transaksiSelesai }}
                Selesai

                &nbsp; • &nbsp;

                {{ $totalTransaksi }}
                Total

            </div>


        </div>



        <div class="history-table-wrapper">


            <table class="history-table">


                <thead>


                    <tr>

                        <th>
                            No
                        </th>

                        <th>
                            Kode
                        </th>

                        <th>
                            Tanggal
                        </th>

                        <th>
                            Layanan
                        </th>

                        <th>
                            Berat
                        </th>

                        <th>
                            Total
                        </th>

                        <th>
                            Pembayaran
                        </th>

                        <th>
                            Status Laundry
                        </th>

                        <th>
                            Aksi
                        </th>

                    </tr>


                </thead>



                <tbody>


                @forelse(
                    $pelanggan->transaksis
                    as $transaksi
                )


                    <tr>


                        <!-- NO -->

                        <td>

                            <span class="transaction-number">

                                {{ $loop->iteration }}

                            </span>

                        </td>



                        <!-- CODE -->

                        <td>

                            <span class="transaction-code">

                                {{
                                    $transaksi
                                        ->kode_transaksi
                                }}

                            </span>

                        </td>



                        <!-- DATE -->

                        <td>


                            @if(
                                $transaksi
                                    ->tanggal_masuk
                            )

                                {{
                                    \Carbon\Carbon::parse(
                                        $transaksi
                                            ->tanggal_masuk
                                    )
                                    ->translatedFormat(
                                        'd M Y'
                                    )
                                }}

                            @else

                                -

                            @endif


                        </td>



                        <!-- SERVICE -->

                        <td>

                            {{
                                $transaksi
                                    ->layanan
                                    ->nama_layanan
                                ?? '-'
                            }}

                        </td>



                        <!-- WEIGHT -->

                        <td>

                            {{
                                number_format(
                                    $transaksi->berat,
                                    1,
                                    ',',
                                    '.'
                                )
                            }}

                            Kg

                        </td>



                        <!-- TOTAL -->

                        <td>

                            <span class="transaction-total">

                                Rp
                                {{
                                    number_format(
                                        $transaksi
                                            ->total,
                                        0,
                                        ',',
                                        '.'
                                    )
                                }}

                            </span>

                        </td>



                        <!-- PAYMENT -->

                        <td>


                            @if(
                                $transaksi
                                    ->status_pembayaran
                                === 'Lunas'
                            )

                                <span
                                    class="
                                        history-badge
                                        badge-green
                                    "
                                >
                                    ✓ Lunas
                                </span>

                            @else

                                <span
                                    class="
                                        history-badge
                                        badge-red
                                    "
                                >
                                    Belum Lunas
                                </span>

                            @endif


                        </td>



                        <!-- STATUS -->

                        <td>


                            @if(
                                in_array(
                                    $transaksi
                                        ->status_laundry,
                                    [
                                        'Selesai',
                                        'Diambil',
                                        'Dikirim'
                                    ]
                                )
                            )

                                <span
                                    class="
                                        history-badge
                                        badge-green
                                    "
                                >

                                    {{
                                        $transaksi
                                            ->status_laundry
                                    }}

                                </span>


                            @elseif(
                                $transaksi
                                    ->status_laundry
                                === 'Diterima'
                            )

                                <span
                                    class="
                                        history-badge
                                        badge-orange
                                    "
                                >

                                    Diterima

                                </span>


                            @else

                                <span
                                    class="
                                        history-badge
                                        badge-blue
                                    "
                                >

                                    {{
                                        $transaksi
                                            ->status_laundry
                                    }}

                                </span>

                            @endif


                        </td>



                        <!-- ACTION -->

                        <td>


                            <a
                                href="{{
                                    route(
                                        'transaksi.show',
                                        $transaksi
                                    )
                                }}"
                                class="
                                    history-btn
                                    btn-primary
                                "
                            >

                                👁 Detail

                            </a>


                        </td>


                    </tr>


                @empty


                    <tr>


                        <td
                            colspan="9"
                            class="history-empty"
                        >

                            <span>
                                🧺
                            </span>

                            <strong>
                                Belum ada transaksi.
                            </strong>

                            <br>

                            Pelanggan ini belum memiliki
                            riwayat transaksi laundry.

                        </td>


                    </tr>


                @endforelse


                </tbody>


            </table>


        </div>


    </div>


</div>


@endsection