@extends('layouts.app')

@section('title', 'Laporan - Tania Mutiara Laundry')


@push('styles')

<style>

    /* =========================================================
       LAPORAN PREMIUM
    ========================================================= */

    .report-page {
        width: 100%;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .report-header {
        position: relative;

        overflow: hidden;

        display: flex;
        justify-content: space-between;
        align-items: center;

        gap: 25px;

        margin-bottom: 24px;

        padding: 28px;

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
            0 15px 35px
            rgba(37,99,235,.16);
    }


    .report-header::after {
        content: "";

        position: absolute;

        width: 220px;
        height: 220px;

        right: -80px;
        top: -100px;

        border-radius: 50%;

        background:
            rgba(255,255,255,.10);
    }


    .report-header-content {
        position: relative;

        z-index: 2;
    }


    .report-header h1 {
        margin:
            0 0 7px;

        font-size: 29px;
    }


    .report-header p {
        margin: 0;

        max-width: 650px;

        color:
            rgba(255,255,255,.84);

        font-size: 12px;

        line-height: 1.6;
    }


    .report-header-action {
        position: relative;

        z-index: 2;

        flex-shrink: 0;
    }



    /* =========================================================
       BUTTON
    ========================================================= */

    .report-btn {
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


    .report-btn:hover {
        transform:
            translateY(-1px);
    }


    .report-btn-primary {
        background: #2563eb;

        color: white;
    }


    .report-btn-secondary {
        background: #64748b;

        color: white;
    }


    .report-btn-print {
        padding: 11px 16px;

        background: white;

        color: #1d4ed8;

        box-shadow:
            0 5px 15px
            rgba(0,0,0,.10);
    }



    /* =========================================================
       PANEL
    ========================================================= */

    .report-panel {
        margin-bottom: 24px;

        padding: 22px;

        background: white;

        border:
            1px solid #e8eef7;

        border-radius: 19px;

        box-shadow:
            0 8px 25px
            rgba(15,23,42,.06);
    }


    .report-panel-header {
        display: flex;
        justify-content: space-between;
        align-items: center;

        gap: 15px;

        margin-bottom: 18px;

        flex-wrap: wrap;
    }


    .report-panel-header h2 {
        margin: 0;

        color: #0f172a;

        font-size: 17px;
    }


    .report-panel-header p {
        margin:
            5px 0 0;

        color: #94a3b8;

        font-size: 10px;
    }



    /* =========================================================
       FILTER
    ========================================================= */

    .report-filter {
        display: grid;

        grid-template-columns:
            repeat(2, minmax(180px, 1fr))
            auto;

        gap: 14px;

        align-items: end;
    }


    .report-form-group label {
        display: block;

        margin-bottom: 6px;

        color: #475569;

        font-size: 10px;

        font-weight: 700;

        text-transform: uppercase;
    }


    .report-form-group input {
        width: 100%;

        padding: 11px 12px;

        border:
            1px solid #cbd5e1;

        border-radius: 9px;

        background: white;

        color: #1e293b;

        outline: none;

        font-size: 11px;

        transition: .2s;
    }


    .report-form-group input:focus {
        border-color: #2563eb;

        box-shadow:
            0 0 0 3px
            rgba(37,99,235,.08);
    }


    .filter-buttons {
        display: flex;

        gap: 7px;

        flex-wrap: wrap;
    }


    .periode-info {
        margin-top: 15px;

        padding: 11px 13px;

        background: #eff6ff;

        border:
            1px solid #dbeafe;

        border-radius: 10px;

        color: #1d4ed8;

        font-size: 10px;
    }



    /* =========================================================
       STATISTICS
    ========================================================= */

    .report-stat-grid {
        display: grid;

        grid-template-columns:
            repeat(5, 1fr);

        gap: 14px;

        margin-bottom: 24px;
    }


    .report-stat-card {
        position: relative;

        overflow: hidden;

        padding: 19px;

        background: white;

        border:
            1px solid #e8eef7;

        border-radius: 16px;

        box-shadow:
            0 6px 20px
            rgba(15,23,42,.05);

        transition: .2s;
    }


    .report-stat-card:hover {
        transform:
            translateY(-3px);

        box-shadow:
            0 12px 28px
            rgba(15,23,42,.09);
    }


    .report-stat-card::after {
        content: "";

        position: absolute;

        width: 75px;
        height: 75px;

        right: -35px;
        bottom: -35px;

        border-radius: 50%;

        background:
            rgba(37,99,235,.05);
    }


    .report-stat-top {
        display: flex;
        justify-content: space-between;
        align-items: center;

        margin-bottom: 12px;
    }


    .report-stat-top small {
        color: #64748b;

        font-size: 9px;

        font-weight: 700;

        text-transform: uppercase;

        letter-spacing: .4px;
    }


    .report-stat-icon {
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


    .report-stat-card h2 {
        margin:
            0 0 5px;

        color: #0f172a;

        font-size: 24px;
    }


    .report-stat-card p {
        margin: 0;

        color: #94a3b8;

        font-size: 8px;
    }


    .report-stat-income h2 {
        color: #059669;

        font-size: 19px;
    }


    .report-stat-unpaid h2 {
        color: #e11d48;
    }



    /* =========================================================
       ANALYTICS
    ========================================================= */

    .analytics-grid {
        display: grid;

        grid-template-columns:
            minmax(0, 2fr)
            minmax(280px, .8fr);

        gap: 20px;

        margin-bottom: 24px;
    }


    .chart-card {
        padding: 22px;

        background: white;

        border:
            1px solid #e8eef7;

        border-radius: 19px;

        box-shadow:
            0 8px 25px
            rgba(15,23,42,.06);
    }


    .chart-header {
        display: flex;
        justify-content: space-between;
        align-items: center;

        gap: 15px;

        margin-bottom: 18px;

        flex-wrap: wrap;
    }


    .chart-header h2 {
        margin: 0;

        color: #0f172a;

        font-size: 16px;
    }


    .chart-header p {
        margin:
            5px 0 0;

        color: #94a3b8;

        font-size: 9px;
    }


    .chart-badge {
        padding: 6px 10px;

        border-radius: 20px;

        background: #ecfdf5;

        color: #047857;

        font-size: 8px;

        font-weight: 700;
    }


    .chart-wrapper {
        width: 100%;
        height: 280px;

        position: relative;
    }


    #reportRevenueChart {
        display: block;

        width: 100%;
        height: 100%;
    }



    /* =========================================================
       STATUS SUMMARY
    ========================================================= */

    .status-card {
        padding: 22px;

        background: white;

        border:
            1px solid #e8eef7;

        border-radius: 19px;

        box-shadow:
            0 8px 25px
            rgba(15,23,42,.06);
    }


    .status-card h2 {
        margin:
            0 0 5px;

        color: #0f172a;

        font-size: 16px;
    }


    .status-card > p {
        margin:
            0 0 17px;

        color: #94a3b8;

        font-size: 9px;
    }


    .status-list {
        display: flex;

        flex-direction: column;

        gap: 8px;
    }


    .status-row {
        display: flex;
        justify-content: space-between;
        align-items: center;

        gap: 10px;

        padding: 9px 11px;

        background: #f8fafc;

        border:
            1px solid #edf2f7;

        border-radius: 10px;
    }


    .status-name {
        color: #475569;

        font-size: 9px;

        font-weight: 600;
    }


    .status-count {
        min-width: 28px;

        padding: 4px 7px;

        background: #dbeafe;

        border-radius: 20px;

        color: #1d4ed8;

        text-align: center;

        font-size: 9px;

        font-weight: 800;
    }



    /* =========================================================
       TABLE
    ========================================================= */

    .report-table-wrapper {
        width: 100%;

        overflow-x: auto;
    }


    .report-table {
        width: 100%;

        border-collapse: collapse;
    }


    .report-table.transactions {
        min-width: 1050px;
    }


    .report-table th {
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


    .report-table td {
        padding: 12px 11px;

        border-bottom:
            1px solid #f1f5f9;

        color: #334155;

        vertical-align: middle;

        font-size: 10px;
    }


    .report-table tbody tr:hover {
        background: #f8fafc;
    }


    .report-code {
        color: #2563eb;

        font-weight: 800;
    }


    .report-money {
        color: #0f172a;

        font-weight: 800;
    }



    /* =========================================================
       BADGE
    ========================================================= */

    .report-badge {
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



    /* =========================================================
       SECONDARY TABLE GRID
    ========================================================= */

    .secondary-table-grid {
        display: grid;

        grid-template-columns:
            repeat(2, minmax(0, 1fr));

        gap: 20px;
    }



    /* =========================================================
       EMPTY
    ========================================================= */

    .report-empty {
        padding: 30px !important;

        text-align: center !important;

        color: #94a3b8 !important;
    }



    /* =========================================================
       PRINT HEADER
    ========================================================= */

    .print-report-header {
        display: none;
    }



    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media(max-width: 1200px) {

        .report-stat-grid {
            grid-template-columns:
                repeat(3, 1fr);
        }


        .analytics-grid {
            grid-template-columns:
                1fr;
        }

    }


    @media(max-width: 900px) {

        .report-filter {
            grid-template-columns:
                1fr;
        }


        .secondary-table-grid {
            grid-template-columns:
                1fr;
        }

    }


    @media(max-width: 700px) {

        .report-header {
            align-items: flex-start;

            flex-direction: column;
        }


        .report-stat-grid {
            grid-template-columns:
                1fr;
        }


        .chart-wrapper {
            height: 230px;
        }

    }



    /* =========================================================
       PRINT
    ========================================================= */

    @media print {

        @page {
            size: A4 landscape;

            margin: 10mm;
        }


        .sidebar,
        .sidebar-bottom,
        .page-overlay,
        .footer,
        .topbar,
        .report-header,
        .filter-panel,
        .analytics-grid,
        .no-print {
            display: none !important;
        }


        html,
        body {
            background: white !important;
        }


        .main-content {
            margin-left: 0 !important;

            padding: 0 !important;

            background: white !important;
        }


        .report-page {
            width: 100%;

            max-width: 100%;
        }


        .print-report-header {
            display: block;

            margin-bottom: 20px;

            text-align: center;
        }


        .print-report-header h1 {
            margin:
                0 0 5px;

            font-size: 21px;
        }


        .print-report-header p {
            margin:
                3px 0;

            font-size: 10px;
        }


        .report-stat-grid {
            grid-template-columns:
                repeat(5, 1fr);

            gap: 7px;

            margin-bottom: 15px;
        }


        .report-stat-card {
            padding: 10px;

            box-shadow: none;

            border:
                1px solid #ddd;

            border-radius: 4px;
        }


        .report-stat-icon {
            display: none;
        }


        .report-stat-card h2 {
            font-size: 15px;
        }


        .report-stat-card p {
            display: none;
        }


        .report-panel {
            padding: 10px;

            margin-bottom: 15px;

            box-shadow: none;

            border:
                1px solid #ddd;

            border-radius: 0;

            break-inside: avoid;
        }


        .report-panel-header {
            margin-bottom: 8px;
        }


        .report-panel-header h2 {
            font-size: 13px;
        }


        .report-panel-header p {
            display: none;
        }


        .secondary-table-grid {
            display: block;
        }


        .secondary-table-grid
        .report-panel {
            margin-bottom: 15px;
        }


        .report-table {
            min-width: 0 !important;

            font-size: 8px;
        }


        .report-table th,
        .report-table td {
            padding: 5px;

            border:
                1px solid #ddd;
        }


        .report-table th {
            background: #f3f4f6 !important;

            color: black;
        }


        .report-badge {
            padding: 2px 4px;

            background: white !important;

            color: black !important;

            border:
                1px solid #aaa;
        }

    }

</style>

@endpush



@section('content')


@php

    /*
    |--------------------------------------------------------------------------
    | DATA ANALISIS
    |--------------------------------------------------------------------------
    */

    $transaksiLunasPeriode =
        $transaksis->where(
            'status_pembayaran',
            'Lunas'
        );


    $jumlahLunasPeriode =
        $transaksiLunasPeriode->count();


    $jumlahBelumLunasPeriode =
        $transaksis->where(
            'status_pembayaran',
            'Belum Lunas'
        )->count();


    $pendapatanPeriode =
        $transaksiLunasPeriode->sum(
            'total'
        );


    /*
    |--------------------------------------------------------------------------
    | DATA GRAFIK PENDAPATAN
    |--------------------------------------------------------------------------
    */

    $chartGroups =
        $transaksiLunasPeriode
            ->filter(
                function ($item) {

                    return
                        !empty(
                            $item->tanggal_masuk
                        );

                }
            )
            ->groupBy(
                function ($item) {

                    return
                        \Carbon\Carbon::parse(
                            $item->tanggal_masuk
                        )
                        ->format(
                            'Y-m-d'
                        );

                }
            )
            ->sortKeys();


    $chartLabels = [];

    $chartValues = [];


    foreach(
        $chartGroups
        as $tanggal => $items
    ) {

        $chartLabels[] =
            \Carbon\Carbon::parse(
                $tanggal
            )
            ->translatedFormat(
                'd M'
            );


        $chartValues[] =
            (int)
            $items->sum(
                'total'
            );

    }


    /*
    |--------------------------------------------------------------------------
    | STATUS LAUNDRY
    |--------------------------------------------------------------------------
    */

    $daftarStatus = [
        'Diterima',
        'Dicuci',
        'Dikeringkan',
        'Disetrika',
        'Selesai',
        'Diambil',
        'Dikirim'
    ];


    $statusJumlah = [];


    foreach(
        $daftarStatus
        as $statusItem
    ) {

        $statusJumlah[
            $statusItem
        ] =
            $transaksis
                ->where(
                    'status_laundry',
                    $statusItem
                )
                ->count();

    }

@endphp



<div class="report-page">


    <!-- =====================================================
         PRINT HEADER
    ====================================================== -->

    <div class="print-report-header">


        <h1>
            TANIA MUTIARA LAUNDRY
        </h1>


        <p>
            Laporan Sistem Informasi Laundry
        </p>


        @if(
            $tanggalMulai
            ||
            $tanggalAkhir
        )

            <p>

                Periode:

                {{
                    $tanggalMulai
                    ? date(
                        'd-m-Y',
                        strtotime(
                            $tanggalMulai
                        )
                    )
                    : 'Awal'
                }}

                s/d

                {{
                    $tanggalAkhir
                    ? date(
                        'd-m-Y',
                        strtotime(
                            $tanggalAkhir
                        )
                    )
                    : 'Sekarang'
                }}

            </p>

        @else

            <p>
                Semua Periode
            </p>

        @endif


        <p>
            Dicetak:
            {{ date('d-m-Y H:i') }}
        </p>


    </div>



    <!-- =====================================================
         HEADER
    ====================================================== -->

    <section class="report-header">


        <div class="report-header-content">


            <h1>
                📊 Laporan Laundry
            </h1>


            <p>

                Pantau transaksi, pendapatan, pelanggan,
                layanan dan performa operasional
                Tania Mutiara Laundry dalam satu laporan.

            </p>


        </div>



        <div class="report-header-action">


            <button
                type="button"
                onclick="window.print()"
                class="
                    report-btn
                    report-btn-print
                "
            >
                🖨 Cetak / Simpan PDF
            </button>


        </div>


    </section>



    <!-- =====================================================
         FILTER
    ====================================================== -->

    <div
        class="
            report-panel
            filter-panel
        "
    >


        <div class="report-panel-header">


            <div>

                <h2>
                    📅 Filter Periode Laporan
                </h2>

                <p>
                    Tentukan rentang tanggal laporan yang ingin ditampilkan.
                </p>

            </div>


        </div>



        <form
            action="{{ route('laporan.index') }}"
            method="GET"
            class="report-filter"
        >


            <div class="report-form-group">

                <label>
                    Tanggal Mulai
                </label>

                <input
                    type="date"
                    name="tanggal_mulai"
                    value="{{ $tanggalMulai }}"
                >

            </div>



            <div class="report-form-group">

                <label>
                    Tanggal Akhir
                </label>

                <input
                    type="date"
                    name="tanggal_akhir"
                    value="{{ $tanggalAkhir }}"
                >

            </div>



            <div class="filter-buttons">


                <button
                    type="submit"
                    class="
                        report-btn
                        report-btn-primary
                    "
                >
                    🔍 Tampilkan
                </button>


                @if(
                    $tanggalMulai
                    ||
                    $tanggalAkhir
                )

                    <a
                        href="{{
                            route(
                                'laporan.index'
                            )
                        }}"
                        class="
                            report-btn
                            report-btn-secondary
                        "
                    >
                        Reset
                    </a>

                @endif


            </div>


        </form>



        <div class="periode-info">


            @if(
                $tanggalMulai
                ||
                $tanggalAkhir
            )

                📌 Periode aktif:

                <strong>

                    {{
                        $tanggalMulai
                        ? date(
                            'd-m-Y',
                            strtotime(
                                $tanggalMulai
                            )
                        )
                        : 'Awal'
                    }}

                    sampai

                    {{
                        $tanggalAkhir
                        ? date(
                            'd-m-Y',
                            strtotime(
                                $tanggalAkhir
                            )
                        )
                        : 'Sekarang'
                    }}

                </strong>


            @else

                📌 Menampilkan laporan seluruh periode.

            @endif


        </div>


    </div>



    <!-- =====================================================
         STATISTICS
    ====================================================== -->

    <div class="report-stat-grid">


        <!-- PELANGGAN -->

        <div class="report-stat-card">


            <div class="report-stat-top">

                <small>
                    Total Pelanggan
                </small>

                <div class="report-stat-icon">
                    👥
                </div>

            </div>


            <h2>
                {{ $totalPelanggan }}
            </h2>


            <p>
                Pelanggan terdaftar
            </p>


        </div>



        <!-- LAYANAN -->

        <div class="report-stat-card">


            <div class="report-stat-top">

                <small>
                    Total Layanan
                </small>

                <div class="report-stat-icon">
                    👕
                </div>

            </div>


            <h2>
                {{ $totalLayanan }}
            </h2>


            <p>
                Jenis layanan tersedia
            </p>


        </div>



        <!-- TRANSAKSI -->

        <div class="report-stat-card">


            <div class="report-stat-top">

                <small>
                    Total Transaksi
                </small>

                <div class="report-stat-icon">
                    🧾
                </div>

            </div>


            <h2>
                {{ $totalTransaksi }}
            </h2>


            <p>
                Transaksi pada laporan
            </p>


        </div>



        <!-- PENDAPATAN -->

        <div
            class="
                report-stat-card
                report-stat-income
            "
        >


            <div class="report-stat-top">

                <small>
                    Pendapatan Lunas
                </small>

                <div class="report-stat-icon">
                    💰
                </div>

            </div>


            <h2>

                Rp
                {{
                    number_format(
                        $totalPendapatan,
                        0,
                        ',',
                        '.'
                    )
                }}

            </h2>


            <p>
                Transaksi yang sudah dibayar
            </p>


        </div>



        <!-- BELUM LUNAS -->

        <div
            class="
                report-stat-card
                report-stat-unpaid
            "
        >


            <div class="report-stat-top">

                <small>
                    Belum Lunas
                </small>

                <div class="report-stat-icon">
                    💳
                </div>

            </div>


            <h2>
                {{ $belumLunas }}
            </h2>


            <p>
                Menunggu pembayaran
            </p>


        </div>


    </div>



    <!-- =====================================================
         ANALYTICS
    ====================================================== -->

    <div class="analytics-grid no-print">


        <!-- CHART -->

        <div class="chart-card">


            <div class="chart-header">


                <div>

                    <h2>
                        📈 Grafik Pendapatan
                    </h2>

                    <p>
                        Pendapatan transaksi lunas berdasarkan tanggal masuk.
                    </p>

                </div>


                <div class="chart-badge">

                    ● Rp
                    {{
                        number_format(
                            $pendapatanPeriode,
                            0,
                            ',',
                            '.'
                        )
                    }}

                </div>


            </div>



            <div class="chart-wrapper">

                <canvas id="reportRevenueChart"></canvas>

            </div>


        </div>



        <!-- STATUS SUMMARY -->

        <div class="status-card">


            <h2>
                🔄 Status Laundry
            </h2>


            <p>
                Jumlah transaksi berdasarkan proses laundry.
            </p>



            <div class="status-list">


                @foreach(
                    $daftarStatus
                    as $statusItem
                )


                    <div class="status-row">


                        <span class="status-name">

                            @if($statusItem === 'Diterima')
                                📥
                            @elseif($statusItem === 'Dicuci')
                                🫧
                            @elseif($statusItem === 'Dikeringkan')
                                💨
                            @elseif($statusItem === 'Disetrika')
                                👔
                            @elseif($statusItem === 'Selesai')
                                ✅
                            @elseif($statusItem === 'Diambil')
                                🤝
                            @else
                                🚚
                            @endif

                            {{ $statusItem }}

                        </span>


                        <span class="status-count">

                            {{
                                $statusJumlah[
                                    $statusItem
                                ]
                            }}

                        </span>


                    </div>


                @endforeach


            </div>


        </div>


    </div>



    <!-- =====================================================
         TRANSAKSI
    ====================================================== -->

    <div class="report-panel">


        <div class="report-panel-header">


            <div>

                <h2>
                    🧾 Data Transaksi
                </h2>


                <p>

                    @if(
                        $tanggalMulai
                        ||
                        $tanggalAkhir
                    )

                        Data transaksi sesuai periode laporan.

                    @else

                        Seluruh transaksi Tania Mutiara Laundry.

                    @endif

                </p>

            </div>


            <div class="no-print">

                <span
                    class="
                        report-badge
                        badge-blue
                    "
                >
                    {{ $transaksis->count() }}
                    Data
                </span>

            </div>


        </div>



        <div class="report-table-wrapper">


            <table
                class="
                    report-table
                    transactions
                "
            >


                <thead>

                    <tr>

                        <th>No</th>

                        <th>Kode</th>

                        <th>Tanggal</th>

                        <th>Pelanggan</th>

                        <th>Layanan</th>

                        <th>Berat</th>

                        <th>Total</th>

                        <th>Pembayaran</th>

                        <th>Status Laundry</th>

                    </tr>

                </thead>



                <tbody>


                @forelse(
                    $transaksis
                    as $transaksi
                )


                    <tr>


                        <td>
                            {{ $loop->iteration }}
                        </td>



                        <td>

                            <span class="report-code">

                                {{
                                    $transaksi
                                        ->kode_transaksi
                                }}

                            </span>

                        </td>



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
                                    ->format(
                                        'd-m-Y'
                                    )
                                }}

                            @else

                                -

                            @endif

                        </td>



                        <td>

                            {{
                                $transaksi
                                    ->pelanggan
                                    ->nama
                                ?? '-'
                            }}

                        </td>



                        <td>

                            {{
                                $transaksi
                                    ->layanan
                                    ->nama_layanan
                                ?? '-'
                            }}

                        </td>



                        <td>

                            {{
                                $transaksi->berat
                            }}
                            Kg

                        </td>



                        <td>

                            <span class="report-money">

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



                        <td>


                            @if(
                                $transaksi
                                    ->status_pembayaran
                                === 'Lunas'
                            )


                                <span
                                    class="
                                        report-badge
                                        badge-green
                                    "
                                >
                                    ✓ Lunas
                                </span>


                            @else


                                <span
                                    class="
                                        report-badge
                                        badge-red
                                    "
                                >
                                    Belum Lunas
                                </span>


                            @endif


                        </td>



                        <td>

                            <span
                                class="
                                    report-badge
                                    badge-blue
                                "
                            >

                                {{
                                    $transaksi
                                        ->status_laundry
                                }}

                            </span>

                        </td>


                    </tr>


                @empty


                    <tr>

                        <td
                            colspan="9"
                            class="report-empty"
                        >

                            🧺 Tidak ada transaksi
                            pada periode laporan ini.

                        </td>

                    </tr>


                @endforelse


                </tbody>


            </table>


        </div>


    </div>



    <!-- =====================================================
         PELANGGAN + LAYANAN
    ====================================================== -->

    <div class="secondary-table-grid">


        <!-- PELANGGAN -->

        <div class="report-panel">


            <div class="report-panel-header">


                <div>

                    <h2>
                        👥 Data Pelanggan
                    </h2>

                    <p>
                        Daftar pelanggan yang terdaftar.
                    </p>

                </div>


            </div>



            <div class="report-table-wrapper">


                <table class="report-table">


                    <thead>

                        <tr>

                            <th>No</th>

                            <th>Nama</th>

                            <th>No. HP</th>

                            <th>Alamat</th>

                        </tr>

                    </thead>



                    <tbody>


                    @forelse(
                        $pelanggans
                        as $pelanggan
                    )


                        <tr>


                            <td>
                                {{ $loop->iteration }}
                            </td>


                            <td>

                                <strong>

                                    {{
                                        $pelanggan
                                            ->nama
                                    }}

                                </strong>

                            </td>


                            <td>

                                {{
                                    $pelanggan
                                        ->no_hp
                                    ?? '-'
                                }}

                            </td>


                            <td>

                                {{
                                    $pelanggan
                                        ->alamat
                                    ?? '-'
                                }}

                            </td>


                        </tr>


                    @empty


                        <tr>

                            <td
                                colspan="4"
                                class="report-empty"
                            >

                                Belum ada data pelanggan.

                            </td>

                        </tr>


                    @endforelse


                    </tbody>


                </table>


            </div>


        </div>



        <!-- LAYANAN -->

        <div class="report-panel">


            <div class="report-panel-header">


                <div>

                    <h2>
                        👕 Data Layanan
                    </h2>

                    <p>
                        Daftar layanan dan harga laundry.
                    </p>

                </div>


            </div>



            <div class="report-table-wrapper">


                <table class="report-table">


                    <thead>

                        <tr>

                            <th>No</th>

                            <th>Nama Layanan</th>

                            <th>Harga</th>

                            <th>Estimasi</th>

                        </tr>

                    </thead>



                    <tbody>


                    @forelse(
                        $layanans
                        as $layanan
                    )


                        <tr>


                            <td>
                                {{ $loop->iteration }}
                            </td>


                            <td>

                                <strong>

                                    {{
                                        $layanan
                                            ->nama_layanan
                                    }}

                                </strong>

                            </td>


                            <td>

                                <span class="report-money">

                                    Rp
                                    {{
                                        number_format(
                                            $layanan
                                                ->harga,
                                            0,
                                            ',',
                                            '.'
                                        )
                                    }}

                                </span>

                            </td>


                            <td>

                                {{
                                    $layanan
                                        ->estimasi
                                    ?? '-'
                                }}

                            </td>


                        </tr>


                    @empty


                        <tr>

                            <td
                                colspan="4"
                                class="report-empty"
                            >

                                Belum ada data layanan.

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



