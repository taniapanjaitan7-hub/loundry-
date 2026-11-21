@extends('layouts.app')

@section('title', 'Dashboard - Tania Mutiara Laundry')

@push('styles')

<style>
    .dashboard-page {
        min-height: calc(100vh - 120px);
        padding: 20px;
        border-radius: 28px;

        background:
            linear-gradient(
                rgba(244, 247, 251, .86),
                rgba(244, 247, 251, .95)
            ),
            url("{{ asset('images/laundry-bg.png') }}");

        background-size: cover;
        background-position: center;
        background-attachment: fixed;
    }


    /* =========================================================
       HERO
    ========================================================= */

    .dashboard-hero {
        position: relative;
        overflow: hidden;

        min-height: 350px;

        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 30px;

        padding: 45px;

        margin-bottom: 28px;

        border-radius: 30px;

        background:
            linear-gradient(
                110deg,
                rgba(7, 30, 75, .97),
                rgba(37, 99, 235, .88),
                rgba(14, 165, 233, .60)
            ),
            url("{{ asset('images/laundry-bg.png') }}");

        background-size: cover;
        background-position: center;

        box-shadow:
            0 25px 60px
            rgba(15, 23, 42, .22);

        color: white;
    }


    .dashboard-hero::after {
        content: "";

        position: absolute;

        width: 380px;
        height: 380px;

        right: -180px;
        top: -190px;

        border-radius: 50%;

        background:
            rgba(255,255,255,.08);
    }


    .hero-content {
        position: relative;
        z-index: 3;

        max-width: 780px;
    }


    .hero-top {
        display: flex;
        align-items: center;

        gap: 9px;

        flex-wrap: wrap;

        margin-bottom: 22px;
    }


    .hero-badge {
        display: inline-flex;
        align-items: center;

        gap: 6px;

        padding: 9px 14px;

        border:
            1px solid
            rgba(255,255,255,.22);

        border-radius: 30px;

        background:
            rgba(255,255,255,.14);

        backdrop-filter:
            blur(12px);

        color: white;

        text-decoration: none;

        font-size: 11px;
        font-weight: 700;

        transition: .2s;
    }


    .hero-badge:hover {
        transform:
            translateY(-2px);

        background:
            rgba(255,255,255,.20);
    }


    .hero-notification {
        background:
            rgba(251,191,36,.18);

        border-color:
            rgba(253,224,71,.32);

        color: #fef3c7;
    }


    .dashboard-hero h1 {
        margin:
            0 0 18px;

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
    }


    .dashboard-hero h1 span {
        color: #d7f3ff;
    }


    .hero-description {
        max-width: 700px;

        margin: 0;

        color:
            rgba(255,255,255,.92);

        font-size: 14px;

        line-height: 1.8;
    }


    .hero-quote {
        display: inline-block;

        margin-top: 22px;

        padding:
            14px 18px;

        border-left:
            4px solid #bae6fd;

        border-radius:
            0 14px 14px 0;

        background:
            rgba(255,255,255,.13);

        color: white;

        font-size: 12px;
        font-weight: 600;

        line-height: 1.7;
    }


    .hero-visual {
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
            rgba(255,255,255,.27);

        border-radius: 52px;

        background:
            rgba(255,255,255,.13);

        backdrop-filter:
            blur(18px);

        font-size: 95px;

        box-shadow:
            0 25px 45px
            rgba(0,0,0,.15);
    }


    /* =========================================================
       SECTION
    ========================================================= */

    .section-heading {
        margin:
            8px 0 17px;
    }


    .section-heading h2 {
        margin: 0;

        color: #0f172a;

        font-size: 20px;
        font-weight: 900;
    }


    .section-heading p {
        margin:
            5px 0 0;

        color: #64748b;

        font-size: 11px;
    }


    /* =========================================================
       STAT CARDS
    ========================================================= */

    .stat-grid {
        display: grid;

        grid-template-columns:
            repeat(4, 1fr);

        gap: 16px;

        margin-bottom: 28px;
    }


    .stat-card {
        padding: 23px;

        border:
            1px solid #e5edf7;

        border-radius: 21px;

        background:
            rgba(255,255,255,.96);

        box-shadow:
            0 10px 28px
            rgba(15,23,42,.07);

        transition: .25s;
    }


    .stat-card:hover {
        transform:
            translateY(-5px);

        box-shadow:
            0 18px 38px
            rgba(15,23,42,.12);
    }


    .stat-card-top {
        display: flex;
        align-items: center;
        justify-content: space-between;

        margin-bottom: 15px;
    }


    .stat-card-top small {
        color: #64748b;

        font-size: 9px;
        font-weight: 800;

        text-transform: uppercase;
    }


    .stat-icon {
        width: 48px;
        height: 48px;

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

        font-size: 22px;
    }


    .stat-card h2 {
        margin:
            0 0 7px;

        color: #0f172a;

        font-size: 32px;
        font-weight: 900;
    }


    .stat-card p {
        margin: 0;

        color: #94a3b8;

        font-size: 10px;
    }


    .stat-money h2 {
        color: #059669;

        font-size: 25px;
    }


    /* =========================================================
       NOTIFICATION
    ========================================================= */

    .notification-panel {
        margin-bottom: 28px;

        padding: 24px;

        border:
            1px solid #e5edf7;

        border-radius: 22px;

        background:
            rgba(255,255,255,.96);

        box-shadow:
            0 10px 30px
            rgba(15,23,42,.07);
    }


    .notification-header {
        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 15px;

        margin-bottom: 18px;
    }


    .notification-header h2 {
        margin: 0;

        color: #0f172a;

        font-size: 18px;
        font-weight: 900;
    }


    .notification-count {
        padding:
            7px 11px;

        border-radius: 30px;

        background: #eff6ff;

        color: #1d4ed8;

        font-size: 9px;
        font-weight: 800;
    }


    .notification-grid {
        display: grid;

        grid-template-columns:
            repeat(3, 1fr);

        gap: 13px;
    }


    .notification-card {
        display: flex;
        align-items: center;

        gap: 13px;

        padding: 16px;

        border:
            1px solid #edf2f7;

        border-radius: 16px;

        background: #f8fafc;

        text-decoration: none;

        transition: .22s;
    }


    .notification-card:hover {
        transform:
            translateY(-4px);

        border-color: #bfdbfe;

        background: #eff6ff;

        box-shadow:
            0 12px 28px
            rgba(15,23,42,.09);
    }


    .notification-icon {
        width: 48px;
        height: 48px;

        flex-shrink: 0;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 14px;

        font-size: 22px;
    }


    .notification-payment .notification-icon {
        background: #fff1f2;
    }


    .notification-ready .notification-icon {
        background: #ecfdf5;
    }


    .notification-delivery .notification-icon {
        background: #eff6ff;
    }


    .notification-card strong {
        display: block;

        color: #0f172a;

        font-size: 12px;
    }


    .notification-card small {
        display: block;

        margin-top: 4px;

        color: #64748b;

        font-size: 9px;

        line-height: 1.5;
    }


    .notification-arrow {
        margin-left: auto;

        color: #2563eb;

        font-size: 18px;
    }


    /* =========================================================
       ANALISIS
    ========================================================= */

    .analysis-grid {
        display: grid;

        grid-template-columns:
            minmax(0, 2fr)
            minmax(280px, .8fr);

        gap: 20px;

        margin-bottom: 28px;
    }


    .panel {
        padding: 24px;

        border:
            1px solid #e5edf7;

        border-radius: 22px;

        background:
            rgba(255,255,255,.97);

        box-shadow:
            0 10px 30px
            rgba(15,23,42,.07);
    }


    .panel-header {
        display: flex;
        justify-content: space-between;
        align-items: center;

        gap: 12px;

        margin-bottom: 20px;

        flex-wrap: wrap;
    }


    .panel-header h2 {
        margin: 0;

        color: #0f172a;

        font-size: 18px;
        font-weight: 900;
    }


    .panel-header p {
        margin:
            5px 0 0;

        color: #94a3b8;

        font-size: 10px;
    }


    .chart-wrapper {
        position: relative;

        width: 100%;
        height: 280px;
    }


    #revenueChart {
        width: 100%;
        height: 100%;
    }


    /* =========================================================
       TODAY
    ========================================================= */

    .today-list {
        display: flex;

        flex-direction: column;

        gap: 14px;
    }


    .today-card {
        padding: 21px;

        border:
            1px solid #e5edf7;

        border-radius: 19px;

        background: white;

        box-shadow:
            0 8px 24px
            rgba(15,23,42,.06);
    }


    .today-card h3 {
        margin:
            0 0 12px;

        color: #64748b;

        font-size: 9px;

        text-transform: uppercase;
    }


    .today-card h2 {
        margin:
            0 0 7px;

        color: #0f172a;

        font-size: 29px;
        font-weight: 900;
    }


    .today-income h2 {
        color: #059669;

        font-size: 24px;
    }


    .today-card p {
        margin: 0;

        color: #94a3b8;

        font-size: 9px;
    }


    .trend {
        display: inline-flex;

        margin-top: 10px;

        padding:
            6px 9px;

        border-radius: 20px;

        font-size: 9px;
        font-weight: 800;
    }


    .trend-up {
        background: #dcfce7;
        color: #166534;
    }


    .trend-down {
        background: #fee2e2;
        color: #991b1b;
    }


    .trend-same {
        background: #f1f5f9;
        color: #475569;
    }


    /* =========================================================
       STATUS
    ========================================================= */

    .status-grid {
        display: grid;

        grid-template-columns:
            repeat(7, 1fr);

        gap: 11px;

        margin-bottom: 28px;
    }


    .status-card {
        padding:
            18px 9px;

        border:
            1px solid #e5edf7;

        border-radius: 16px;

        background:
            rgba(255,255,255,.96);

        text-align: center;

        box-shadow:
            0 7px 20px
            rgba(15,23,42,.05);

        transition: .22s;
    }


    .status-card:hover {
        transform:
            translateY(-4px);
    }


    .status-card span {
        display: block;

        font-size: 22px;
    }


    .status-card strong {
        display: block;

        margin-top: 6px;

        color: #0f172a;

        font-size: 23px;
        font-weight: 900;
    }


    .status-card small {
        display: block;

        margin-top: 4px;

        color: #64748b;

        font-size: 8px;
        font-weight: 700;

        text-transform: uppercase;
    }


    /* =========================================================
       BOTTOM
    ========================================================= */

    .bottom-grid {
        display: grid;

        grid-template-columns:
            minmax(0, 2fr)
            minmax(290px, .85fr);

        gap: 20px;

        align-items: start;
    }


    /* =========================================================
       TABLE
    ========================================================= */

    .table-wrapper {
        width: 100%;

        overflow-x: auto;
    }


    .dashboard-table {
        width: 100%;

        min-width: 690px;

        border-collapse: collapse;
    }


    .dashboard-table th {
        padding:
            12px 10px;

        border-bottom:
            1px solid #e2e8f0;

        background: #f8fafc;

        color: #64748b;

        text-align: left;

        font-size: 8px;
        font-weight: 800;

        text-transform: uppercase;
    }


    .dashboard-table td {
        padding:
            14px 10px;

        border-bottom:
            1px solid #f1f5f9;

        color: #334155;

        font-size: 10px;
    }


    .transaction-code {
        color: #2563eb;

        font-weight: 800;
    }


    .transaction-total {
        color: #0f172a;

        font-weight: 800;
    }


    .status-badge {
        display: inline-flex;

        padding:
            5px 8px;

        border-radius: 20px;

        font-size: 8px;
        font-weight: 800;
    }


    .status-success {
        background: #dcfce7;
        color: #166534;
    }


    .status-process {
        background: #dbeafe;
        color: #1d4ed8;
    }


    /* =========================================================
       QUICK MENU
    ========================================================= */

    .quick-list {
        display: flex;

        flex-direction: column;

        gap: 9px;
    }


    .quick-link {
        display: flex;
        align-items: center;

        gap: 11px;

        padding: 13px;

        border:
            1px solid #edf2f7;

        border-radius: 13px;

        background: #f8fafc;

        color: #0f172a;

        text-decoration: none;

        transition: .2s;
    }


    .quick-link:hover {
        transform:
            translateX(4px);

        border-color: #bfdbfe;

        background: #eff6ff;
    }


    .quick-icon {
        width: 43px;
        height: 43px;

        display: flex;
        align-items: center;
        justify-content: center;

        flex-shrink: 0;

        border-radius: 12px;

        background: #dbeafe;

        font-size: 20px;
    }


    .quick-link strong {
        display: block;

        margin-bottom: 3px;

        font-size: 11px;
    }


    .quick-link small {
        color: #94a3b8;

        font-size: 8px;
    }


    /* =========================================================
       WARNING
    ========================================================= */

    .payment-warning {
        display: block;

        position: relative;

        margin-top: 16px;

        padding: 18px;

        border:
            1px solid #fecdd3;

        border-radius: 16px;

        background:
            linear-gradient(
                135deg,
                #fff1f2,
                #fff7ed
            );

        text-decoration: none;

        transition: .2s;
    }


    .payment-warning:hover {
        transform:
            translateY(-3px);

        box-shadow:
            0 12px 25px
            rgba(225,29,72,.10);
    }


    .payment-warning small {
        color: #9f1239;

        font-size: 8px;
        font-weight: 800;
    }


    .payment-warning h2 {
        margin:
            7px 0 5px;

        color: #e11d48;

        font-size: 31px;
    }


    .payment-warning p {
        margin: 0;

        color: #9f1239;

        font-size: 9px;
    }


    .dashboard-btn {
        display: inline-flex;

        padding:
            9px 13px;

        border-radius: 9px;

        background: #2563eb;

        color: white;

        text-decoration: none;

        font-size: 9px;
        font-weight: 800;
    }


    .empty {
        padding:
            35px !important;

        text-align:
            center !important;

        color:
            #94a3b8 !important;
    }


    @media(max-width: 1200px) {

        .stat-grid {
            grid-template-columns:
                repeat(2,1fr);
        }


        .status-grid {
            grid-template-columns:
                repeat(4,1fr);
        }


        .bottom-grid {
            grid-template-columns:
                1fr;
        }

    }


    @media(max-width: 1000px) {

        .analysis-grid {
            grid-template-columns:
                1fr;
        }


        .notification-grid {
            grid-template-columns:
                1fr;
        }

    }


    @media(max-width: 760px) {

        .dashboard-page {
            padding: 10px;

            background-attachment: scroll;
        }


        .dashboard-hero {
            min-height: auto;

            padding:
                30px 23px;

            border-radius: 22px;
        }


        .hero-visual {
            display: none;
        }


        .dashboard-hero h1 {
            font-size: 40px;
        }


        .stat-grid {
            grid-template-columns:
                1fr;
        }


        .status-grid {
            grid-template-columns:
                repeat(2,1fr);
        }

    }

