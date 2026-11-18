@extends('layouts.app')

@section('title', 'Dashboard - Tania Mutiara Laundry')


@push('styles')

<style>

    /* =========================================================
       DASHBOARD
    ========================================================= */

    .dashboard-premium {
        width: 100%;
    }


    /* =========================================================
       HERO
    ========================================================= */

    .dashboard-hero {
        position: relative;
        overflow: hidden;

        min-height: 270px;

        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 30px;

        padding: 38px;
        margin-bottom: 26px;

        border-radius: 24px;

        color: white;

        background:
            linear-gradient(
                135deg,
                #1e3a8a 0%,
                #2563eb 55%,
                #0ea5e9 100%
            );

        box-shadow:
            0 20px 45px
            rgba(37, 99, 235, .18);
    }


    .dashboard-hero::before {
        content: "";

        position: absolute;

        width: 320px;
        height: 320px;

        right: -100px;
        top: -150px;

        border-radius: 50%;

        background:
            rgba(255,255,255,.10);
    }


    .dashboard-hero::after {
        content: "";

        position: absolute;

        width: 230px;
        height: 230px;

        right: 170px;
        bottom: -170px;

        border-radius: 50%;

        background:
            rgba(255,255,255,.07);
    }


    .hero-content {
        position: relative;
        z-index: 2;

        max-width: 700px;
    }


    .hero-top {
        display: flex;
        align-items: center;

        gap: 10px;

        flex-wrap: wrap;

        margin-bottom: 18px;
    }


    .hero-badge,
    .hero-date {
        display: inline-flex;
        align-items: center;
        gap: 6px;

        padding: 8px 13px;

        border-radius: 30px;

        font-size: 11px;

        background:
            rgba(255,255,255,.13);

        border:
            1px solid
            rgba(255,255,255,.18);

        backdrop-filter: blur(10px);
    }


    .dashboard-hero h1 {
        margin: 0 0 12px;

        font-size:
            clamp(
                32px,
                4vw,
                52px
            );

        line-height: 1.05;

        letter-spacing: -1px;
    }


    .dashboard-hero h1 span {
        color: #bae6fd;
    }


    .hero-description {
        max-width: 620px;

        margin: 0;

        color:
            rgba(255,255,255,.84);

        font-size: 14px;

        line-height: 1.7;
    }


    .hero-quote {
        display: inline-block;

        margin-top: 20px;

        padding: 12px 15px;

        background:
            rgba(255,255,255,.10);

        border-left:
            3px solid #bae6fd;

        border-radius:
            0 12px 12px 0;

        color:
            rgba(255,255,255,.9);

        font-size: 12px;
    }


    .hero-decoration {
        position: relative;
        z-index: 2;

        width: 170px;
        height: 170px;

        flex-shrink: 0;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 42px;

        background:
            rgba(255,255,255,.13);

        border:
            1px solid
            rgba(255,255,255,.18);

        backdrop-filter: blur(15px);

        font-size: 78px;

        transform: rotate(4deg);
    }



    /* =========================================================
       SECTION HEADING
    ========================================================= */

    .section-heading {
        display: flex;
        justify-content: space-between;
        align-items: center;

        gap: 15px;

        margin:
            4px 0 15px;

        flex-wrap: wrap;
    }


    .section-heading h2 {
        margin: 0;

        color: #0f172a;

        font-size: 18px;
    }


    .section-heading p {
        margin: 5px 0 0;

        color: #64748b;

        font-size: 11px;
    }



    /* =========================================================
       STATISTIK UTAMA
    ========================================================= */

    .premium-stats-grid {
        display: grid;

        grid-template-columns:
            repeat(4, 1fr);

        gap: 16px;

        margin-bottom: 27px;
    }


    .premium-stat-card {
        position: relative;
        overflow: hidden;

        padding: 21px;

        background:
            rgba(255,255,255,.97);

        border:
            1px solid #e8eef7;

        border-radius: 18px;

        box-shadow:
            0 8px 25px
            rgba(15,23,42,.06);

        transition: .2s;
    }


    .premium-stat-card:hover {
        transform:
            translateY(-4px);

        box-shadow:
            0 16px 35px
            rgba(15,23,42,.10);
    }


    .premium-stat-card::after {
        content: "";

        position: absolute;

        width: 90px;
        height: 90px;

        right: -40px;
        bottom: -40px;

        border-radius: 50%;

        background:
            rgba(37,99,235,.05);
    }


    .premium-stat-head {
        display: flex;
        justify-content: space-between;
        align-items: center;

        margin-bottom: 15px;
    }


    .premium-stat-head small {
        color: #64748b;

        font-size: 10px;
        font-weight: 700;

        text-transform: uppercase;

        letter-spacing: .5px;
    }


    .premium-stat-icon {
        width: 43px;
        height: 43px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 13px;

        background:
            linear-gradient(
                135deg,
                #eff6ff,
                #dbeafe
            );

        font-size: 20px;
    }


    .premium-stat-card h2 {
        margin: 0 0 6px;

        color: #0f172a;

        font-size: 27px;
    }


    .premium-stat-card p {
        margin: 0;

        color: #94a3b8;

        font-size: 10px;
    }


    .stat-money h2 {
        color: #059669;

        font-size: 22px;
    }



    /* =========================================================
       ANALISIS HARI INI
    ========================================================= */

    .today-dashboard-grid {
        display: grid;

        grid-template-columns:
            minmax(0, 2fr)
            minmax(260px, .75fr);

        gap: 20px;

        margin-bottom: 27px;
    }


    /* =========================================================
       GRAFIK
    ========================================================= */

    .chart-panel {
        background: white;

        padding: 23px;

        border:
            1px solid #e8eef7;

        border-radius: 20px;

        box-shadow:
            0 8px 25px
            rgba(15,23,42,.06);
    }


    .chart-header {
        display: flex;
        justify-content: space-between;
        align-items: center;

        gap: 15px;

        margin-bottom: 20px;

        flex-wrap: wrap;
    }


    .chart-header h2 {
        margin: 0;

        color: #0f172a;

        font-size: 17px;
    }


    .chart-header p {
        margin: 5px 0 0;

        color: #94a3b8;

        font-size: 10px;
    }


    .chart-label {
        padding: 7px 11px;

        border-radius: 20px;

        background: #ecfdf5;

        color: #047857;

        font-size: 9px;

        font-weight: bold;
    }


    .chart-wrapper {
        position: relative;

        width: 100%;
        height: 270px;
    }


    #revenueChart {
        display: block;

        width: 100%;
        height: 100%;
    }



    /* =========================================================
       STATISTIK HARI INI
    ========================================================= */

    .today-summary {
        display: flex;

        flex-direction: column;

        gap: 15px;
    }


    .today-card {
        position: relative;
        overflow: hidden;

        flex: 1;

        min-height: 130px;

        padding: 21px;

        background: white;

        border:
            1px solid #e8eef7;

        border-radius: 18px;

        box-shadow:
            0 8px 25px
            rgba(15,23,42,.06);

        transition: .2s;
    }


    .today-card:hover {
        transform:
            translateY(-3px);
    }


    .today-card::after {
        content: "";

        position: absolute;

        width: 100px;
        height: 100px;

        right: -45px;
        bottom: -45px;

        border-radius: 50%;

        background:
            rgba(37,99,235,.06);
    }


    .today-card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;

        gap: 10px;
    }


    .today-card-label {
        color: #64748b;

        font-size: 9px;
        font-weight: 700;

        letter-spacing: .5px;

        text-transform: uppercase;
    }


    .today-icon {
        width: 40px;
        height: 40px;

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

        font-size: 18px;
    }


    .today-card h2 {
        margin:
            15px 0 5px;

        color: #0f172a;

        font-size: 28px;
    }


    .today-card p {
        margin: 0;

        color: #94a3b8;

        font-size: 9px;
    }


    .today-income {
        background:
            linear-gradient(
                135deg,
                #ffffff,
                #f0fdf4
            );
    }


    .today-income h2 {
        color: #059669;

        font-size: 22px;
    }


    .today-income .today-icon {
        background:
            linear-gradient(
                135deg,
                #dcfce7,
                #bbf7d0
            );
    }



    /* =========================================================
       STATUS LAUNDRY
    ========================================================= */

    .status-grid {
        display: grid;

        grid-template-columns:
            repeat(7, 1fr);

        gap: 10px;

        margin-bottom: 27px;
    }


    .status-mini-card {
        padding: 15px 10px;

        background: white;

        border:
            1px solid #e8eef7;

        border-radius: 14px;

        text-align: center;

        box-shadow:
            0 5px 18px
            rgba(15,23,42,.05);
    }


    .status-mini-card span {
        display: block;

        margin-bottom: 6px;

        font-size: 18px;
    }


    .status-mini-card strong {
        display: block;

        color: #0f172a;

        font-size: 19px;
    }


    .status-mini-card small {
        display: block;

        margin-top: 4px;

        color: #64748b;

        font-size: 8px;

        text-transform: uppercase;

        letter-spacing: .3px;
    }



    /* =========================================================
       MAIN GRID
    ========================================================= */

    .premium-dashboard-grid {
        display: grid;

        grid-template-columns:
            minmax(0, 2fr)
            minmax(280px, .8fr);

        gap: 20px;

        align-items: start;
    }


    .premium-panel {
        background: white;

        padding: 22px;

        border:
            1px solid #e8eef7;

        border-radius: 20px;

        box-shadow:
            0 8px 25px
            rgba(15,23,42,.06);
    }


    .premium-panel-header {
        display: flex;
        justify-content: space-between;
        align-items: center;

        gap: 15px;

        margin-bottom: 20px;

        flex-wrap: wrap;
    }


    .premium-panel-header h2 {
        margin: 0;

        color: #0f172a;

        font-size: 17px;
    }


    .panel-description {
        margin-top: 5px;

        color: #94a3b8;

        font-size: 10px;
    }



    /* =========================================================
       BUTTON
    ========================================================= */

    .dashboard-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        gap: 5px;

        padding: 9px 13px;

        border-radius: 9px;

        text-decoration: none;

        font-size: 10px;
        font-weight: 600;

        transition: .2s;
    }


    .dashboard-btn-primary {
        background: #2563eb;

        color: white;
    }


    .dashboard-btn-primary:hover {
        background: #1d4ed8;

        transform:
            translateY(-1px);
    }



    /* =========================================================
       TABLE
    ========================================================= */

    .premium-table-responsive {
        width: 100%;

        overflow-x: auto;
    }


    .premium-table {
        width: 100%;

        min-width: 680px;

        border-collapse: collapse;
    }


    .premium-table th {
        padding: 11px 10px;

        background: #f8fafc;

        border-bottom:
            1px solid #e2e8f0;

        color: #64748b;

        text-align: left;

        font-size: 9px;

        text-transform: uppercase;

        letter-spacing: .4px;
    }


    .premium-table td {
        padding: 14px 10px;

        border-bottom:
            1px solid #f1f5f9;

        color: #334155;

        font-size: 11px;
    }


    .premium-table tbody tr:hover {
        background: #f8fafc;
    }


    .transaction-code {
        color: #2563eb;

        font-weight: 700;
    }


    .transaction-total {
        color: #0f172a;

        font-weight: 700;
    }



    /* =========================================================
       BADGE
    ========================================================= */

    .premium-badge {
        display: inline-flex;
        align-items: center;

        padding: 5px 9px;

        border-radius: 20px;

        font-size: 8px;

        font-weight: 700;
    }


    .premium-badge-green {
        background: #dcfce7;

        color: #166534;
    }


    .premium-badge-blue {
        background: #dbeafe;

        color: #1d4ed8;
    }



    /* =========================================================
       QUICK MENU
    ========================================================= */

    .quick-action-list {
        display: flex;

        flex-direction: column;

        gap: 10px;
    }


    .premium-quick-action {
        display: flex;
        align-items: center;

        gap: 12px;

        padding: 13px;

        background: #f8fafc;

        border:
            1px solid #edf2f7;

        border-radius: 13px;

        color: #0f172a;

        text-decoration: none;

        transition: .2s;
    }


    .premium-quick-action:hover {
        background: #eff6ff;

        border-color: #bfdbfe;

        transform:
            translateX(3px);
    }


    .premium-quick-icon {
        width: 40px;
        height: 40px;

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

        font-size: 18px;
    }


    .premium-quick-action strong {
        display: block;

        margin-bottom: 3px;

        font-size: 11px;
    }


    .premium-quick-action small {
        color: #94a3b8;

        font-size: 8px;
    }



    /* =========================================================
       PAYMENT WARNING
    ========================================================= */

    .payment-warning {
        position: relative;
        overflow: hidden;

        margin-top: 16px;

        padding: 18px;

        background:
            linear-gradient(
                135deg,
                #fff1f2,
                #fff7ed
            );

        border:
            1px solid #fecdd3;

        border-radius: 15px;
    }


    .payment-warning::after {
        content: "💳";

        position: absolute;

        right: 15px;
        top: 13px;

        font-size: 40px;

        opacity: .12;
    }


    .payment-warning small {
        color: #9f1239;

        font-size: 9px;

        font-weight: 700;
    }


    .payment-warning h2 {
        margin: 7px 0 4px;

        color: #e11d48;

        font-size: 27px;
    }


    .payment-warning p {
        margin: 0;

        color: #9f1239;

        font-size: 8px;

        opacity: .75;
    }



    /* =========================================================
       EMPTY
    ========================================================= */

    .empty-dashboard {
        padding: 35px !important;

        text-align: center !important;

        color: #94a3b8 !important;
    }



    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media(max-width: 1200px) {

        .premium-stats-grid {
            grid-template-columns:
                repeat(2, 1fr);
        }


        .status-grid {
            grid-template-columns:
                repeat(4, 1fr);
        }


        .premium-dashboard-grid {
            grid-template-columns:
                1fr;
        }

    }


    @media(max-width: 1000px) {

        .today-dashboard-grid {
            grid-template-columns:
                1fr;
        }


        .today-summary {
            display: grid;

            grid-template-columns:
                repeat(2, 1fr);
        }

    }


    @media(max-width: 760px) {

        .dashboard-hero {
            min-height: auto;

            padding: 25px;
        }


        .hero-decoration {
            display: none;
        }


        .premium-stats-grid {
            grid-template-columns:
                1fr;
        }


        .today-summary {
            grid-template-columns:
                1fr;
        }


        .status-grid {
            grid-template-columns:
                repeat(2, 1fr);
        }


        .dashboard-hero h1 {
            font-size: 34px;
        }


        .chart-wrapper {
            height: 220px;
        }

    }