@push('scripts')

<script>

document.addEventListener(
    'DOMContentLoaded',
    function () {

        /*
        |--------------------------------------------------------------------------
        | DATA GRAFIK
        |--------------------------------------------------------------------------
        */

        const labels =
            @json($chartLabels);


        const values =
            @json($chartValues);


        const canvas =
            document.getElementById(
                'reportRevenueChart'
            );


        if (!canvas) {
            return;
        }


        const ctx =
            canvas.getContext(
                '2d'
            );


        /*
        |--------------------------------------------------------------------------
        | FORMAT RUPIAH
        |--------------------------------------------------------------------------
        */

        function formatRupiahShort(value)
        {
            value =
                Number(value);


            if (
                value >= 1000000
            ) {

                return (
                    'Rp' +
                    (
                        value /
                        1000000
                    )
                    .toFixed(1) +
                    'jt'
                );

            }


            if (
                value >= 1000
            ) {

                return (
                    'Rp' +
                    Math.round(
                        value /
                        1000
                    ) +
                    'k'
                );

            }


            return (
                'Rp' +
                value
            );
        }



        /*
        |--------------------------------------------------------------------------
        | DRAW
        |--------------------------------------------------------------------------
        */

        function drawChart()
        {
            const parent =
                canvas.parentElement;


            const width =
                parent.clientWidth;


            const height =
                parent.clientHeight;


            const ratio =
                window.devicePixelRatio
                || 1;


            canvas.width =
                width * ratio;


            canvas.height =
                height * ratio;


            canvas.style.width =
                width + 'px';


            canvas.style.height =
                height + 'px';


            ctx.setTransform(
                ratio,
                0,
                0,
                ratio,
                0,
                0
            );


            ctx.clearRect(
                0,
                0,
                width,
                height
            );


            /*
            |--------------------------------------------------------------------------
            | EMPTY DATA
            |--------------------------------------------------------------------------
            */

            if (
                values.length === 0
            ) {

                ctx.fillStyle =
                    '#94a3b8';


                ctx.font =
                    '12px Arial';


                ctx.textAlign =
                    'center';


                ctx.textBaseline =
                    'middle';


                ctx.fillText(
                    'Belum ada pendapatan lunas pada periode ini.',
                    width / 2,
                    height / 2
                );


                return;
            }


            const padding = {
                top: 20,
                right: 20,
                bottom: 45,
                left: 65
            };


            const chartWidth =
                width -
                padding.left -
                padding.right;


            const chartHeight =
                height -
                padding.top -
                padding.bottom;


            const numericValues =
                values.map(
                    function (value) {

                        return Number(value);

                    }
                );


            const maximumValue =
                Math.max(
                    ...numericValues,
                    10000
                );


            const roundedMaximum =
                Math.ceil(
                    maximumValue /
                    10000
                )
                * 10000;



            /*
            |--------------------------------------------------------------------------
            | GRID
            |--------------------------------------------------------------------------
            */

            ctx.font =
                '9px Arial';


            ctx.textAlign =
                'right';


            ctx.textBaseline =
                'middle';


            for (
                let i = 0;
                i <= 4;
                i++
            ) {

                const y =
                    padding.top +
                    (
                        chartHeight /
                        4
                    ) * i;


                ctx.beginPath();


                ctx.strokeStyle =
                    '#e2e8f0';


                ctx.lineWidth =
                    1;


                ctx.moveTo(
                    padding.left,
                    y
                );


                ctx.lineTo(
                    width -
                    padding.right,
                    y
                );


                ctx.stroke();


                const value =
                    roundedMaximum -
                    (
                        roundedMaximum /
                        4
                    ) * i;


                ctx.fillStyle =
                    '#94a3b8';


                ctx.fillText(
                    formatRupiahShort(
                        value
                    ),
                    padding.left - 10,
                    y
                );

            }



            /*
            |--------------------------------------------------------------------------
            | POINTS
            |--------------------------------------------------------------------------
            */

            const points = [];


            numericValues.forEach(
                function (
                    value,
                    index
                ) {

                    const x =
                        padding.left +
                        (
                            chartWidth /
                            Math.max(
                                numericValues.length - 1,
                                1
                            )
                        )
                        * index;


                    const y =
                        padding.top +
                        chartHeight -
                        (
                            value /
                            roundedMaximum
                        )
                        * chartHeight;


                    points.push({
                        x: x,
                        y: y
                    });

                }
            );



            /*
            |--------------------------------------------------------------------------
            | GRADIENT AREA
            |--------------------------------------------------------------------------
            */

            const gradient =
                ctx.createLinearGradient(
                    0,
                    padding.top,
                    0,
                    padding.top +
                    chartHeight
                );


            gradient.addColorStop(
                0,
                'rgba(37,99,235,.23)'
            );


            gradient.addColorStop(
                1,
                'rgba(37,99,235,.01)'
            );


            ctx.beginPath();


            ctx.moveTo(
                points[0].x,
                padding.top +
                chartHeight
            );


            points.forEach(
                function (
                    point,
                    index
                ) {

                    if (
                        index === 0
                    ) {

                        ctx.lineTo(
                            point.x,
                            point.y
                        );

                    } else {

                        const previous =
                            points[
                                index - 1
                            ];


                        const middle =
                            (
                                previous.x +
                                point.x
                            ) / 2;


                        ctx.bezierCurveTo(
                            middle,
                            previous.y,
                            middle,
                            point.y,
                            point.x,
                            point.y
                        );

                    }

                }
            );


            ctx.lineTo(
                points[
                    points.length - 1
                ].x,
                padding.top +
                chartHeight
            );


            ctx.closePath();


            ctx.fillStyle =
                gradient;


            ctx.fill();



            /*
            |--------------------------------------------------------------------------
            | LINE
            |--------------------------------------------------------------------------
            */

            ctx.beginPath();


            points.forEach(
                function (
                    point,
                    index
                ) {

                    if (
                        index === 0
                    ) {

                        ctx.moveTo(
                            point.x,
                            point.y
                        );

                    } else {

                        const previous =
                            points[
                                index - 1
                            ];


                        const middle =
                            (
                                previous.x +
                                point.x
                            ) / 2;


                        ctx.bezierCurveTo(
                            middle,
                            previous.y,
                            middle,
                            point.y,
                            point.x,
                            point.y
                        );

                    }

                }
            );


            ctx.strokeStyle =
                '#2563eb';


            ctx.lineWidth =
                3;


            ctx.lineCap =
                'round';


            ctx.lineJoin =
                'round';


            ctx.stroke();



            /*
            |--------------------------------------------------------------------------
            | DOTS
            |--------------------------------------------------------------------------
            */

            points.forEach(
                function (point) {

                    ctx.beginPath();


                    ctx.arc(
                        point.x,
                        point.y,
                        4,
                        0,
                        Math.PI * 2
                    );


                    ctx.fillStyle =
                        '#ffffff';


                    ctx.fill();


                    ctx.lineWidth =
                        3;


                    ctx.strokeStyle =
                        '#2563eb';


                    ctx.stroke();

                }
            );



            /*
            |--------------------------------------------------------------------------
            | DATE LABEL
            |--------------------------------------------------------------------------
            */

            ctx.font =
                '9px Arial';


            ctx.fillStyle =
                '#64748b';


            ctx.textAlign =
                'center';


            ctx.textBaseline =
                'top';


            labels.forEach(
                function (
                    label,
                    index
                ) {

                    const x =
                        padding.left +
                        (
                            chartWidth /
                            Math.max(
                                labels.length - 1,
                                1
                            )
                        )
                        * index;


                    ctx.fillText(
                        label,
                        x,
                        padding.top +
                        chartHeight +
                        14
                    );

                }
            );

        }


        drawChart();


        window.addEventListener(
            'resize',
            drawChart
        );

    }
);

</script>

@endpush