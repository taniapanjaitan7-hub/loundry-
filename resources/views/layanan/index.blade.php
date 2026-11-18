@extends('layouts.app')

@section('title', 'Layanan - Tania Mutiara Laundry')


@push('styles')

<style>

    /* =========================================================
       LAYANAN PREMIUM
    ========================================================= */

    .service-page {
        width: 100%;
    }


    /* =========================================================
       HERO
    ========================================================= */

    .service-hero {
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


    .service-hero::before {
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


    .service-hero::after {
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


    .service-hero-content {
        position: relative;
        z-index: 2;

        max-width: 650px;
    }


    .service-hero h1 {
        margin:
            0 0 8px;

        font-size: 29px;
    }


    .service-hero p {
        margin: 0;

        color:
            rgba(255,255,255,.84);

        font-size: 12px;

        line-height: 1.7;
    }


    .service-hero-icon {
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

    .service-alert-success {
        margin-bottom: 20px;

        padding: 13px 15px;

        background: #dcfce7;

        border:
            1px solid #bbf7d0;

        border-radius: 11px;

        color: #166534;

        font-size: 11px;
    }


    .service-alert-error {
        margin-bottom: 20px;

        padding: 14px 16px;

        background: #fee2e2;

        border:
            1px solid #fecaca;

        border-radius: 11px;

        color: #991b1b;

        font-size: 11px;
    }


    .service-alert-error ul {
        margin:
            8px 0 0;

        padding-left: 20px;
    }



    /* =========================================================
       STATISTICS
    ========================================================= */

    .service-stats-grid {
        display: grid;

        grid-template-columns:
            repeat(3, 1fr);

        gap: 16px;

        margin-bottom: 25px;
    }


    .service-stat-card {
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


    .service-stat-card:hover {
        transform:
            translateY(-3px);

        box-shadow:
            0 14px 30px
            rgba(15,23,42,.10);
    }


    .service-stat-card::after {
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


    .service-stat-top {
        display: flex;
        justify-content: space-between;
        align-items: center;

        margin-bottom: 13px;
    }


    .service-stat-top small {
        color: #64748b;

        font-size: 9px;
        font-weight: 700;

        text-transform: uppercase;

        letter-spacing: .5px;
    }


    .service-stat-icon {
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


    .service-stat-card h2 {
        margin:
            0 0 5px;

        color: #0f172a;

        font-size: 27px;
    }


    .service-stat-card p {
        margin: 0;

        color: #94a3b8;

        font-size: 9px;
    }


    .stat-price h2 {
        color: #059669;

        font-size: 21px;
    }


    .stat-estimation h2 {
        color: #2563eb;
    }



    /* =========================================================
       MAIN GRID
    ========================================================= */

    .service-main-grid {
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

    .service-panel {
        padding: 22px;

        background: white;

        border:
            1px solid #e8eef7;

        border-radius: 19px;

        box-shadow:
            0 8px 25px
            rgba(15,23,42,.06);
    }


    .service-panel-header {
        display: flex;
        justify-content: space-between;
        align-items: center;

        gap: 12px;

        margin-bottom: 20px;

        flex-wrap: wrap;
    }


    .service-panel-header h2 {
        margin: 0;

        color: #0f172a;

        font-size: 17px;
    }


    .service-panel-header p {
        margin:
            5px 0 0;

        color: #94a3b8;

        font-size: 9px;

        line-height: 1.5;
    }



    /* =========================================================
       FORM
    ========================================================= */

    .service-form-group {
        margin-bottom: 15px;
    }


    .service-form-group label {
        display: block;

        margin-bottom: 7px;

        color: #334155;

        font-size: 11px;

        font-weight: 700;
    }


    .service-form-group input {
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


    .service-form-group input:focus {
        border-color: #2563eb;

        box-shadow:
            0 0 0 3px
            rgba(37,99,235,.09);
    }


    .service-form-note {
        margin-top: -4px;
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

    .service-btn {
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


    .service-btn:hover {
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

    .service-search {
        margin-bottom: 18px;

        padding: 14px;

        background: #f8fafc;

        border:
            1px solid #edf2f7;

        border-radius: 13px;
    }


    .service-search-row {
        display: flex;

        gap: 7px;

        align-items: center;
    }


    .service-search-row input {
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


    .service-search-row input:focus {
        border-color: #2563eb;

        box-shadow:
            0 0 0 3px
            rgba(37,99,235,.07);
    }


    .search-info {
        margin-top: 9px;

        color: #64748b;

        font-size: 8px;
    }



    /* =========================================================
       SERVICE CARDS
    ========================================================= */

    .service-list {
        display: grid;

        grid-template-columns:
            repeat(2, minmax(0, 1fr));

        gap: 13px;
    }


    .service-card {
        position: relative;
        overflow: hidden;

        padding: 17px;

        background: white;

        border:
            1px solid #e8eef7;

        border-radius: 15px;

        box-shadow:
            0 5px 17px
            rgba(15,23,42,.04);

        transition: .2s;
    }


    .service-card:hover {
        transform:
            translateY(-2px);

        border-color: #bfdbfe;

        box-shadow:
            0 10px 22px
            rgba(15,23,42,.08);
    }


    .service-card::after {
        content: "";

        position: absolute;

        width: 75px;
        height: 75px;

        right: -35px;
        top: -35px;

        border-radius: 50%;

        background:
            rgba(37,99,235,.05);
    }


    .service-card-top {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;

        gap: 12px;

        margin-bottom: 14px;
    }


    .service-card-icon {
        width: 42px;
        height: 42px;

        display: flex;
        align-items: center;
        justify-content: center;

        flex-shrink: 0;

        background:
            linear-gradient(
                135deg,
                #dbeafe,
                #e0f2fe
            );

        border-radius: 12px;

        font-size: 19px;
    }


    .service-card-title {
        flex: 1;
    }


    .service-card-title h3 {
        margin:
            0 0 4px;

        color: #0f172a;

        font-size: 13px;
    }


    .service-card-title small {
        color: #94a3b8;

        font-size: 8px;
    }


    .service-price {
        margin-bottom: 12px;

        color: #059669;

        font-size: 18px;

        font-weight: 800;
    }


    .service-price small {
        color: #64748b;

        font-size: 8px;

        font-weight: 500;
    }


    .service-card-detail {
        display: flex;
        justify-content: space-between;
        align-items: center;

        gap: 10px;

        margin-bottom: 14px;

        padding: 10px;

        background: #f8fafc;

        border:
            1px solid #edf2f7;

        border-radius: 9px;
    }


    .service-card-detail span {
        color: #64748b;

        font-size: 8px;
    }


    .service-card-detail strong {
        color: #1d4ed8;

        font-size: 9px;
    }


    .service-card-actions {
        display: flex;

        gap: 6px;

        flex-wrap: wrap;
    }


    .service-card-actions form {
        margin: 0;
    }



    /* =========================================================
       BADGE
    ========================================================= */

    .service-badge {
        display: inline-flex;
        align-items: center;

        padding: 5px 8px;

        background: #dcfce7;

        border-radius: 20px;

        color: #166534;

        font-size: 8px;

        font-weight: 700;
    }



    /* =========================================================
       EMPTY
    ========================================================= */

    .service-empty {
        grid-column:
            1 / -1;

        padding: 45px 20px;

        background: #f8fafc;

        border:
            1px dashed #cbd5e1;

        border-radius: 14px;

        text-align: center;

        color: #94a3b8;
    }


    .service-empty span {
        display: block;

        margin-bottom: 8px;

        font-size: 40px;
    }


    .service-empty h3 {
        margin:
            0 0 5px;

        color: #475569;

        font-size: 14px;
    }


    .service-empty p {
        margin: 0;

        font-size: 9px;
    }



    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media(max-width: 1100px) {

        .service-main-grid {
            grid-template-columns:
                1fr;
        }

    }


    @media(max-width: 800px) {

        .service-stats-grid {
            grid-template-columns:
                1fr;
        }


        .service-list {
            grid-template-columns:
                1fr;
        }

    }


    @media(max-width: 650px) {

        .service-hero {
            align-items: flex-start;

            flex-direction: column;
        }


        .service-hero-icon {
            display: none;
        }


        .service-search-row {
            flex-direction: column;

            align-items: stretch;
        }


        .service-search-row
        .service-btn {
            width: 100%;
        }

    }

</style>

@endpush



@section('content')


@php

    /*
    |--------------------------------------------------------------------------
    | STATISTIK LAYANAN
    |--------------------------------------------------------------------------
    */

    $totalLayanan =
        $layanans->count();


    $rataHarga =
        $totalLayanan > 0
            ? $layanans->avg('harga')
            : 0;


    $layananTermahal =
        $totalLayanan > 0
            ? $layanans->sortByDesc('harga')->first()
            : null;

@endphp



<div class="service-page">


    <!-- =====================================================
         HERO
    ====================================================== -->

    <section class="service-hero">


        <div class="service-hero-content">

            <h1>
                👕 Data Layanan
            </h1>

            <p>
                Kelola jenis layanan, harga, dan estimasi
                pengerjaan Tania Mutiara Laundry agar proses
                transaksi menjadi lebih cepat dan terstruktur.
            </p>

        </div>


        <div class="service-hero-icon">

            🫧

        </div>


    </section>



    <!-- =====================================================
         SUCCESS
    ====================================================== -->

    @if(session('success'))

        <div class="service-alert-success">

            ✓ {{ session('success') }}

        </div>

    @endif



    <!-- =====================================================
         ERRORS
    ====================================================== -->

    @if($errors->any())

        <div class="service-alert-error">

            <strong>
                Data layanan belum benar:
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
         STATS
    ====================================================== -->

    <div class="service-stats-grid">


        <!-- TOTAL -->

        <div class="service-stat-card">


            <div class="service-stat-top">

                <small>
                    Total Layanan
                </small>

                <div class="service-stat-icon">
                    👕
                </div>

            </div>


            <h2>
                {{ $totalLayanan }}
            </h2>


            <p>
                Jenis layanan yang tersedia
            </p>


        </div>



        <!-- AVERAGE PRICE -->

        <div
            class="
                service-stat-card
                stat-price
            "
        >


            <div class="service-stat-top">

                <small>
                    Rata-Rata Harga
                </small>

                <div class="service-stat-icon">
                    💰
                </div>

            </div>


            <h2>

                Rp
                {{
                    number_format(
                        $rataHarga,
                        0,
                        ',',
                        '.'
                    )
                }}

            </h2>


            <p>
                Rata-rata harga seluruh layanan
            </p>


        </div>



        <!-- MOST EXPENSIVE -->

        <div
            class="
                service-stat-card
                stat-estimation
            "
        >


            <div class="service-stat-top">

                <small>
                    Harga Tertinggi
                </small>

                <div class="service-stat-icon">
                    ⭐
                </div>

            </div>


            <h2>

                @if($layananTermahal)

                    Rp
                    {{
                        number_format(
                            $layananTermahal->harga,
                            0,
                            ',',
                            '.'
                        )
                    }}

                @else

                    Rp 0

                @endif

            </h2>


            <p>

                @if($layananTermahal)

                    {{ $layananTermahal->nama_layanan }}

                @else

                    Belum ada layanan

                @endif

            </p>


        </div>


    </div>



    <!-- =====================================================
         MAIN
    ====================================================== -->

    <div class="service-main-grid">


        <!-- =================================================
             FORM TAMBAH
        ================================================== -->

        <div class="service-panel">


            <div class="service-panel-header">


                <div>

                    <h2>
                        ➕ Tambah Layanan
                    </h2>

                    <p>
                        Tambahkan jenis layanan laundry baru.
                    </p>

                </div>


            </div>



            <form
                action="{{
                    route(
                        'layanan.store'
                    )
                }}"
                method="POST"
            >

                @csrf



                <!-- NAME -->

                <div class="service-form-group">


                    <label>
                        👕 Nama Layanan
                    </label>


                    <input
                        type="text"
                        name="nama_layanan"
                        value="{{ old('nama_layanan') }}"
                        placeholder="Contoh: Cuci Setrika"
                        required
                    >


                </div>



                <!-- PRICE -->

                <div class="service-form-group">


                    <label>
                        💰 Harga Layanan
                    </label>


                    <input
                        type="number"
                        name="harga"
                        value="{{ old('harga') }}"
                        placeholder="Contoh: 10000"
                        min="0"
                        step="1"
                        required
                    >


                </div>



                <!-- ESTIMATION -->

                <div class="service-form-group">


                    <label>
                        ⏱ Estimasi Pengerjaan
                    </label>


                    <input
                        type="text"
                        name="estimasi"
                        value="{{ old('estimasi') }}"
                        placeholder="Contoh: 2 Hari"
                    >


                </div>



                <div class="service-form-note">

                    💡 Gunakan nama layanan yang mudah
                    dipahami pelanggan. Harga akan digunakan
                    ketika membuat transaksi laundry.

                </div>



                <button
                    type="submit"
                    class="
                        service-btn
                        btn-primary
                        btn-save
                    "
                >

                    💾 Simpan Layanan

                </button>


            </form>


        </div>



        <!-- =================================================
             LIST
        ================================================== -->

        <div class="service-panel">


            <div class="service-panel-header">


                <div>

                    <h2>
                        📋 Daftar Layanan
                    </h2>

                    <p>
                        Lihat dan kelola semua layanan laundry.
                    </p>

                </div>


                <span class="service-badge">

                    ●
                    {{ $totalLayanan }}
                    Layanan

                </span>


            </div>



            <!-- =============================================
                 CLIENT SEARCH
            ============================================== -->

            <div class="service-search">


                <div class="service-search-row">


                    <input
                        type="text"
                        id="serviceSearch"
                        placeholder="Cari nama layanan atau estimasi..."
                    >


                    <button
                        type="button"
                        id="serviceReset"
                        class="
                            service-btn
                            btn-secondary
                        "
                    >

                        Reset

                    </button>


                </div>


                <div class="search-info">

                    🔍 Pencarian dilakukan langsung
                    pada daftar layanan di halaman ini.

                </div>


            </div>



            <!-- =============================================
                 SERVICE CARDS
            ============================================== -->

            <div
                class="service-list"
                id="serviceList"
            >


                @forelse(
                    $layanans
                    as $layanan
                )


                    <div
                        class="service-card"

                        data-search="{{
                            strtolower(
                                $layanan->nama_layanan
                                . ' '
                                . ($layanan->estimasi ?? '')
                                . ' '
                                . $layanan->harga
                            )
                        }}"
                    >


                        <div class="service-card-top">


                            <div class="service-card-icon">

                                👕

                            </div>



                            <div class="service-card-title">


                                <h3>

                                    {{
                                        $layanan
                                            ->nama_layanan
                                    }}

                                </h3>


                                <small>

                                    ID Layanan
                                    #{{ $layanan->id }}

                                </small>


                            </div>


                        </div>



                        <div class="service-price">

                            Rp
                            {{
                                number_format(
                                    $layanan->harga,
                                    0,
                                    ',',
                                    '.'
                                )
                            }}

                            <small>
                                / layanan
                            </small>

                        </div>



                        <div class="service-card-detail">


                            <span>
                                ⏱ Estimasi
                            </span>


                            <strong>

                                {{
                                    $layanan
                                        ->estimasi
                                    ?? 'Belum ditentukan'
                                }}

                            </strong>


                        </div>



                        <div class="service-card-actions">


                            <a
                                href="{{
                                    route(
                                        'layanan.edit',
                                        $layanan
                                    )
                                }}"
                                class="
                                    service-btn
                                    btn-warning
                                "
                            >

                                ✏️ Edit

                            </a>



                            <form
                                action="{{
                                    route(
                                        'layanan.destroy',
                                        $layanan
                                    )
                                }}"
                                method="POST"

                                onsubmit="
                                    return confirm(
                                        'Yakin ingin menghapus layanan {{ addslashes($layanan->nama_layanan) }}?'
                                    )
                                "
                            >

                                @csrf

                                @method('DELETE')


                                <button
                                    type="submit"
                                    class="
                                        service-btn
                                        btn-danger
                                    "
                                >

                                    🗑 Hapus

                                </button>


                            </form>


                        </div>


                    </div>


                @empty


                    <div class="service-empty">


                        <span>
                            🧺
                        </span>


                        <h3>
                            Belum ada layanan
                        </h3>


                        <p>
                            Tambahkan layanan pertama
                            melalui form di sebelah kiri.
                        </p>


                    </div>


                @endforelse


            </div>



            <!-- SEARCH EMPTY -->

            <div
                class="service-empty"
                id="searchEmpty"
                style="display:none; margin-top:13px;"
            >

                <span>
                    🔍
                </span>

                <h3>
                    Layanan tidak ditemukan
                </h3>

                <p>
                    Coba gunakan kata pencarian lainnya.
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

        const searchInput =
            document.getElementById(
                'serviceSearch'
            );


        const resetButton =
            document.getElementById(
                'serviceReset'
            );


        const cards =
            document.querySelectorAll(
                '.service-card'
            );


        const emptyBox =
            document.getElementById(
                'searchEmpty'
            );


        /*
        |--------------------------------------------------------------------------
        | FILTER SERVICE
        |--------------------------------------------------------------------------
        */

        function filterServices()
        {
            const keyword =
                searchInput
                    .value
                    .toLowerCase()
                    .trim();


            let visible =
                0;


            cards.forEach(
                function (card) {

                    const text =
                        card.dataset.search
                        || '';


                    if (
                        text.includes(
                            keyword
                        )
                    ) {

                        card.style.display =
                            '';

                        visible++;

                    } else {

                        card.style.display =
                            'none';

                    }

                }
            );


            if (
                emptyBox
            ) {

                emptyBox.style.display =
                    (
                        cards.length > 0
                        &&
                        visible === 0
                    )
                    ? 'block'
                    : 'none';

            }

        }


        if (
            searchInput
        ) {

            searchInput.addEventListener(
                'input',
                filterServices
            );

        }


        /*
        |--------------------------------------------------------------------------
        | RESET SEARCH
        |--------------------------------------------------------------------------
        */

        if (
            resetButton
            &&
            searchInput
        ) {

            resetButton.addEventListener(
                'click',
                function () {

                    searchInput.value =
                        '';

                    filterServices();

                    searchInput.focus();

                }
            );

        }

    }
);

</script>

@endpush