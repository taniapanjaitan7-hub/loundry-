@extends('layouts.app')

@section('title', 'Status Laundry - Tania Mutiara Laundry')


@push('styles')

<style>

    /* =========================================================
       STATUS LAUNDRY PREMIUM
    ========================================================= */

    .status-page {
        width: 100%;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .status-header {
        position: relative;

        overflow: hidden;

        display: flex;
        justify-content: space-between;
        align-items: center;

        gap: 25px;

        margin-bottom: 25px;

        padding: 30px;

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


    .status-header::before {
        content: "";

        position: absolute;

        width: 250px;
        height: 250px;

        right: -80px;
        top: -120px;

        border-radius: 50%;

        background:
            rgba(255,255,255,.10);
    }


    .status-header-content {
        position: relative;

        z-index: 2;
    }


    .status-header h1 {
        margin:
            0 0 8px;

        font-size: 29px;
    }


    .status-header p {
        margin: 0;

        max-width: 620px;

        color:
            rgba(255,255,255,.83);

        font-size: 12px;

        line-height: 1.6;
    }


    .status-header-icon {
        position: relative;

        z-index: 2;

        width: 95px;
        height: 95px;

        display: flex;
        align-items: center;
        justify-content: center;

        flex-shrink: 0;

        border:
            1px solid
            rgba(255,255,255,.18);

        border-radius: 25px;

        background:
            rgba(255,255,255,.13);

        backdrop-filter:
            blur(12px);

        font-size: 45px;
    }



    /* =========================================================
       ALERT
    ========================================================= */

    .status-alert {
        margin-bottom: 20px;

        padding: 13px 15px;

        border:
            1px solid #bbf7d0;

        border-radius: 11px;

        background: #dcfce7;

        color: #166534;

        font-size: 11px;
    }



    /* =========================================================
       STATS
    ========================================================= */

    .status-stats-grid {
        display: grid;

        grid-template-columns:
            repeat(3, 1fr);

        gap: 16px;

        margin-bottom: 25px;
    }


    .status-stat-card {
        position: relative;

        overflow: hidden;

        padding: 21px;

        background: white;

        border:
            1px solid #e8eef7;

        border-radius: 17px;

        box-shadow:
            0 7px 22px
            rgba(15,23,42,.06);

        transition: .2s;
    }


    .status-stat-card:hover {
        transform:
            translateY(-3px);

        box-shadow:
            0 14px 30px
            rgba(15,23,42,.10);
    }


    .status-stat-card::after {
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


    .status-stat-top {
        display: flex;
        justify-content: space-between;
        align-items: center;

        margin-bottom: 13px;
    }


    .status-stat-top small {
        color: #64748b;

        font-size: 9px;

        font-weight: 700;

        text-transform: uppercase;

        letter-spacing: .5px;
    }


    .status-stat-icon {
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


    .status-stat-card h2 {
        margin:
            0 0 5px;

        color: #0f172a;

        font-size: 27px;
    }


    .status-stat-card p {
        margin: 0;

        color: #94a3b8;

        font-size: 9px;
    }


    .stat-ready h2 {
        color: #2563eb;
    }


    .stat-completed h2 {
        color: #059669;
    }



    /* =========================================================
       DETAIL STATUS COUNTS
    ========================================================= */

    .status-count-grid {
        display: grid;

        grid-template-columns:
            repeat(7, 1fr);

        gap: 9px;

        margin-bottom: 25px;
    }


    .status-count-card {
        padding: 14px 8px;

        background: white;

        border:
            1px solid #e8eef7;

        border-radius: 13px;

        text-align: center;

        box-shadow:
            0 5px 16px
            rgba(15,23,42,.04);
    }


    .status-count-card span {
        display: block;

        margin-bottom: 5px;

        font-size: 18px;
    }


    .status-count-card strong {
        display: block;

        color: #0f172a;

        font-size: 18px;
    }


    .status-count-card small {
        display: block;

        margin-top: 4px;

        color: #64748b;

        font-size: 7px;

        font-weight: 700;

        text-transform: uppercase;
    }



    /* =========================================================
       SEARCH PANEL
    ========================================================= */

    .status-search-panel {
        margin-bottom: 24px;

        padding: 19px;

        background: white;

        border:
            1px solid #e8eef7;

        border-radius: 17px;

        box-shadow:
            0 7px 22px
            rgba(15,23,42,.05);
    }


    .status-search-header {
        margin-bottom: 13px;
    }


    .status-search-header h2 {
        margin:
            0 0 4px;

        color: #0f172a;

        font-size: 16px;
    }


    .status-search-header p {
        margin: 0;

        color: #94a3b8;

        font-size: 9px;
    }


    .status-search-form {
        display: flex;

        gap: 8px;

        align-items: center;
    }


    .status-search-form input {
        flex: 1;

        min-width: 0;

        padding: 11px 12px;

        border:
            1px solid #cbd5e1;

        border-radius: 9px;

        outline: none;

        color: #334155;

        font-size: 11px;

        transition: .2s;
    }


    .status-search-form input:focus {
        border-color: #2563eb;

        box-shadow:
            0 0 0 3px
            rgba(37,99,235,.08);
    }



    /* =========================================================
       BUTTON
    ========================================================= */

    .status-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        gap: 5px;

        padding: 10px 14px;

        border: none;

        border-radius: 9px;

        cursor: pointer;

        text-decoration: none;

        font-size: 10px;

        font-weight: 700;

        transition: .2s;
    }


    .status-btn:hover {
        transform:
            translateY(-1px);
    }


    .btn-search {
        background: #2563eb;

        color: white;
    }


    .btn-reset {
        background: #64748b;

        color: white;
    }


    .btn-detail {
        background: #eff6ff;

        color: #1d4ed8;

        border:
            1px solid #bfdbfe;
    }



    /* =========================================================
       LAUNDRY CARD
    ========================================================= */

    .laundry-list {
        display: flex;

        flex-direction: column;

        gap: 18px;
    }


    .laundry-card {
        overflow: hidden;

        background: white;

        border:
            1px solid #e8eef7;

        border-radius: 19px;

        box-shadow:
            0 8px 25px
            rgba(15,23,42,.06);

        transition: .2s;
    }


    .laundry-card:hover {
        box-shadow:
            0 14px 32px
            rgba(15,23,42,.09);
    }


    .laundry-card-line {
        height: 4px;

        background:
            linear-gradient(
                90deg,
                #2563eb,
                #0ea5e9
            );
    }


    .laundry-card-content {
        padding: 22px;
    }



    /* =========================================================
       CARD TOP
    ========================================================= */

    .laundry-card-top {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;

        gap: 20px;

        flex-wrap: wrap;
    }


    .laundry-code {
        display: inline-flex;
        align-items: center;

        margin-bottom: 7px;

        padding: 5px 9px;

        border-radius: 20px;

        background: #eff6ff;

        color: #1d4ed8;

        font-size: 9px;

        font-weight: 800;
    }


    .laundry-customer h3 {
        margin:
            0 0 4px;

        color: #0f172a;

        font-size: 17px;
    }


    .laundry-customer p {
        margin: 0;

        color: #64748b;

        font-size: 9px;
    }


    .laundry-badges {
        display: flex;

        gap: 6px;

        align-items: center;

        flex-wrap: wrap;
    }



    /* =========================================================
       BADGE
    ========================================================= */

    .laundry-badge {
        display: inline-flex;
        align-items: center;

        padding: 5px 9px;

        border-radius: 20px;

        font-size: 8px;

        font-weight: 800;
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
       DETAILS
    ========================================================= */

    .laundry-detail-grid {
        display: grid;

        grid-template-columns:
            repeat(4, 1fr);

        gap: 10px;

        margin:
            18px 0;
    }


    .laundry-detail-item {
        padding: 13px;

        background: #f8fafc;

        border:
            1px solid #edf2f7;

        border-radius: 11px;
    }


    .laundry-detail-item small {
        display: block;

        margin-bottom: 5px;

        color: #64748b;

        font-size: 8px;

        font-weight: 600;

        text-transform: uppercase;
    }


    .laundry-detail-item strong {
        color: #0f172a;

        font-size: 11px;
    }


    .laundry-detail-item.total strong {
        color: #059669;
    }



    /* =========================================================
       TRACKING
    ========================================================= */

    .tracking-container {
        margin-top: 18px;

        padding: 19px;

        background:
            linear-gradient(
                135deg,
                #f8fafc,
                #eff6ff
            );

        border:
            1px solid #dbeafe;

        border-radius: 14px;
    }


    .tracking-header {
        display: flex;
        justify-content: space-between;
        align-items: center;

        gap: 10px;

        margin-bottom: 15px;

        flex-wrap: wrap;
    }


    .tracking-header strong {
        color: #0f172a;

        font-size: 11px;
    }


    .progress-text {
        color: #2563eb;

        font-size: 10px;

        font-weight: 800;
    }


    .progress-background {
        width: 100%;
        height: 8px;

        overflow: hidden;

        margin-bottom: 18px;

        background: #dbe3ed;

        border-radius: 20px;
    }


    .progress-bar {
        height: 100%;

        border-radius: 20px;

        background:
            linear-gradient(
                90deg,
                #2563eb,
                #0ea5e9
            );

        transition:
            width .4s ease;
    }


    .tracking-steps {
        display: grid;

        grid-template-columns:
            repeat(5, 1fr);

        gap: 7px;
    }


    .tracking-step {
        text-align: center;
    }


    .step-circle {
        width: 32px;
        height: 32px;

        margin:
            0 auto 6px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 50%;

        background: #e2e8f0;

        color: #64748b;

        font-size: 10px;

        font-weight: 800;
    }


    .tracking-step.completed
    .step-circle {
        background: #16a34a;

        color: white;
    }


    .tracking-step.active
    .step-circle {
        background: #2563eb;

        color: white;

        box-shadow:
            0 0 0 5px
            rgba(37,99,235,.10);
    }


    .tracking-step small {
        color: #64748b;

        font-size: 7px;

        font-weight: 700;
    }



    /* =========================================================
       STATUS ACTION
    ========================================================= */

    .status-action-box {
        display: flex;
        justify-content: space-between;
        align-items: center;

        gap: 15px;

        margin-top: 18px;

        padding-top: 17px;

        border-top:
            1px solid #edf2f7;

        flex-wrap: wrap;
    }


    .status-update-form {
        display: flex;
        align-items: center;

        gap: 8px;

        flex-wrap: wrap;
    }


    .status-update-form label {
        color: #475569;

        font-size: 9px;

        font-weight: 700;
    }


    .status-update-form select {
        min-width: 140px;

        padding: 8px 10px;

        border:
            1px solid #cbd5e1;

        border-radius: 8px;

        background: white;

        color: #334155;

        outline: none;

        font-size: 9px;

        cursor: pointer;
    }



    /* =========================================================
       EMPTY
    ========================================================= */

    .status-empty {
        padding: 50px 25px;

        background: white;

        border:
            1px solid #e8eef7;

        border-radius: 18px;

        text-align: center;

        box-shadow:
            0 7px 22px
            rgba(15,23,42,.05);
    }


    .status-empty-icon {
        margin-bottom: 10px;

        font-size: 45px;
    }


    .status-empty h2 {
        margin:
            0 0 6px;

        color: #0f172a;

        font-size: 18px;
    }


    .status-empty p {
        margin: 0;

        color: #94a3b8;

        font-size: 10px;
    }



    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media(max-width: 1100px) {

        .status-count-grid {
            grid-template-columns:
                repeat(4, 1fr);
        }


        .laundry-detail-grid {
            grid-template-columns:
                repeat(2, 1fr);
        }

    }


    @media(max-width: 850px) {

        .status-stats-grid {
            grid-template-columns:
                1fr;
        }


        .tracking-steps {
            grid-template-columns:
                repeat(3, 1fr);
        }

    }


    @media(max-width: 650px) {

        .status-header {
            align-items: flex-start;

            flex-direction: column;
        }


        .status-header-icon {
            display: none;
        }


        .status-count-grid {
            grid-template-columns:
                repeat(2, 1fr);
        }


        .laundry-detail-grid {
            grid-template-columns:
                1fr;
        }


        .status-search-form {
            flex-direction: column;

            align-items: stretch;
        }


        .tracking-steps {
            grid-template-columns:
                repeat(2, 1fr);
        }


        .status-action-box {
            align-items: stretch;

            flex-direction: column;
        }


        .status-update-form {
            align-items: stretch;

            flex-direction: column;
        }


        .status-update-form select {
            width: 100%;
        }

    }

</style>

@endpush



@section('content')


@php

    /*
    |--------------------------------------------------------------------------
    | STATUS COUNTS
    |--------------------------------------------------------------------------
    */

    $statusDiterima =
        $transaksis
            ->where(
                'status_laundry',
                'Diterima'
            )
            ->count();


    $statusDicuci =
        $transaksis
            ->where(
                'status_laundry',
                'Dicuci'
            )
            ->count();


    $statusDikeringkan =
        $transaksis
            ->where(
                'status_laundry',
                'Dikeringkan'
            )
            ->count();


    $statusDisetrika =
        $transaksis
            ->where(
                'status_laundry',
                'Disetrika'
            )
            ->count();


    $statusSelesaiDetail =
        $transaksis
            ->where(
                'status_laundry',
                'Selesai'
            )
            ->count();


    $statusDiambil =
        $transaksis
            ->where(
                'status_laundry',
                'Diambil'
            )
            ->count();


    $statusDikirim =
        $transaksis
            ->where(
                'status_laundry',
                'Dikirim'
            )
            ->count();

@endphp



<div class="status-page">


    <!-- =====================================================
         HEADER
    ====================================================== -->

    <section class="status-header">


        <div class="status-header-content">


            <h1>
                🔄 Status Laundry
            </h1>


            <p>

                Pantau seluruh proses cucian pelanggan
                mulai dari diterima, dicuci, dikeringkan,
                disetrika hingga selesai dan diserahkan
                kepada pelanggan.

            </p>


        </div>


        <div class="status-header-icon">

            🫧

        </div>


    </section>



    <!-- =====================================================
         SUCCESS MESSAGE
    ====================================================== -->

    @if(session('success'))

        <div class="status-alert">

            ✓ {{ session('success') }}

        </div>

    @endif



    <!-- =====================================================
         MAIN STATISTICS
    ====================================================== -->

    <div class="status-stats-grid">


        <!-- SEDANG DIPROSES -->

        <div class="status-stat-card">


            <div class="status-stat-top">

                <small>
                    Sedang Diproses
                </small>

                <div class="status-stat-icon">
                    🫧
                </div>

            </div>


            <h2>
                {{ $totalProses }}
            </h2>


            <p>
                Cucian masih dalam proses pengerjaan
            </p>


        </div>



        <!-- SIAP DIAMBIL -->

        <div
            class="
                status-stat-card
                stat-ready
            "
        >


            <div class="status-stat-top">

                <small>
                    Siap Diambil
                </small>

                <div class="status-stat-icon">
                    ✅
                </div>

            </div>


            <h2>
                {{ $totalSelesai }}
            </h2>


            <p>
                Cucian telah selesai diproses
            </p>


        </div>



        <!-- SELESAI -->

        <div
            class="
                status-stat-card
                stat-completed
            "
        >


            <div class="status-stat-top">

                <small>
                    Sudah Diserahkan
                </small>

                <div class="status-stat-icon">
                    🤝
                </div>

            </div>


            <h2>
                {{ $totalDiambil }}
            </h2>


            <p>
                Cucian telah diambil atau dikirim
            </p>


        </div>


    </div>



    <!-- =====================================================
         STATUS DETAIL
    ====================================================== -->

    <div class="status-count-grid">


        <div class="status-count-card">

            <span>📥</span>

            <strong>
                {{ $statusDiterima }}
            </strong>

            <small>
                Diterima
            </small>

        </div>



        <div class="status-count-card">

            <span>🫧</span>

            <strong>
                {{ $statusDicuci }}
            </strong>

            <small>
                Dicuci
            </small>

        </div>



        <div class="status-count-card">

            <span>💨</span>

            <strong>
                {{ $statusDikeringkan }}
            </strong>

            <small>
                Dikeringkan
            </small>

        </div>



        <div class="status-count-card">

            <span>👔</span>

            <strong>
                {{ $statusDisetrika }}
            </strong>

            <small>
                Disetrika
            </small>

        </div>



        <div class="status-count-card">

            <span>✅</span>

            <strong>
                {{ $statusSelesaiDetail }}
            </strong>

            <small>
                Selesai
            </small>

        </div>



        <div class="status-count-card">

            <span>🤝</span>

            <strong>
                {{ $statusDiambil }}
            </strong>

            <small>
                Diambil
            </small>

        </div>



        <div class="status-count-card">

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
         SEARCH
    ====================================================== -->

    <div class="status-search-panel">


        <div class="status-search-header">

            <h2>
                🔍 Cari Status Laundry
            </h2>

            <p>
                Cari berdasarkan kode transaksi atau nama pelanggan.
            </p>

        </div>



        <form
            method="GET"
            action="{{ route('status.index') }}"
            class="status-search-form"
        >


            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Contoh: TRX001 atau nama pelanggan..."
            >


            <button
                type="submit"
                class="
                    status-btn
                    btn-search
                "
            >
                🔍 Cari
            </button>


            @if(request('search'))

                <a
                    href="{{ route('status.index') }}"
                    class="
                        status-btn
                        btn-reset
                    "
                >
                    Reset
                </a>

            @endif


        </form>


    </div>



    <!-- =====================================================
         LIST TRANSAKSI
    ====================================================== -->

    <div class="laundry-list">


        @forelse(
            $transaksis
            as $transaksi
        )


            @php

                /*
                |--------------------------------------------------------------------------
                | ALUR STATUS
                |--------------------------------------------------------------------------
                */

                $alur = [
                    'Diterima',
                    'Dicuci',
                    'Dikeringkan',
                    'Disetrika',
                    'Selesai'
                ];


                $posisi =
                    array_search(
                        $transaksi
                            ->status_laundry,
                        $alur
                    );


                if (
                    in_array(
                        $transaksi
                            ->status_laundry,
                        [
                            'Diambil',
                            'Dikirim'
                        ]
                    )
                ) {

                    $posisi = 4;

                }


                if (
                    $posisi === false
                ) {

                    $posisi = 0;

                }


                $progress =
                    (
                        (
                            $posisi + 1
                        )
                        /
                        count($alur)
                    )
                    * 100;

            @endphp



            <div class="laundry-card">


                <div class="laundry-card-line"></div>


                <div class="laundry-card-content">


                    <!-- =========================================
                         TOP
                    ========================================== -->

                    <div class="laundry-card-top">


                        <div class="laundry-customer">


                            <div class="laundry-code">

                                🧾
                                {{
                                    $transaksi
                                        ->kode_transaksi
                                }}

                            </div>


                            <h3>

                                {{
                                    $transaksi
                                        ->pelanggan
                                        ->nama
                                    ?? '-'
                                }}

                            </h3>


                            <p>

                                📱
                                {{
                                    $transaksi
                                        ->pelanggan
                                        ->no_hp
                                    ?? '-'
                                }}

                            </p>


                        </div>



                        <div class="laundry-badges">


                            <!-- PAYMENT -->

                            @if(
                                $transaksi
                                    ->status_pembayaran
                                === 'Lunas'
                            )


                                <span
                                    class="
                                        laundry-badge
                                        badge-green
                                    "
                                >
                                    ✓ Lunas
                                </span>


                            @else


                                <span
                                    class="
                                        laundry-badge
                                        badge-red
                                    "
                                >
                                    Belum Lunas
                                </span>


                            @endif



                            <!-- STATUS -->

                            <span
                                class="
                                    laundry-badge
                                    badge-blue
                                "
                            >

                                {{
                                    $transaksi
                                        ->status_laundry
                                }}

                            </span>


                        </div>


                    </div>



                    <!-- =========================================
                         DETAIL
                    ========================================== -->

                    <div class="laundry-detail-grid">


                        <div class="laundry-detail-item">

                            <small>
                                Layanan
                            </small>

                            <strong>

                                {{
                                    $transaksi
                                        ->layanan
                                        ->nama_layanan
                                    ?? '-'
                                }}

                            </strong>

                        </div>



                        <div class="laundry-detail-item">

                            <small>
                                Berat
                            </small>

                            <strong>

                                {{
                                    $transaksi
                                        ->berat
                                }}
                                Kg

                            </strong>

                        </div>



                        <div
                            class="
                                laundry-detail-item
                                total
                            "
                        >

                            <small>
                                Total
                            </small>

                            <strong>

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

                            </strong>

                        </div>



                        <div class="laundry-detail-item">

                            <small>
                                Pengambilan
                            </small>

                            <strong>


                                @if(
                                    $transaksi
                                        ->jenis_pengambilan
                                    === 'kirim'
                                )

                                    🚚 Kirim

                                @else

                                    🏠 Ambil Sendiri

                                @endif


                            </strong>

                        </div>


                    </div>



                    <!-- =========================================
                         TRACKING
                    ========================================== -->

                    <div class="tracking-container">


                        <div class="tracking-header">


                            <strong>
                                🔄 Progress Laundry
                            </strong>


                            <span class="progress-text">

                                {{ round($progress) }}%

                            </span>


                        </div>



                        <div class="progress-background">


                            <div
                                class="progress-bar"
                                style="
                                    width:
                                    {{ $progress }}%;
                                "
                            ></div>


                        </div>



                        <div class="tracking-steps">


                            @foreach(
                                $alur
                                as $index => $status
                            )


                                <div
                                    class="
                                        tracking-step

                                        {{
                                            $index
                                            < $posisi
                                            ? 'completed'
                                            : ''
                                        }}

                                        {{
                                            $index
                                            === $posisi
                                            ? 'active'
                                            : ''
                                        }}
                                    "
                                >


                                    <div class="step-circle">


                                        @if(
                                            $index
                                            < $posisi
                                        )

                                            ✓

                                        @else

                                            {{
                                                $index + 1
                                            }}

                                        @endif


                                    </div>


                                    <small>

                                        {{ $status }}

                                    </small>


                                </div>


                            @endforeach


                        </div>


                    </div>



                    <!-- =========================================
                         ACTION
                    ========================================== -->

                    <div class="status-action-box">


                        <form
                            method="POST"
                            action="{{
                                route(
                                    'transaksi.status',
                                    $transaksi
                                )
                            }}"
                            class="status-update-form"
                        >

                            @csrf


                            <label>
                                Ubah Status:
                            </label>


                            <select
                                name="status_laundry"
                                onchange="
                                    this.form.submit()
                                "
                            >


                                @foreach([
                                    'Diterima',
                                    'Dicuci',
                                    'Dikeringkan',
                                    'Disetrika',
                                    'Selesai',
                                    'Diambil',
                                    'Dikirim'
                                ] as $status)


                                    <option
                                        value="{{ $status }}"

                                        {{
                                            $transaksi
                                                ->status_laundry
                                            === $status
                                            ? 'selected'
                                            : ''
                                        }}
                                    >

                                        {{ $status }}

                                    </option>


                                @endforeach


                            </select>


                        </form>



                        <a
                            href="{{
                                route(
                                    'transaksi.show',
                                    $transaksi
                                )
                            }}"
                            class="
                                status-btn
                                btn-detail
                            "
                        >

                            👁 Detail Transaksi

                        </a>


                    </div>


                </div>


            </div>


        @empty


            <div class="status-empty">


                <div class="status-empty-icon">

                    🧺

                </div>


                <h2>

                    @if(request('search'))

                        Transaksi Tidak Ditemukan

                    @else

                        Belum Ada Transaksi

                    @endif

                </h2>


                <p>

                    @if(request('search'))

                        Tidak ada transaksi yang sesuai
                        dengan pencarian
                        "{{ request('search') }}".

                    @else

                        Transaksi laundry akan muncul
                        di halaman ini setelah dibuat.

                    @endif

                </p>


            </div>


        @endforelse


    </div>


</div>


@endsection