</style>

@endpush



@section('content')


<div class="dashboard-premium">


    <!-- =====================================================
         HERO
    ====================================================== -->

    <section class="dashboard-hero">


        <div class="hero-content">


            <div class="hero-top">


                <div class="hero-badge">

                    ✨ Selamat Datang,
                    {{ auth()->user()->name ?? 'Administrator' }}

                </div>


                <div class="hero-date">

                    📅
                    {{
                        now()->translatedFormat(
                            'd F Y'
                        )
                    }}

                </div>


            </div>



            <h1>

                Tania Mutiara

                <span>
                    Laundry
                </span>

            </h1>



            <p class="hero-description">

                Kelola seluruh aktivitas laundry mulai dari pelanggan,
                transaksi, pembayaran, layanan hingga proses pengerjaan
                dalam satu sistem yang lebih cepat, modern dan terorganisir.

            </p>



            <div class="hero-quote">

                “Bersih, Wangi, Rapi —
                Karena Setiap Pakaian Layak Mendapatkan
                Perawatan Terbaik.”

            </div>


        </div>



        <div class="hero-decoration">

            🧺

        </div>


    </section>



    <!-- =====================================================
         RINGKASAN OPERASIONAL
    ====================================================== -->

    <div class="section-heading">

        <div>

            <h2>
                📊 Ringkasan Operasional
            </h2>

            <p>
                Informasi utama operasional Tania Mutiara Laundry.
            </p>

        </div>

    </div>



    <div class="premium-stats-grid">


        <!-- TOTAL PELANGGAN -->

        <div class="premium-stat-card">

            <div class="premium-stat-head">

                <small>
                    Total Pelanggan
                </small>

                <div class="premium-stat-icon">
                    👥
                </div>

            </div>

            <h2>
                {{ $totalPelanggan }}
            </h2>

            <p>
                Pelanggan yang telah terdaftar
            </p>

        </div>



        <!-- PESANAN AKTIF -->

        <div class="premium-stat-card">

            <div class="premium-stat-head">

                <small>
                    Pesanan Aktif
                </small>

                <div class="premium-stat-icon">
                    🫧
                </div>

            </div>

            <h2>
                {{ $pesananMasuk }}
            </h2>

            <p>
                Laundry yang sedang diproses
            </p>

        </div>



        <!-- LAUNDRY SELESAI -->

        <div class="premium-stat-card">

            <div class="premium-stat-head">

                <small>
                    Laundry Selesai
                </small>

                <div class="premium-stat-icon">
                    ✅
                </div>

            </div>

            <h2>
                {{ $laundrySelesai }}
            </h2>

            <p>
                Pesanan yang telah selesai
            </p>

        </div>



        <!-- TOTAL PENDAPATAN -->

        <div class="premium-stat-card stat-money">

            <div class="premium-stat-head">

                <small>
                    Total Pendapatan
                </small>

                <div class="premium-stat-icon">
                    💰
                </div>

            </div>

            <h2>

                Rp
                {{
                    number_format(
                        $pendapatan,
                        0,
                        ',',
                        '.'
                    )
                }}

            </h2>

            <p>
                Pendapatan transaksi yang sudah lunas
            </p>

        </div>


    </div>



    <!-- =====================================================
         ANALISIS PENDAPATAN
    ====================================================== -->

    <div class="section-heading">

        <div>

            <h2>
                📈 Analisis Pendapatan
            </h2>

            <p>
                Pergerakan pendapatan dan aktivitas laundry hari ini.
            </p>

        </div>

    </div>



    <div class="today-dashboard-grid">


        <!-- GRAFIK -->

        <div class="chart-panel">


            <div class="chart-header">


                <div>

                    <h2>
                        📈 Pendapatan 7 Hari Terakhir
                    </h2>

                    <p>
                        Berdasarkan transaksi dengan status pembayaran Lunas.
                    </p>

                </div>


                <div class="chart-label">

                    ● 7 Hari

                </div>


            </div>


            <div class="chart-wrapper">

                <canvas id="revenueChart"></canvas>

            </div>


        </div>



        <!-- STATISTIK HARI INI -->

        <div class="today-summary">


            <div class="today-card">


                <div class="today-card-header">

                    <span class="today-card-label">
                        Transaksi Hari Ini
                    </span>

                    <div class="today-icon">
                        🧾
                    </div>

                </div>


                <h2>
                    {{ $transaksiHariIni }}
                </h2>


                <p>
                    Pesanan laundry yang masuk hari ini.
                </p>


            </div>



            <div class="today-card today-income">


                <div class="today-card-header">

                    <span class="today-card-label">
                        Pendapatan Hari Ini
                    </span>

                    <div class="today-icon">
                        💵
                    </div>

                </div>


                <h2>

                    Rp
                    {{
                        number_format(
                            $pendapatanHariIni,
                            0,
                            ',',
                            '.'
                        )
                    }}

                </h2>


                <p>
                    Total transaksi lunas yang masuk hari ini.
                </p>


            </div>


        </div>


    </div>



    <!-- =====================================================
         STATUS LAUNDRY
    ====================================================== -->

    <div class="section-heading">

        <div>

            <h2>
                🫧 Monitoring Status Laundry
            </h2>

            <p>
                Ringkasan jumlah transaksi berdasarkan proses pengerjaan.
            </p>

        </div>

    </div>



    <div class="status-grid">


        <div class="status-mini-card">

            <span>📥</span>

            <strong>
                {{ $statusDiterima }}
            </strong>

            <small>
                Diterima
            </small>

        </div>


        <div class="status-mini-card">

            <span>🫧</span>

            <strong>
                {{ $statusDicuci }}
            </strong>

            <small>
                Dicuci
            </small>

        </div>


        <div class="status-mini-card">

            <span>💨</span>

            <strong>
                {{ $statusDikeringkan }}
            </strong>

            <small>
                Dikeringkan
            </small>

        </div>


        <div class="status-mini-card">

            <span>👔</span>

            <strong>
                {{ $statusDisetrika }}
            </strong>

            <small>
                Disetrika
            </small>

        </div>


        <div class="status-mini-card">

            <span>✅</span>

            <strong>
                {{ $statusSelesai }}
            </strong>

            <small>
                Selesai
            </small>

        </div>


        <div class="status-mini-card">

            <span>🤝</span>

            <strong>
                {{ $statusDiambil }}
            </strong>

            <small>
                Diambil
            </small>

        </div>


        <div class="status-mini-card">

            <span>🚚</span>

            <strong>
                {{ $statusDikirim }}
            </strong>

            <small>
                Dikirim
            </small>

        </div>


    </div>



    <!-- =====================================================
         TRANSAKSI + MENU CEPAT
    ====================================================== -->

    <div class="premium-dashboard-grid">


        <!-- TRANSAKSI TERBARU -->

        <div class="premium-panel">


            <div class="premium-panel-header">


                <div>

                    <h2>
                        🧾 Transaksi Terbaru
                    </h2>

                    <div class="panel-description">

                        Aktivitas transaksi terbaru
                        Tania Mutiara Laundry.

                    </div>

                </div>


                <a
                    href="{{ route('transaksi.index') }}"
                    class="dashboard-btn dashboard-btn-primary"
                >
                    Lihat Semua →
                </a>


            </div>



            <div class="premium-table-responsive">


                <table class="premium-table">


                    <thead>

                        <tr>

                            <th>
                                Kode
                            </th>

                            <th>
                                Pelanggan
                            </th>

                            <th>
                                Layanan
                            </th>

                            <th>
                                Total
                            </th>

                            <th>
                                Status
                            </th>

                        </tr>

                    </thead>



                    <tbody>


                    @forelse(
                        $transaksiTerbaru
                        as $transaksi
                    )


                        <tr>


                            <td>

                                <span class="transaction-code">

                                    {{
                                        $transaksi
                                            ->kode_transaksi
                                    }}

                                </span>

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

                                <span class="transaction-total">

                                    Rp
                                    {{
                                        number_format(
                                            $transaksi->total,
                                            0,
                                            ',',
                                            '.'
                                        )
                                    }}

                                </span>

                            </td>



                            <td>


                                @if(
                                    in_array(
                                        $transaksi->status_laundry,
                                        [
                                            'Selesai',
                                            'Diambil',
                                            'Dikirim'
                                        ]
                                    )
                                )


                                    <span
                                        class="
                                            premium-badge
                                            premium-badge-green
                                        "
                                    >

                                        {{
                                            $transaksi
                                                ->status_laundry
                                        }}

                                    </span>


                                @else


                                    <span
                                        class="
                                            premium-badge
                                            premium-badge-blue
                                        "
                                    >

                                        {{
                                            $transaksi
                                                ->status_laundry
                                        }}

                                    </span>


                                @endif


                            </td>


                        </tr>


                    @empty


                        <tr>

                            <td
                                colspan="5"
                                class="empty-dashboard"
                            >

                                🧺 Belum ada transaksi laundry.

                            </td>

                        </tr>


                    @endforelse


                    </tbody>


                </table>


            </div>


        </div>



        <!-- =================================================
             MENU CEPAT
        ================================================== -->

        <div class="premium-panel">


            <div class="premium-panel-header">

                <div>

                    <h2>
                        ⚡ Menu Cepat
                    </h2>

                    <div class="panel-description">
                        Akses fitur utama dengan cepat.
                    </div>

                </div>

            </div>



            <div class="quick-action-list">


                <a
                    href="{{ route('transaksi.index') }}"
                    class="premium-quick-action"
                >

                    <div class="premium-quick-icon">
                        ➕
                    </div>

                    <div>

                        <strong>
                            Transaksi Baru
                        </strong>

                        <small>
                            Tambahkan pesanan laundry
                        </small>

                    </div>

                </a>



                <a
                    href="{{ route('pelanggan.index') }}"
                    class="premium-quick-action"
                >

                    <div class="premium-quick-icon">
                        👤
                    </div>

                    <div>

                        <strong>
                            Data Pelanggan
                        </strong>

                        <small>
                            Tambah dan kelola pelanggan
                        </small>

                    </div>

                </a>



                <a
                    href="{{ route('status.index') }}"
                    class="premium-quick-action"
                >

                    <div class="premium-quick-icon">
                        🔄
                    </div>

                    <div>

                        <strong>
                            Status Laundry
                        </strong>

                        <small>
                            Pantau proses pengerjaan
                        </small>

                    </div>

                </a>



                <a
                    href="{{ route('laporan.index') }}"
                    class="premium-quick-action"
                >

                    <div class="premium-quick-icon">
                        📊
                    </div>

                    <div>

                        <strong>
                            Laporan
                        </strong>

                        <small>
                            Lihat laporan operasional
                        </small>

                    </div>

                </a>


            </div>



            <!-- BELUM LUNAS -->

            <div class="payment-warning">

                <small>
                    💳 PEMBAYARAN BELUM LUNAS
                </small>

                <h2>
                    {{ $belumLunas }}
                </h2>

                <p>
                    Transaksi masih menunggu pembayaran.
                </p>

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

        const canvas =
            document.getElementById(
                'revenueChart'
            );


        if (!canvas) {
            return;
        }


        const labels =
            @json($grafikTanggal);


        const values =
            @json($grafikPendapatan);


        const ctx =
            canvas.getContext('2d');


        function formatRupiahShort(value)
        {
            value = Number(value);


            if (value >= 1000000) {

                return (
                    'Rp' +
                    (
                        value / 1000000
                    ).toFixed(1) +
                    'jt'
                );

            }


            if (value >= 1000) {

                return (
                    'Rp' +
                    Math.round(
                        value / 1000
                    ) +
                    'k'
                );

            }


            return (
                'Rp' +
                value
            );
        }


        function drawChart()
        {
            const parent =
                canvas.parentElement;


            const width =
                parent.clientWidth;


            const height =
                parent.clientHeight;


            const ratio =
                window.devicePixelRatio || 1;


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
                ) * 10000;


            /*
            |--------------------------------------------------------------------------
            | GRID + ANGKA Y
            |--------------------------------------------------------------------------
            */

            ctx.font =
                '10px Arial';


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
                        chartHeight / 4
                    ) * i;


                ctx.beginPath();


                ctx.strokeStyle =
                    '#e2e8f0';


                ctx.lineWidth = 1;


                ctx.moveTo(
                    padding.left,
                    y
                );


                ctx.lineTo(
                    width - padding.right,
                    y
                );


                ctx.stroke();


                const value =
                    roundedMaximum -
                    (
                        roundedMaximum / 4
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
            | TITIK DATA
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
                        ) * index;


                    const y =
                        padding.top +
                        chartHeight -
                        (
                            value /
                            roundedMaximum
                        ) *
                        chartHeight;


                    points.push({
                        x: x,
                        y: y,
                        value: value
                    });

                }
            );


            /*
            |--------------------------------------------------------------------------
            | AREA GRADIENT
            |--------------------------------------------------------------------------
            */

            if (points.length > 0) {

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
                    'rgba(37,99,235,.25)'
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

                        if (index === 0) {

                            ctx.lineTo(
                                point.x,
                                point.y
                            );

                        } else {

                            const previous =
                                points[index - 1];


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

            }


            /*
            |--------------------------------------------------------------------------
            | GARIS GRAFIK
            |--------------------------------------------------------------------------
            */

            if (points.length > 0) {

                ctx.beginPath();


                points.forEach(
                    function (
                        point,
                        index
                    ) {

                        if (index === 0) {

                            ctx.moveTo(
                                point.x,
                                point.y
                            );

                        } else {

                            const previous =
                                points[index - 1];


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


                ctx.lineWidth = 3;


                ctx.lineCap =
                    'round';


                ctx.lineJoin =
                    'round';


                ctx.stroke();

            }


            /*
            |--------------------------------------------------------------------------
            | BULATAN TITIK
            |--------------------------------------------------------------------------
            */

            points.forEach(
                function (point) {

                    ctx.beginPath();


                    ctx.arc(
                        point.x,
                        point.y,
                        5,
                        0,
                        Math.PI * 2
                    );


                    ctx.fillStyle =
                        '#ffffff';


                    ctx.fill();


                    ctx.lineWidth = 3;


                    ctx.strokeStyle =
                        '#2563eb';


                    ctx.stroke();

                }
            );


            /*
            |--------------------------------------------------------------------------
            | LABEL TANGGAL
            |--------------------------------------------------------------------------
            */

            ctx.font =
                '10px Arial';


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
                        ) * index;


                    ctx.fillText(
                        label,
                        x,
                        padding.top +
                        chartHeight +
                        15
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