</style>

@endpush



@section('content')

<div class="dashboard-page">


    <!-- =====================================================
         HERO
    ====================================================== -->

    <section class="dashboard-hero">


        <div class="hero-content">


            <div class="hero-top">


                <div class="hero-badge">

                    {{ $ikonSapaan ?? '☀️' }}

                    {{ $sapaan ?? 'Selamat Datang' }},

                    {{
                        auth()->user()->name
                        ?? 'Administrator'
                    }}

                </div>


                <div class="hero-badge">

                    📅

                    {{
                        $tanggalHariIni
                        ?? now()->translatedFormat('d F Y')
                    }}

                </div>


                <div class="hero-badge">

                    🕘

                    <span id="liveClock">
                        --:--:--
                    </span>

                </div>


                @if(($totalNotifikasi ?? 0) > 0)

                    <a
                        href="{{ route('transaksi.index') }}"
                        class="
                            hero-badge
                            hero-notification
                        "
                    >

                        🔔

                        {{ $totalNotifikasi }}

                        Notifikasi

                    </a>

                @endif


            </div>



            <h1>

                Tania Mutiara

                <span>
                    Laundry
                </span>

            </h1>



            <p class="hero-description">

                Kelola pelanggan, transaksi, pembayaran,
                layanan dan proses pengerjaan laundry
                dalam satu sistem yang modern,
                cepat, rapi dan terorganisir.

            </p>



            <div class="hero-quote">

                “Bersih, Wangi, Rapi —
                Karena Setiap Pakaian Layak Mendapatkan
                Perawatan Terbaik.”

            </div>


        </div>



        <div class="hero-visual">
            👕
        </div>


    </section>



    <!-- =====================================================
         RINGKASAN
    ====================================================== -->

    <div class="section-heading">

        <h2>
            📊 Ringkasan Operasional
        </h2>

        <p>
            Ringkasan aktivitas utama
            Tania Mutiara Laundry.
        </p>

    </div>



    <div class="stat-grid">


        <div class="stat-card">

            <div class="stat-card-top">

                <small>
                    Total Pelanggan
                </small>

                <div class="stat-icon">
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



        <div class="stat-card">

            <div class="stat-card-top">

                <small>
                    Pesanan Aktif
                </small>

                <div class="stat-icon">
                    🫧
                </div>

            </div>

            <h2>
                {{ $pesananMasuk }}
            </h2>

            <p>
                Laundry yang masih dalam proses.
            </p>

        </div>



        <div class="stat-card">

            <div class="stat-card-top">

                <small>
                    Laundry Selesai
                </small>

                <div class="stat-icon">
                    ✅
                </div>

            </div>

            <h2>
                {{ $laundrySelesai }}
            </h2>

            <p>
                Pesanan yang telah selesai diproses.
            </p>

        </div>



        <div class="stat-card stat-money">

            <div class="stat-card-top">

                <small>
                    Total Pendapatan
                </small>

                <div class="stat-icon">
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
                Transaksi dengan pembayaran Lunas.
            </p>

        </div>


    </div>



    <!-- =====================================================
         NOTIFIKASI YANG BISA DIKLIK
    ====================================================== -->

    <div class="notification-panel">


        <div class="notification-header">

            <h2>
                🔔 Notifikasi Operasional
            </h2>


            <span class="notification-count">

                {{ $totalNotifikasi }}

                Notifikasi

            </span>

        </div>



        <div class="notification-grid">


            <!-- BELUM LUNAS -->

            <a
                href="{{
                    route(
                        'transaksi.index',
                        [
                            'status_pembayaran'
                                => 'Belum Lunas'
                        ]
                    )
                }}"

                class="
                    notification-card
                    notification-payment
                "
            >

                <div class="notification-icon">
                    💳
                </div>


                <div>

                    <strong>

                        {{ $belumLunas }}

                        Pembayaran Belum Lunas

                    </strong>

                    <small>

                        Total tagihan:

                        Rp
                        {{
                            number_format(
                                $nominalBelumLunas,
                                0,
                                ',',
                                '.'
                            )
                        }}

                    </small>

                </div>


                <div class="notification-arrow">
                    →
                </div>

            </a>



            <!-- SIAP DIAMBIL -->

            <a
                href="{{
                    route(
                        'transaksi.index',
                        [
                            'status_laundry'
                                => 'Selesai'
                        ]
                    )
                }}"

                class="
                    notification-card
                    notification-ready
                "
            >

                <div class="notification-icon">
                    ✅
                </div>


                <div>

                    <strong>

                        {{ $siapDiambil }}

                        Laundry Siap Diambil

                    </strong>

                    <small>
                        Klik untuk melihat laundry
                        dengan status Selesai.
                    </small>

                </div>


                <div class="notification-arrow">
                    →
                </div>

            </a>



            <!-- DIKIRIM -->

            <a
                href="{{
                    route(
                        'transaksi.index',
                        [
                            'status_laundry'
                                => 'Dikirim'
                        ]
                    )
                }}"

                class="
                    notification-card
                    notification-delivery
                "
            >

                <div class="notification-icon">
                    🚚
                </div>


                <div>

                    <strong>

                        {{ $sedangDikirim }}

                        Laundry Dikirim

                    </strong>

                    <small>
                        Klik untuk melihat pesanan
                        dengan status Dikirim.
                    </small>

                </div>


                <div class="notification-arrow">
                    →
                </div>

            </a>


        </div>


    </div>



    <!-- =====================================================
         ANALISIS
    ====================================================== -->

    <div class="section-heading">

        <h2>
            📈 Analisis Pendapatan
        </h2>

        <p>
            Pantau transaksi dan pendapatan laundry.
        </p>

    </div>



    <div class="analysis-grid">


        <div class="panel">


            <div class="panel-header">

                <div>

                    <h2>
                        📈 Pendapatan 7 Hari Terakhir
                    </h2>

                    <p>
                        Berdasarkan transaksi
                        berstatus Lunas.
                    </p>

                </div>

            </div>


            <div class="chart-wrapper">

                <canvas id="revenueChart"></canvas>

            </div>


        </div>



        <div class="today-list">


            <div class="today-card">

                <h3>
                    🧾 Transaksi Hari Ini
                </h3>

                <h2>
                    {{ $transaksiHariIni }}
                </h2>

                <p>

                    Kemarin:

                    {{ $transaksiKemarin }}

                    transaksi

                </p>

            </div>



            <div class="today-card today-income">

                <h3>
                    💵 Pendapatan Hari Ini
                </h3>

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

                    Kemarin:

                    Rp
                    {{
                        number_format(
                            $pendapatanKemarin,
                            0,
                            ',',
                            '.'
                        )
                    }}

                </p>


                @if($trenPendapatan === 'naik')

                    <span class="trend trend-up">

                        ↑
                        {{ $persentasePendapatan }}%

                        dibanding kemarin

                    </span>

                @elseif($trenPendapatan === 'turun')

                    <span class="trend trend-down">

                        ↓
                        {{ $persentasePendapatan }}%

                        dibanding kemarin

                    </span>

                @else

                    <span class="trend trend-same">

                        →
                        Pendapatan tetap

                    </span>

                @endif


            </div>


        </div>


    </div>



    <!-- =====================================================
         STATUS
    ====================================================== -->

    <div class="section-heading">

        <h2>
            🫧 Monitoring Status Laundry
        </h2>

        <p>
            Jumlah transaksi berdasarkan
            tahap pengerjaan.
        </p>

    </div>



    <div class="status-grid">


        <div class="status-card">

            <span>📥</span>

            <strong>
                {{ $statusDiterima }}
            </strong>

            <small>
                Diterima
            </small>

        </div>


        <div class="status-card">

            <span>🫧</span>

            <strong>
                {{ $statusDicuci }}
            </strong>

            <small>
                Dicuci
            </small>

        </div>


        <div class="status-card">

            <span>💨</span>

            <strong>
                {{ $statusDikeringkan }}
            </strong>

            <small>
                Dikeringkan
            </small>

        </div>


        <div class="status-card">

            <span>👔</span>

            <strong>
                {{ $statusDisetrika }}
            </strong>

            <small>
                Disetrika
            </small>

        </div>


        <div class="status-card">

            <span>✅</span>

            <strong>
                {{ $statusSelesai }}
            </strong>

            <small>
                Selesai
            </small>

        </div>


        <div class="status-card">

            <span>🤝</span>

            <strong>
                {{ $statusDiambil }}
            </strong>

            <small>
                Diambil
            </small>

        </div>


        <div class="status-card">

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
         BOTTOM
    ====================================================== -->

    <div class="bottom-grid">


        <!-- TRANSAKSI TERBARU -->

        <div class="panel">


            <div class="panel-header">

                <div>

                    <h2>
                        🧾 Transaksi Terbaru
                    </h2>

                    <p>
                        Lima transaksi terbaru.
                    </p>

                </div>


                <a
                    href="{{ route('transaksi.index') }}"
                    class="dashboard-btn"
                >
                    Lihat Semua →
                </a>

            </div>



            <div class="table-wrapper">


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
                                            status-badge
                                            status-success
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
                                            status-badge
                                            status-process
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
                                class="empty"
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

        <div class="panel">


            <div class="panel-header">

                <div>

                    <h2>
                        ⚡ Menu Cepat
                    </h2>

                    <p>
                        Akses fitur utama.
                    </p>

                </div>

            </div>



            <div class="quick-list">


                <a
                    href="{{ route('transaksi.index') }}"
                    class="quick-link"
                >

                    <div class="quick-icon">
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
                    class="quick-link"
                >

                    <div class="quick-icon">
                        👤
                    </div>

                    <div>

                        <strong>
                            Data Pelanggan
                        </strong>

                        <small>
                            Kelola pelanggan
                        </small>

                    </div>

                </a>



                <a
                    href="{{ route('layanan.index') }}"
                    class="quick-link"
                >

                    <div class="quick-icon">
                        👕
                    </div>

                    <div>

                        <strong>
                            Data Layanan
                        </strong>

                        <small>
                            Kelola layanan dan harga
                        </small>

                    </div>

                </a>



                <a
                    href="{{ route('status.index') }}"
                    class="quick-link"
                >

                    <div class="quick-icon">
                        🔄
                    </div>

                    <div>

                        <strong>
                            Status Laundry
                        </strong>

                        <small>
                            Pantau proses laundry
                        </small>

                    </div>

                </a>



                <a
                    href="{{ route('laporan.index') }}"
                    class="quick-link"
                >

                    <div class="quick-icon">
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



            <!-- WARNING BISA DIKLIK -->

            <a
                href="{{
                    route(
                        'transaksi.index',
                        [
                            'status_pembayaran'
                                => 'Belum Lunas'
                        ]
                    )
                }}"

                class="payment-warning"
            >

                <small>
                    💳 PEMBAYARAN BELUM LUNAS
                </small>


                <h2>
                    {{ $belumLunas }}
                </h2>


                <p>

                    Total tagihan:

                    <strong>

                        Rp
                        {{
                            number_format(
                                $nominalBelumLunas,
                                0,
                                ',',
                                '.'
                            )
                        }}

                    </strong>

                    — klik untuk melihat.

                </p>

            </a>


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
        | JAM REALTIME
        |--------------------------------------------------------------------------
        */

        const liveClock =
            document.getElementById(
                'liveClock'
            );


        function updateClock()
        {
            const now =
                new Date();


            const jam =
                now.toLocaleTimeString(
                    'id-ID',
                    {
                        timeZone:
                            'Asia/Jakarta',

                        hour:
                            '2-digit',

                        minute:
                            '2-digit',

                        second:
                            '2-digit',

                        hour12:
                            false
                    }
                );


            if (liveClock) {

                liveClock.textContent =
                    jam;

            }
        }


        updateClock();


        setInterval(
            updateClock,
            1000
        );


        /*
        |--------------------------------------------------------------------------
        | GRAFIK PENDAPATAN
        |--------------------------------------------------------------------------
        */

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
            @json($grafikPendapatan)
                .map(
                    function (value) {

                        return Number(value);

                    }
                );


        const ctx =
            canvas.getContext(
                '2d'
            );


        function formatRupiah(value)
        {
            if (value >= 1000000) {

                return (
                    'Rp'
                    +
                    (
                        value / 1000000
                    ).toFixed(1)
                    +
                    'jt'
                );

            }


            if (value >= 1000) {

                return (
                    'Rp'
                    +
                    Math.round(
                        value / 1000
                    )
                    +
                    'k'
                );

            }


            return (
                'Rp'
                +
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
                bottom: 42,
                left: 62
            };


            const chartWidth =
                width
                -
                padding.left
                -
                padding.right;


            const chartHeight =
                height
                -
                padding.top
                -
                padding.bottom;


            const maxValue =
                Math.max(
                    ...values,
                    10000
                );


            const roundedMax =
                Math.ceil(
                    maxValue / 10000
                )
                *
                10000;


            /*
            | GRID
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
                    *
                    i;


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
                    -
                    padding.right,
                    y
                );


                ctx.stroke();


                const value =
                    roundedMax
                    -
                    (
                        roundedMax / 4
                    )
                    *
                    i;


                ctx.fillStyle =
                    '#94a3b8';


                ctx.fillText(
                    formatRupiah(value),
                    padding.left - 8,
                    y
                );

            }


            /*
            | POINT
            */

            const points = [];


            values.forEach(
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
                                values.length - 1,
                                1
                            )
                        )
                        *
                        index;


                    const y =
                        padding.top
                        +
                        chartHeight
                        -
                        (
                            value
                            /
                            roundedMax
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
            | AREA
            */

            if (points.length > 0) {

                const gradient =
                    ctx.createLinearGradient(
                        0,
                        padding.top,
                        0,
                        padding.top
                        +
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
                    padding.top
                    +
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
                                points[
                                    index - 1
                                ];


                            const middle =
                                (
                                    previous.x
                                    +
                                    point.x
                                )
                                /
                                2;


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
                    +
                    chartHeight
                );


                ctx.closePath();


                ctx.fillStyle =
                    gradient;


                ctx.fill();

            }


            /*
            | LINE
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
                                points[
                                    index - 1
                                ];


                            const middle =
                                (
                                    previous.x
                                    +
                                    point.x
                                )
                                /
                                2;


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


                ctx.stroke();

            }


            /*
            | DOT
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
            | LABEL
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