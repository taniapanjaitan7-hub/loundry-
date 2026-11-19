@extends('layouts.app')

@section('title', 'Dashboard - Tania Mutiara Laundry')


@push('styles')

<style>

    /* =========================================================
       DASHBOARD PREMIUM
    ========================================================= */

    .dashboard-premium {
        position: relative;

        width: 100%;

        min-height:
            calc(100vh - 120px);

        padding: 20px;

        overflow: hidden;

        border-radius: 28px;

        background:
            linear-gradient(
                rgba(244,247,251,.84),
                rgba(244,247,251,.94)
            ),
            url("{{ asset('images/laundry-bg.png') }}");

        background-size: cover;

        background-position: center;

        background-repeat: no-repeat;

        background-attachment: fixed;
    }


    /* =========================================================
       HERO
    ========================================================= */

    .dashboard-hero {
        position: relative;

        overflow: hidden;

        min-height: 340px;

        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 35px;

        padding: 48px;

        margin-bottom: 32px;

        border-radius: 30px;

        color: white;

        background:
            linear-gradient(
                105deg,
                rgba(7,30,75,.96) 0%,
                rgba(29,78,216,.88) 50%,
                rgba(14,165,233,.60) 100%
            ),
            url("{{ asset('images/laundry-bg.png') }}");

        background-size: cover;

        background-position: center;

        border:
            1px solid
            rgba(255,255,255,.18);

        box-shadow:
            0 25px 60px
            rgba(15,23,42,.25);
    }


    .dashboard-hero::before {
        content: "";

        position: absolute;

        inset: 0;

        background:
            radial-gradient(
                circle at 82% 28%,
                rgba(255,255,255,.16),
                transparent 26%
            );

        pointer-events: none;
    }


    .dashboard-hero::after {
        content: "";

        position: absolute;

        width: 360px;

        height: 360px;

        right: -170px;

        top: -190px;

        border-radius: 50%;

        background:
            rgba(255,255,255,.08);
    }


    .dashboard-hero-content {
        position: relative;

        z-index: 3;

        max-width: 760px;
    }


    .dashboard-hero-top {
        display: flex;

        align-items: center;

        gap: 10px;

        flex-wrap: wrap;

        margin-bottom: 22px;
    }


    .dashboard-hero-badge,
    .dashboard-hero-date {
        display: inline-flex;

        align-items: center;

        gap: 7px;

        padding:
            10px 15px;

        border:
            1px solid
            rgba(255,255,255,.22);

        border-radius: 30px;

        background:
            rgba(255,255,255,.14);

        backdrop-filter:
            blur(12px);

        color: white;

        font-size: 12px;

        font-weight: 700;

        box-shadow:
            inset 0 1px 0
            rgba(255,255,255,.10);
    }


    .dashboard-hero h1 {
        margin:
            0 0 18px;

        max-width: 760px;

        color: white;

        font-size:
            clamp(
                44px,
                5vw,
                66px
            );

        font-weight: 900;

        line-height: 1.02;

        letter-spacing: -2px;

        text-shadow:
            0 7px 25px
            rgba(0,0,0,.24);
    }


    .dashboard-hero h1 span {
        color: #d7f3ff;

        text-shadow:
            0 0 30px
            rgba(186,230,253,.22);
    }


    .dashboard-hero-description {
        max-width: 690px;

        margin: 0;

        color:
            rgba(255,255,255,.92);

        font-size: 15px;

        font-weight: 500;

        line-height: 1.8;

        text-shadow:
            0 2px 10px
            rgba(0,0,0,.15);
    }


    .dashboard-hero-quote {
        display: inline-block;

        margin-top: 24px;

        padding:
            15px 19px;

        border-left:
            4px solid #bae6fd;

        border-radius:
            0 15px 15px 0;

        background:
            rgba(255,255,255,.13);

        backdrop-filter:
            blur(10px);

        color: white;

        font-size: 13px;

        font-weight: 600;

        line-height: 1.7;

        box-shadow:
            0 10px 25px
            rgba(0,0,0,.08);
    }


    /* =========================================================
       HERO VISUAL
    ========================================================= */

    .dashboard-laundry-visual {
        position: relative;

        z-index: 3;

        width: 210px;

        height: 210px;

        flex-shrink: 0;

        display: flex;

        align-items: center;

        justify-content: center;

        border:
            1px solid
            rgba(255,255,255,.28);

        border-radius: 52px;

        background:
            linear-gradient(
                145deg,
                rgba(255,255,255,.22),
                rgba(255,255,255,.09)
            );

        backdrop-filter:
            blur(20px);

        box-shadow:
            0 28px 50px
            rgba(0,0,0,.18);

        transform:
            rotate(3deg);

        transition:
            transform .3s ease;
    }


    .dashboard-laundry-visual:hover {
        transform:
            rotate(0deg)
            scale(1.04);
    }


    .dashboard-laundry-visual span {
        font-size: 96px;

        filter:
            drop-shadow(
                0 12px 15px
                rgba(0,0,0,.18)
            );
    }


    .dashboard-laundry-visual small {
        position: absolute;

        left: 50%;

        bottom: 18px;

        transform:
            translateX(-50%);

        width: 100%;

        color:
            rgba(255,255,255,.82);

        text-align: center;

        font-size: 10px;

        font-weight: 800;

        letter-spacing: 1.2px;

        text-transform: uppercase;
    }


    /* =========================================================
       SECTION HEADING
    ========================================================= */

    .dashboard-section-heading {
        display: flex;

        justify-content: space-between;

        align-items: center;

        gap: 15px;

        margin:
            8px 0 18px;

        flex-wrap: wrap;
    }


    .dashboard-section-heading h2 {
        margin: 0;

        color: #0f172a;

        font-size: 21px;

        font-weight: 900;

        letter-spacing: -.4px;
    }


    .dashboard-section-heading p {
        margin:
            6px 0 0;

        color: #64748b;

        font-size: 12px;

        line-height: 1.5;
    }


    /* =========================================================
       STATISTIK
    ========================================================= */

    .dashboard-stats-grid {
        display: grid;

        grid-template-columns:
            repeat(4, 1fr);

        gap: 17px;

        margin-bottom: 30px;
    }


    .dashboard-stat-card {
        position: relative;

        overflow: hidden;

        padding: 24px;

        border:
            1px solid
            rgba(255,255,255,.85);

        border-radius: 22px;

        background:
            linear-gradient(
                145deg,
                rgba(255,255,255,.98),
                rgba(248,250,252,.94)
            );

        box-shadow:
            0 12px 32px
            rgba(15,23,42,.08);

        backdrop-filter:
            blur(10px);

        transition:
            transform .25s,
            box-shadow .25s;
    }


    .dashboard-stat-card:hover {
        transform:
            translateY(-6px);

        box-shadow:
            0 22px 45px
            rgba(15,23,42,.13);
    }


    .dashboard-stat-card::after {
        content: "";

        position: absolute;

        width: 110px;

        height: 110px;

        right: -50px;

        bottom: -50px;

        border-radius: 50%;

        background:
            rgba(37,99,235,.06);
    }


    .dashboard-stat-head {
        display: flex;

        justify-content: space-between;

        align-items: center;

        margin-bottom: 16px;
    }


    .dashboard-stat-head small {
        color: #64748b;

        font-size: 10px;

        font-weight: 800;

        letter-spacing: .5px;

        text-transform: uppercase;
    }


    .dashboard-stat-icon {
        width: 49px;

        height: 49px;

        display: flex;

        align-items: center;

        justify-content: center;

        border-radius: 15px;

        background:
            linear-gradient(
                135deg,
                #eff6ff,
                #dbeafe
            );

        font-size: 23px;

        box-shadow:
            0 7px 18px
            rgba(37,99,235,.11);
    }


    .dashboard-stat-card h2 {
        position: relative;

        z-index: 2;

        margin:
            0 0 8px;

        color: #0f172a;

        font-size: 34px;

        font-weight: 900;
    }


    .dashboard-stat-card p {
        position: relative;

        z-index: 2;

        margin: 0;

        color: #94a3b8;

        font-size: 11px;

        line-height: 1.55;
    }


    .dashboard-stat-money h2 {
        color: #059669;

        font-size: 26px;
    }


    /* =========================================================
       ANALYSIS GRID
    ========================================================= */

    .dashboard-analysis-grid {
        display: grid;

        grid-template-columns:
            minmax(0, 2fr)
            minmax(280px, .78fr);

        gap: 21px;

        margin-bottom: 30px;
    }


    /* =========================================================
       PANEL
    ========================================================= */

    .dashboard-panel {
        padding: 25px;

        border:
            1px solid
            rgba(226,232,240,.96);

        border-radius: 23px;

        background:
            rgba(255,255,255,.96);

        box-shadow:
            0 12px 35px
            rgba(15,23,42,.08);

        backdrop-filter:
            blur(10px);
    }


    .dashboard-panel-header {
        display: flex;

        justify-content: space-between;

        align-items: center;

        gap: 15px;

        margin-bottom: 21px;

        flex-wrap: wrap;
    }


    .dashboard-panel-header h2 {
        margin: 0;

        color: #0f172a;

        font-size: 19px;

        font-weight: 900;
    }


    .dashboard-panel-header p {
        margin:
            6px 0 0;

        color: #94a3b8;

        font-size: 11px;
    }


    .dashboard-chart-label {
        padding:
            7px 11px;

        border-radius: 20px;

        background: #ecfdf5;

        color: #047857;

        font-size: 9px;

        font-weight: 800;
    }


    /* =========================================================
       CHART
    ========================================================= */

    .dashboard-chart-wrapper {
        position: relative;

        width: 100%;

        height: 285px;
    }


    #revenueChart {
        display: block;

        width: 100%;

        height: 100%;
    }


    /* =========================================================
       TODAY
    ========================================================= */

    .dashboard-today {
        display: flex;

        flex-direction: column;

        gap: 16px;
    }


    .dashboard-today-card {
        position: relative;

        overflow: hidden;

        flex: 1;

        min-height: 145px;

        padding: 23px;

        border:
            1px solid
            #e8eef7;

        border-radius: 21px;

        background:
            rgba(255,255,255,.97);

        box-shadow:
            0 10px 28px
            rgba(15,23,42,.07);

        transition: .25s;
    }


    .dashboard-today-card:hover {
        transform:
            translateY(-5px);

        box-shadow:
            0 18px 35px
            rgba(15,23,42,.11);
    }


    .dashboard-today-card::after {
        content: "";

        position: absolute;

        width: 110px;

        height: 110px;

        right: -50px;

        bottom: -50px;

        border-radius: 50%;

        background:
            rgba(37,99,235,.06);
    }


    .dashboard-today-head {
        display: flex;

        justify-content: space-between;

        align-items: center;
    }


    .dashboard-today-label {
        color: #64748b;

        font-size: 10px;

        font-weight: 800;

        letter-spacing: .5px;

        text-transform: uppercase;
    }


    .dashboard-today-icon {
        width: 46px;

        height: 46px;

        display: flex;

        align-items: center;

        justify-content: center;

        border-radius: 14px;

        background:
            linear-gradient(
                135deg,
                #eff6ff,
                #dbeafe
            );

        font-size: 21px;
    }


    .dashboard-today-card h2 {
        margin:
            16px 0 6px;

        color: #0f172a;

        font-size: 33px;

        font-weight: 900;
    }


    .dashboard-today-card p {
        margin: 0;

        color: #94a3b8;

        font-size: 10px;

        line-height: 1.5;
    }


    .dashboard-today-income {
        background:
            linear-gradient(
                135deg,
                rgba(255,255,255,.97),
                rgba(240,253,244,.97)
            );
    }


    .dashboard-today-income h2 {
        color: #059669;

        font-size: 26px;
    }


    /* =========================================================
       STATUS
    ========================================================= */

    .dashboard-status-grid {
        display: grid;

        grid-template-columns:
            repeat(7, 1fr);

        gap: 11px;

        margin-bottom: 30px;
    }


    .dashboard-status-card {
        padding:
            19px 10px;

        border:
            1px solid
            rgba(226,232,240,.96);

        border-radius: 17px;

        background:
            rgba(255,255,255,.95);

        box-shadow:
            0 7px 20px
            rgba(15,23,42,.06);

        backdrop-filter:
            blur(8px);

        text-align: center;

        transition:
            transform .25s,
            box-shadow .25s;
    }


    .dashboard-status-card:hover {
        transform:
            translateY(-5px);

        box-shadow:
            0 15px 30px
            rgba(15,23,42,.11);
    }


    .dashboard-status-card span {
        display: block;

        margin-bottom: 7px;

        font-size: 23px;
    }


    .dashboard-status-card strong {
        display: block;

        color: #0f172a;

        font-size: 24px;

        font-weight: 900;
    }


    .dashboard-status-card small {
        display: block;

        margin-top: 5px;

        color: #64748b;

        font-size: 8px;

        font-weight: 700;

        text-transform: uppercase;
    }


    /* =========================================================
       BOTTOM GRID
    ========================================================= */

    .dashboard-bottom-grid {
        display: grid;

        grid-template-columns:
            minmax(0, 2fr)
            minmax(290px, .85fr);

        gap: 21px;

        align-items: start;
    }


    /* =========================================================
       TABLE
    ========================================================= */

    .dashboard-table-responsive {
        width: 100%;

        overflow-x: auto;
    }


    .dashboard-table {
        width: 100%;

        min-width: 700px;

        border-collapse: collapse;
    }


    .dashboard-table th {
        padding:
            13px 11px;

        border-bottom:
            1px solid #e2e8f0;

        background: #f8fafc;

        color: #64748b;

        text-align: left;

        font-size: 9px;

        font-weight: 800;

        text-transform: uppercase;

        letter-spacing: .5px;
    }


    .dashboard-table td {
        padding:
            15px 11px;

        border-bottom:
            1px solid #f1f5f9;

        color: #334155;

        font-size: 11px;
    }


    .dashboard-table tbody tr {
        transition: .2s;
    }


    .dashboard-table tbody tr:hover {
        background: #f8fafc;
    }


    .dashboard-transaction-code {
        color: #2563eb;

        font-weight: 800;
    }


    .dashboard-total {
        color: #0f172a;

        font-weight: 800;
    }


    /* =========================================================
       BADGE
    ========================================================= */

    .dashboard-badge {
        display: inline-flex;

        align-items: center;

        padding:
            6px 9px;

        border-radius: 20px;

        font-size: 8px;

        font-weight: 800;
    }


    .dashboard-badge-green {
        background: #dcfce7;

        color: #166534;
    }


    .dashboard-badge-blue {
        background: #dbeafe;

        color: #1d4ed8;
    }


    /* =========================================================
       BUTTON
    ========================================================= */

    .dashboard-btn {
        display: inline-flex;

        align-items: center;

        justify-content: center;

        gap: 5px;

        padding:
            10px 14px;

        border-radius: 10px;

        background:
            linear-gradient(
                135deg,
                #2563eb,
                #1d4ed8
            );

        color: white;

        text-decoration: none;

        font-size: 10px;

        font-weight: 800;

        box-shadow:
            0 7px 15px
            rgba(37,99,235,.16);

        transition: .2s;
    }


    .dashboard-btn:hover {
        transform:
            translateY(-2px);

        box-shadow:
            0 10px 20px
            rgba(37,99,235,.22);
    }


    /* =========================================================
       QUICK MENU
    ========================================================= */

    .dashboard-quick-list {
        display: flex;

        flex-direction: column;

        gap: 10px;
    }


    .dashboard-quick-action {
        display: flex;

        align-items: center;

        gap: 12px;

        padding: 14px;

        border:
            1px solid #edf2f7;

        border-radius: 14px;

        background:
            linear-gradient(
                135deg,
                #f8fafc,
                #ffffff
            );

        color: #0f172a;

        text-decoration: none;

        transition: .22s;
    }


    .dashboard-quick-action:hover {
        border-color: #bfdbfe;

        background: #eff6ff;

        transform:
            translateX(4px);
    }


    .dashboard-quick-icon {
        width: 45px;

        height: 45px;

        display: flex;

        align-items: center;

        justify-content: center;

        flex-shrink: 0;

        border-radius: 13px;

        background:
            linear-gradient(
                135deg,
                #dbeafe,
                #e0f2fe
            );

        font-size: 21px;
    }


    .dashboard-quick-action strong {
        display: block;

        margin-bottom: 4px;

        font-size: 12px;
    }


    .dashboard-quick-action small {
        color: #94a3b8;

        font-size: 9px;
    }


    /* =========================================================
       PAYMENT WARNING
    ========================================================= */

    .dashboard-warning {
        position: relative;

        overflow: hidden;

        margin-top: 17px;

        padding: 20px;

        border:
            1px solid #fecdd3;

        border-radius: 17px;

        background:
            linear-gradient(
                135deg,
                #fff1f2,
                #fff7ed
            );
    }


    .dashboard-warning::after {
        content: "💳";

        position: absolute;

        right: 15px;

        top: 13px;

        font-size: 43px;

        opacity: .12;
    }


    .dashboard-warning small {
        color: #9f1239;

        font-size: 9px;

        font-weight: 800;
    }


    .dashboard-warning h2 {
        margin:
            8px 0 5px;

        color: #e11d48;

        font-size: 33px;

        font-weight: 900;
    }


    .dashboard-warning p {
        margin: 0;

        color: #9f1239;

        font-size: 9px;
    }


    .dashboard-empty {
        padding:
            40px !important;

        color:
            #94a3b8 !important;

        text-align:
            center !important;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media(max-width: 1200px) {

        .dashboard-stats-grid {
            grid-template-columns:
                repeat(2,1fr);
        }


        .dashboard-status-grid {
            grid-template-columns:
                repeat(4,1fr);
        }


        .dashboard-bottom-grid {
            grid-template-columns:
                1fr;
        }

    }


    @media(max-width: 1000px) {

        .dashboard-analysis-grid {
            grid-template-columns:
                1fr;
        }


        .dashboard-today {
            display: grid;

            grid-template-columns:
                repeat(2,1fr);
        }

    }


    @media(max-width: 760px) {

        .dashboard-premium {
            padding: 10px;

            background-attachment:
                scroll;
        }


        .dashboard-hero {
            min-height: auto;

            padding:
                31px 24px;

            border-radius: 22px;
        }


        .dashboard-laundry-visual {
            display: none;
        }


        .dashboard-hero h1 {
            font-size: 40px;

            letter-spacing: -1px;
        }


        .dashboard-hero-description {
            font-size: 13px;
        }


        .dashboard-hero-quote {
            font-size: 12px;
        }


        .dashboard-stats-grid {
            grid-template-columns:
                1fr;
        }


        .dashboard-today {
            grid-template-columns:
                1fr;
        }


        .dashboard-status-grid {
            grid-template-columns:
                repeat(2,1fr);
        }


        .dashboard-chart-wrapper {
            height: 225px;
        }


        .dashboard-section-heading h2 {
            font-size: 18px;
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


        <div class="dashboard-hero-content">


            <div class="dashboard-hero-top">


                <div class="dashboard-hero-badge">

                    ✨ Selamat Datang,

                    {{
                        auth()->user()->name
                        ?? 'Administrator'
                    }}

                </div>


                <div class="dashboard-hero-date">

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



            <p class="dashboard-hero-description">

                Kelola seluruh aktivitas laundry mulai dari
                pelanggan, transaksi, pembayaran, layanan,
                hingga proses pengerjaan dalam satu sistem
                yang modern, cepat, rapi dan terorganisir.

            </p>



            <div class="dashboard-hero-quote">

                “Bersih, Wangi, Rapi —
                Karena Setiap Pakaian Layak Mendapatkan
                Perawatan Terbaik.”

            </div>


        </div>



        <div class="dashboard-laundry-visual">

            <span>
                👕
            </span>

            <small>
                Laundry Service
            </small>

        </div>


    </section>



    <!-- =====================================================
         RINGKASAN
    ====================================================== -->

    <div class="dashboard-section-heading">

        <div>

            <h2>
                📊 Ringkasan Operasional
            </h2>

            <p>
                Informasi utama operasional
                Tania Mutiara Laundry.
            </p>

        </div>

    </div>



    <div class="dashboard-stats-grid">


        <!-- TOTAL PELANGGAN -->

        <div class="dashboard-stat-card">

            <div class="dashboard-stat-head">

                <small>
                    Total Pelanggan
                </small>

                <div class="dashboard-stat-icon">
                    👥
                </div>

            </div>


            <h2>
                {{ $totalPelanggan }}
            </h2>


            <p>
                Pelanggan yang telah terdaftar.
            </p>

        </div>



        <!-- PESANAN AKTIF -->

        <div class="dashboard-stat-card">

            <div class="dashboard-stat-head">

                <small>
                    Pesanan Aktif
                </small>

                <div class="dashboard-stat-icon">
                    🫧
                </div>

            </div>


            <h2>
                {{ $pesananMasuk }}
            </h2>


            <p>
                Laundry yang sedang diproses.
            </p>

        </div>



        <!-- SELESAI -->

        <div class="dashboard-stat-card">

            <div class="dashboard-stat-head">

                <small>
                    Laundry Selesai
                </small>

                <div class="dashboard-stat-icon">
                    ✅
                </div>

            </div>


            <h2>
                {{ $laundrySelesai }}
            </h2>


            <p>
                Pesanan yang telah selesai.
            </p>

        </div>



        <!-- PENDAPATAN -->

        <div
            class="
                dashboard-stat-card
                dashboard-stat-money
            "
        >

            <div class="dashboard-stat-head">

                <small>
                    Total Pendapatan
                </small>

                <div class="dashboard-stat-icon">
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
                Pendapatan transaksi yang sudah lunas.
            </p>

        </div>


    </div>



    <!-- =====================================================
         ANALISIS
    ====================================================== -->

    <div class="dashboard-section-heading">

        <div>

            <h2>
                📈 Analisis Pendapatan
            </h2>

            <p>
                Aktivitas dan pendapatan laundry
                selama tujuh hari terakhir.
            </p>

        </div>

    </div>



    <div class="dashboard-analysis-grid">


        <!-- GRAFIK -->

        <div class="dashboard-panel">


            <div class="dashboard-panel-header">


                <div>

                    <h2>
                        📈 Pendapatan 7 Hari Terakhir
                    </h2>

                    <p>
                        Berdasarkan transaksi dengan
                        status pembayaran Lunas.
                    </p>

                </div>


                <span class="dashboard-chart-label">
                    ● 7 Hari
                </span>


            </div>



            <div class="dashboard-chart-wrapper">

                <canvas id="revenueChart"></canvas>

            </div>


        </div>



        <!-- HARI INI -->

        <div class="dashboard-today">


            <div class="dashboard-today-card">


                <div class="dashboard-today-head">

                    <span class="dashboard-today-label">
                        Transaksi Hari Ini
                    </span>

                    <div class="dashboard-today-icon">
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



            <div
                class="
                    dashboard-today-card
                    dashboard-today-income
                "
            >


                <div class="dashboard-today-head">

                    <span class="dashboard-today-label">
                        Pendapatan Hari Ini
                    </span>

                    <div class="dashboard-today-icon">
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
                    Total transaksi lunas hari ini.
                </p>


            </div>


        </div>


    </div>



    <!-- =====================================================
         STATUS
    ====================================================== -->

    <div class="dashboard-section-heading">

        <div>

            <h2>
                🫧 Monitoring Status Laundry
            </h2>

            <p>
                Jumlah transaksi berdasarkan
                proses pengerjaan laundry.
            </p>

        </div>

    </div>



    <div class="dashboard-status-grid">


        <div class="dashboard-status-card">

            <span>📥</span>

            <strong>
                {{ $statusDiterima }}
            </strong>

            <small>
                Diterima
            </small>

        </div>


        <div class="dashboard-status-card">

            <span>🫧</span>

            <strong>
                {{ $statusDicuci }}
            </strong>

            <small>
                Dicuci
            </small>

        </div>


        <div class="dashboard-status-card">

            <span>💨</span>

            <strong>
                {{ $statusDikeringkan }}
            </strong>

            <small>
                Dikeringkan
            </small>

        </div>


        <div class="dashboard-status-card">

            <span>👔</span>

            <strong>
                {{ $statusDisetrika }}
            </strong>

            <small>
                Disetrika
            </small>

        </div>


        <div class="dashboard-status-card">

            <span>✅</span>

            <strong>
                {{ $statusSelesai }}
            </strong>

            <small>
                Selesai
            </small>

        </div>


        <div class="dashboard-status-card">

            <span>🤝</span>

            <strong>
                {{ $statusDiambil }}
            </strong>

            <small>
                Diambil
            </small>

        </div>


        <div class="dashboard-status-card">

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
         TRANSAKSI & MENU CEPAT
    ====================================================== -->

    <div class="dashboard-bottom-grid">


        <!-- TRANSAKSI -->

        <div class="dashboard-panel">


            <div class="dashboard-panel-header">


                <div>

                    <h2>
                        🧾 Transaksi Terbaru
                    </h2>

                    <p>
                        Aktivitas transaksi terbaru
                        Tania Mutiara Laundry.
                    </p>

                </div>


                <a
                    href="{{ route('transaksi.index') }}"
                    class="dashboard-btn"
                >
                    Lihat Semua →
                </a>


            </div>



            <div class="dashboard-table-responsive">


                <table class="dashboard-table">


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

                                <span
                                    class="
                                        dashboard-transaction-code
                                    "
                                >

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

                                <span class="dashboard-total">

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
                                            dashboard-badge
                                            dashboard-badge-green
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
                                            dashboard-badge
                                            dashboard-badge-blue
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
                                class="dashboard-empty"
                            >

                                🧺 Belum ada transaksi laundry.

                            </td>

                        </tr>


                    @endforelse


                    </tbody>


                </table>


            </div>


        </div>



        <!-- MENU CEPAT -->

        <div class="dashboard-panel">


            <div class="dashboard-panel-header">

                <div>

                    <h2>
                        ⚡ Menu Cepat
                    </h2>

                    <p>
                        Akses fitur utama dengan cepat.
                    </p>

                </div>

            </div>



            <div class="dashboard-quick-list">


                <a
                    href="{{ route('transaksi.index') }}"
                    class="dashboard-quick-action"
                >

                    <div class="dashboard-quick-icon">
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
                    class="dashboard-quick-action"
                >

                    <div class="dashboard-quick-icon">
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
                    href="{{ route('layanan.index') }}"
                    class="dashboard-quick-action"
                >

                    <div class="dashboard-quick-icon">
                        👕
                    </div>

                    <div>

                        <strong>
                            Data Layanan
                        </strong>

                        <small>
                            Kelola harga dan layanan
                        </small>

                    </div>

                </a>



                <a
                    href="{{ route('status.index') }}"
                    class="dashboard-quick-action"
                >

                    <div class="dashboard-quick-icon">
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
                    class="dashboard-quick-action"
                >

                    <div class="dashboard-quick-icon">
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

            <div class="dashboard-warning">

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
                        value / 1000000
                    ).toFixed(1) +
                    'jt'
                );

            }


            if (
                value >= 1000
            ) {

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


        /*
        |--------------------------------------------------------------------------
        | DRAW CHART
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


            const padding = {
                top: 20,
                right: 20,
                bottom: 45,
                left: 65
            };


            const chartWidth =
                width
                - padding.left
                - padding.right;


            const chartHeight =
                height
                - padding.top
                - padding.bottom;


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
                    maximumValue
                    / 10000
                )
                * 10000;


            /*
            |--------------------------------------------------------------------------
            | GRID
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
                    padding.top
                    +
                    (
                        chartHeight / 4
                    )
                    * i;


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
                    width
                    - padding.right,
                    y
                );


                ctx.stroke();


                const value =
                    roundedMaximum
                    -
                    (
                        roundedMaximum / 4
                    )
                    * i;


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
                        padding.left
                        +
                        (
                            chartWidth
                            /
                            Math.max(
                                numericValues.length - 1,
                                1
                            )
                        )
                        * index;


                    const y =
                        padding.top
                        +
                        chartHeight
                        -
                        (
                            value
                            /
                            roundedMaximum
                        )
                        *
                        chartHeight;


                    points.push({
                        x: x,
                        y: y
                    });

                }
            );


            /*
            |--------------------------------------------------------------------------
            | AREA GRADIENT
            |--------------------------------------------------------------------------
            */

            if (
                points.length > 0
            ) {

                const gradient =
                    ctx.createLinearGradient(
                        0,
                        padding.top,
                        0,
                        padding.top
                        + chartHeight
                    );


                gradient.addColorStop(
                    0,
                    'rgba(37,99,235,.26)'
                );


                gradient.addColorStop(
                    1,
                    'rgba(37,99,235,.01)'
                );


                ctx.beginPath();


                ctx.moveTo(
                    points[0].x,
                    padding.top
                    + chartHeight
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
                                    previous.x
                                    +
                                    point.x
                                )
                                / 2;


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
                    padding.top
                    + chartHeight
                );


                ctx.closePath();


                ctx.fillStyle =
                    gradient;


                ctx.fill();

            }


            /*
            |--------------------------------------------------------------------------
            | LINE
            |--------------------------------------------------------------------------
            */

            if (
                points.length > 0
            ) {

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
                                    previous.x
                                    +
                                    point.x
                                )
                                / 2;


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

            }


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
                        5,
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
                        padding.left
                        +
                        (
                            chartWidth
                            /
                            Math.max(
                                labels.length - 1,
                                1
                            )
                        )
                        *
                        index;


                    ctx.fillText(
                        label,
                        x,
                        padding.top
                        +
                        chartHeight
                        +
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