@extends('layouts.app')

@section('title', 'Transaksi - Tania Mutiara Laundry')


@push('styles')

<style>

    /* =========================================================
       TRANSAKSI PREMIUM
    ========================================================= */

    .transaction-page {
        width: 100%;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .transaction-header {
        display: flex;
        justify-content: space-between;
        align-items: center;

        gap: 20px;

        margin-bottom: 24px;

        flex-wrap: wrap;
    }


    .transaction-header h1 {
        margin: 0 0 6px;

        color: #0f172a;

        font-size: 28px;
    }


    .transaction-header p {
        margin: 0;

        color: #64748b;

        font-size: 13px;
    }


    .header-badge {
        display: inline-flex;
        align-items: center;
        gap: 7px;

        padding: 9px 14px;

        background: #eff6ff;

        color: #1d4ed8;

        border:
            1px solid #bfdbfe;

        border-radius: 30px;

        font-size: 11px;

        font-weight: 700;
    }



    /* =========================================================
       ALERT
    ========================================================= */

    .transaction-alert-success {
        margin-bottom: 20px;

        padding: 13px 15px;

        background: #dcfce7;

        color: #166534;

        border:
            1px solid #bbf7d0;

        border-radius: 11px;

        font-size: 13px;
    }


    .transaction-alert-error {
        margin-bottom: 20px;

        padding: 14px 16px;

        background: #fee2e2;

        color: #991b1b;

        border:
            1px solid #fecaca;

        border-radius: 11px;

        font-size: 12px;
    }


    .transaction-alert-error ul {
        margin:
            8px 0 0;

        padding-left: 20px;
    }



    /* =========================================================
       STATS
    ========================================================= */

    .transaction-stats {
        display: grid;

        grid-template-columns:
            repeat(3, 1fr);

        gap: 16px;

        margin-bottom: 24px;
    }


    .transaction-stat-card {
        position: relative;

        overflow: hidden;

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


    .transaction-stat-card:hover {
        transform:
            translateY(-3px);

        box-shadow:
            0 15px 32px
            rgba(15,23,42,.10);
    }


    .transaction-stat-card::after {
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


    .stat-top {
        display: flex;
        justify-content: space-between;
        align-items: center;

        margin-bottom: 13px;
    }


    .stat-top small {
        color: #64748b;

        font-size: 10px;

        font-weight: 700;

        text-transform: uppercase;

        letter-spacing: .4px;
    }


    .stat-icon {
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


    .transaction-stat-card h2 {
        margin:
            0 0 5px;

        color: #0f172a;

        font-size: 26px;
    }


    .transaction-stat-card p {
        margin: 0;

        color: #94a3b8;

        font-size: 10px;
    }


    .stat-unpaid h2 {
        color: #e11d48;
    }


    .stat-income h2 {
        color: #059669;

        font-size: 22px;
    }



    /* =========================================================
       PANEL
    ========================================================= */

    .transaction-panel {
        margin-bottom: 24px;

        padding: 24px;

        background: white;

        border:
            1px solid #e8eef7;

        border-radius: 20px;

        box-shadow:
            0 8px 25px
            rgba(15,23,42,.06);
    }


    .panel-title {
        display: flex;
        justify-content: space-between;
        align-items: center;

        gap: 15px;

        margin-bottom: 22px;

        flex-wrap: wrap;
    }


    .panel-title h2 {
        margin: 0;

        color: #0f172a;

        font-size: 18px;
    }


    .panel-title p {
        margin:
            5px 0 0;

        color: #94a3b8;

        font-size: 10px;
    }



    /* =========================================================
       FORM
    ========================================================= */

    .transaction-form-grid {
        display: grid;

        grid-template-columns:
            repeat(2, 1fr);

        gap: 17px;
    }


    .transaction-form-group {
        margin-bottom: 3px;
    }


    .transaction-form-group.full {
        grid-column:
            1 / -1;
    }


    .transaction-form-group label {
        display: block;

        margin-bottom: 7px;

        color: #334155;

        font-size: 12px;

        font-weight: 700;
    }


    .transaction-form-group input,
    .transaction-form-group select,
    .transaction-form-group textarea {
        width: 100%;

        padding: 11px 12px;

        background: #fff;

        border:
            1px solid #cbd5e1;

        border-radius: 9px;

        outline: none;

        color: #1e293b;

        font-size: 12px;

        transition: .2s;
    }


    .transaction-form-group input:focus,
    .transaction-form-group select:focus,
    .transaction-form-group textarea:focus {
        border-color: #2563eb;

        box-shadow:
            0 0 0 3px
            rgba(37,99,235,.09);
    }


    .transaction-form-group textarea {
        resize: vertical;
    }



    /* =========================================================
       TOTAL
    ========================================================= */

    .total-preview-box {
        position: relative;

        overflow: hidden;

        padding: 19px;

        background:
            linear-gradient(
                135deg,
                #eff6ff,
                #f0f9ff
            );

        border:
            1px solid #bfdbfe;

        border-radius: 14px;
    }


    .total-preview-box small {
        color: #64748b;

        font-size: 10px;

        font-weight: 700;

        text-transform: uppercase;
    }


    .total-preview-box h2 {
        margin:
            7px 0 0;

        color: #1d4ed8;

        font-size: 27px;
    }



    /* =========================================================
       QRIS
    ========================================================= */

    .qris-box {
        display: none;

        padding: 20px;

        background: #f8fafc;

        border:
            2px dashed #cbd5e1;

        border-radius: 14px;

        text-align: center;
    }


    .qris-box img {
        max-width: 180px;

        border-radius: 10px;
    }


    .qris-placeholder {
        width: 150px;
        height: 150px;

        margin:
            0 auto 10px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: white;

        border:
            2px solid #0f172a;

        border-radius: 8px;

        color: #0f172a;

        font-size: 23px;

        font-weight: 800;
    }


    .qris-box small {
        color: #64748b;

        font-size: 10px;
    }



    /* =========================================================
       BUTTON
    ========================================================= */

    .transaction-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        gap: 5px;

        padding: 9px 13px;

        border: none;

        border-radius: 9px;

        cursor: pointer;

        text-decoration: none;

        font-size: 10px;

        font-weight: 700;

        transition: .2s;
    }


    .transaction-btn:hover {
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


    .btn-success {
        background: #16a34a;

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
        margin-top: 18px;

        padding: 12px 18px;

        font-size: 12px;
    }



    /* =========================================================
       FILTER
    ========================================================= */

    .filter-box {
        display: grid;

        grid-template-columns:
            minmax(220px, 2fr)
            minmax(160px, 1fr)
            minmax(170px, 1fr)
            auto;

        gap: 10px;

        align-items: end;

        margin-bottom: 20px;

        padding: 15px;

        background: #f8fafc;

        border:
            1px solid #edf2f7;

        border-radius: 14px;
    }


    .filter-group label {
        display: block;

        margin-bottom: 6px;

        color: #64748b;

        font-size: 9px;

        font-weight: 700;

        text-transform: uppercase;
    }


    .filter-group input,
    .filter-group select {
        width: 100%;

        padding: 9px 10px;

        background: white;

        border:
            1px solid #cbd5e1;

        border-radius: 8px;

        outline: none;

        font-size: 11px;
    }


    .filter-actions {
        display: flex;

        gap: 6px;
    }



    /* =========================================================
       TABLE
    ========================================================= */

    .transaction-table-wrapper {
        width: 100%;

        overflow-x: auto;
    }


    .transaction-table {
        width: 100%;

        min-width: 1250px;

        border-collapse: collapse;
    }


    .transaction-table th {
        padding: 11px;

        background: #f8fafc;

        border-bottom:
            1px solid #e2e8f0;

        color: #64748b;

        text-align: left;

        font-size: 9px;

        text-transform: uppercase;

        letter-spacing: .3px;
    }


    .transaction-table td {
        padding: 13px 11px;

        border-bottom:
            1px solid #f1f5f9;

        color: #334155;

        vertical-align: middle;

        font-size: 11px;
    }


    .transaction-table tbody tr:hover {
        background: #f8fafc;
    }


    .transaction-code {
        color: #2563eb;

        font-weight: 800;
    }


    .customer-name {
        color: #0f172a;

        font-weight: 700;
    }


    .customer-phone {
        display: block;

        margin-top: 3px;

        color: #94a3b8;

        font-size: 9px;
    }


    .transaction-total {
        color: #0f172a;

        font-weight: 800;
    }



    /* =========================================================
       BADGE
    ========================================================= */

    .transaction-badge {
        display: inline-flex;
        align-items: center;

        padding: 5px 9px;

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


    .badge-purple {
        background: #f3e8ff;

        color: #7e22ce;
    }



    /* =========================================================
       PAYMENT
    ========================================================= */

    .payment-action {
        margin-top: 8px;
    }


    .payment-form {
        display: flex;

        gap: 5px;

        align-items: center;
    }


    .payment-form select {
        width: 90px;

        padding: 7px;

        border:
            1px solid #cbd5e1;

        border-radius: 7px;

        font-size: 9px;
    }



    /* =========================================================
       STATUS SELECT
    ========================================================= */

    .status-select {
        min-width: 115px;

        padding: 7px;

        border:
            1px solid #cbd5e1;

        border-radius: 8px;

        background: white;

        color: #334155;

        font-size: 9px;

        cursor: pointer;
    }



    /* =========================================================
       ACTION
    ========================================================= */

    .transaction-action {
        display: flex;

        align-items: center;

        gap: 5px;

        flex-wrap: wrap;
    }


    .transaction-action form {
        margin: 0;
    }



    /* =========================================================
       EMPTY
    ========================================================= */

    .empty-transaction {
        padding: 35px !important;

        text-align: center !important;

        color: #94a3b8 !important;
    }



    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media(max-width: 1100px) {

        .transaction-stats {
            grid-template-columns:
                repeat(2, 1fr);
        }


        .filter-box {
            grid-template-columns:
                repeat(2, 1fr);
        }


        .filter-actions {
            grid-column:
                1 / -1;
        }

    }


    @media(max-width: 700px) {

        .transaction-stats {
            grid-template-columns:
                1fr;
        }


        .transaction-form-grid {
            grid-template-columns:
                1fr;
        }


        .transaction-form-group.full {
            grid-column:
                auto;
        }


        .filter-box {
            grid-template-columns:
                1fr;
        }


        .filter-actions {
            grid-column:
                auto;
        }

    }

</style>

@endpush



@section('content')


<div class="transaction-page">


    <!-- =====================================================
         HEADER
    ====================================================== -->

    <div class="transaction-header">


        <div>

            <h1>
                🧾 Transaksi Laundry
            </h1>

            <p>
                Kelola pesanan, pembayaran, pengiriman,
                status laundry dan cetak struk pelanggan.
            </p>

        </div>


        <div class="header-badge">

            🧺 Sistem Transaksi Laundry

        </div>


    </div>



    <!-- =====================================================
         ALERT SUCCESS
    ====================================================== -->

    @if(session('success'))

        <div class="transaction-alert-success">

            ✓ {{ session('success') }}

        </div>

    @endif



    <!-- =====================================================
         VALIDATION ERROR
    ====================================================== -->

    @if($errors->any())

        <div class="transaction-alert-error">

            <strong>
                Data transaksi belum benar.
            </strong>

            <ul>

                @foreach($errors->all() as $error)

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

    <div class="transaction-stats">


        <!-- TOTAL -->

        <div class="transaction-stat-card">


            <div class="stat-top">

                <small>
                    Total Transaksi
                </small>

                <div class="stat-icon">
                    🧾
                </div>

            </div>


            <h2>
                {{ $totalTransaksi }}
            </h2>


            <p>
                Seluruh transaksi laundry
            </p>


        </div>



        <!-- BELUM LUNAS -->

        <div class="transaction-stat-card stat-unpaid">


            <div class="stat-top">

                <small>
                    Belum Lunas
                </small>

                <div class="stat-icon">
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



        <!-- PENDAPATAN -->

        <div class="transaction-stat-card stat-income">


            <div class="stat-top">

                <small>
                    Pendapatan Lunas
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
                Total transaksi yang sudah dibayar
            </p>


        </div>


    </div>



    <!-- =====================================================
         FORM TAMBAH TRANSAKSI
    ====================================================== -->

    <div class="transaction-panel">


        <div class="panel-title">

            <div>

                <h2>
                    ➕ Tambah Transaksi Baru
                </h2>

                <p>
                    Masukkan data pesanan laundry pelanggan.
                </p>

            </div>

        </div>



        <form
            method="POST"
            action="{{ route('transaksi.store') }}"
        >

            @csrf


            <div class="transaction-form-grid">


                <!-- PELANGGAN -->

                <div class="transaction-form-group">

                    <label>
                        👤 Pelanggan
                    </label>


                    <select
                        name="pelanggan_id"
                        required
                    >

                        <option value="">
                            -- Pilih Pelanggan --
                        </option>


                        @foreach($pelanggans as $pelanggan)

                            <option
                                value="{{ $pelanggan->id }}"

                                {{
                                    old('pelanggan_id')
                                    == $pelanggan->id
                                    ? 'selected'
                                    : ''
                                }}
                            >

                                {{ $pelanggan->nama }}

                                @if($pelanggan->no_hp)
                                    - {{ $pelanggan->no_hp }}
                                @endif

                            </option>

                        @endforeach

                    </select>

                </div>



                <!-- LAYANAN -->

                <div class="transaction-form-group">

                    <label>
                        👕 Layanan
                    </label>


                    <select
                        name="layanan_id"
                        id="layanan"
                        required
                    >

                        <option
                            value=""
                            data-harga="0"
                        >
                            -- Pilih Layanan --
                        </option>


                        @foreach($layanans as $layanan)

                            <option
                                value="{{ $layanan->id }}"

                                data-harga="{{ $layanan->harga }}"

                                {{
                                    old('layanan_id')
                                    == $layanan->id
                                    ? 'selected'
                                    : ''
                                }}
                            >

                                {{ $layanan->nama_layanan }}

                                -
                                Rp
                                {{
                                    number_format(
                                        $layanan->harga,
                                        0,
                                        ',',
                                        '.'
                                    )
                                }}

                            </option>

                        @endforeach

                    </select>

                </div>



                <!-- BERAT -->

                <div class="transaction-form-group">

                    <label>
                        ⚖️ Berat Laundry (Kg)
                    </label>


                    <input
                        type="number"
                        name="berat"
                        id="berat"
                        step="0.1"
                        min="0.1"
                        value="{{ old('berat') }}"
                        placeholder="Contoh: 3.5"
                        required
                    >

                </div>



                <!-- TANGGAL SELESAI -->

                <div class="transaction-form-group">

                    <label>
                        📅 Perkiraan Selesai
                    </label>


                    <input
                        type="date"
                        name="tanggal_selesai"
                        value="{{ old('tanggal_selesai') }}"
                    >

                </div>



                <!-- PENGAMBILAN -->

                <div class="transaction-form-group">

                    <label>
                        🚚 Jenis Pengambilan
                    </label>


                    <select
                        name="jenis_pengambilan"
                        id="jenisPengambilan"
                    >

                        <option
                            value="ambil_sendiri"

                            {{
                                old(
                                    'jenis_pengambilan',
                                    'ambil_sendiri'
                                )
                                === 'ambil_sendiri'
                                ? 'selected'
                                : ''
                            }}
                        >
                            Ambil Sendiri
                        </option>


                        <option
                            value="kirim"

                            {{
                                old('jenis_pengambilan')
                                === 'kirim'
                                ? 'selected'
                                : ''
                            }}
                        >
                            Kirim ke Alamat
                        </option>

                    </select>

                </div>



                <!-- ALAMAT -->

                <div
                    class="transaction-form-group"
                    id="alamatBox"
                    style="display:none;"
                >

                    <label>
                        📍 Alamat Pengiriman
                    </label>


                    <textarea
                        name="alamat_kirim"
                        rows="2"
                        placeholder="Masukkan alamat pengiriman"
                    >{{ old('alamat_kirim') }}</textarea>

                </div>



                <!-- CARA BAYAR -->

                <div class="transaction-form-group">

                    <label>
                        💳 Pembayaran
                    </label>


                    <select
                        name="cara_bayar"
                        id="caraBayar"
                    >

                        <option
                            value="langsung"

                            {{
                                old(
                                    'cara_bayar',
                                    'langsung'
                                )
                                === 'langsung'
                                ? 'selected'
                                : ''
                            }}
                        >
                            Langsung Bayar
                        </option>


                        <option
                            value="nanti"

                            {{
                                old('cara_bayar')
                                === 'nanti'
                                ? 'selected'
                                : ''
                            }}
                        >
                            Bayar Nanti
                        </option>

                    </select>

                </div>



                <!-- METODE PEMBAYARAN -->

                <div
                    class="transaction-form-group"
                    id="metodeBox"
                >

                    <label>
                        💵 Metode Pembayaran
                    </label>


                    <select
                        name="metode_pembayaran"
                        id="metodePembayaran"
                    >

                        <option
                            value="Tunai"

                            {{
                                old(
                                    'metode_pembayaran',
                                    'Tunai'
                                )
                                === 'Tunai'
                                ? 'selected'
                                : ''
                            }}
                        >
                            Tunai
                        </option>


                        <option
                            value="Transfer"

                            {{
                                old('metode_pembayaran')
                                === 'Transfer'
                                ? 'selected'
                                : ''
                            }}
                        >
                            Transfer
                        </option>


                        <option
                            value="QRIS"

                            {{
                                old('metode_pembayaran')
                                === 'QRIS'
                                ? 'selected'
                                : ''
                            }}
                        >
                            QRIS
                        </option>

                    </select>

                </div>



                <!-- QRIS -->

                <div
                    class="
                        transaction-form-group
                        full
                        qris-box
                    "
                    id="qrisBox"
                >

                    @if(
                        file_exists(
                            public_path(
                                'images/qris.png'
                            )
                        )
                    )

                        <img
                            src="{{ asset('images/qris.png') }}"
                            alt="QRIS Tania Mutiara Laundry"
                        >

                        <br>

                        <small>
                            Scan QRIS untuk melakukan pembayaran.
                        </small>

                    @else

                        <div class="qris-placeholder">
                            QRIS
                        </div>

                        <small>
                            Tambahkan gambar QRIS ke
                            public/images/qris.png
                        </small>

                    @endif

                </div>



                <!-- CATATAN -->

                <div
                    class="
                        transaction-form-group
                        full
                    "
                >

                    <label>
                        📝 Catatan
                    </label>


                    <textarea
                        name="catatan"
                        rows="3"
                        placeholder="Contoh: jangan gunakan pewangi terlalu banyak..."
                    >{{ old('catatan') }}</textarea>

                </div>



                <!-- TOTAL -->

                <div
                    class="
                        transaction-form-group
                        full
                    "
                >

                    <div class="total-preview-box">

                        <small>
                            Estimasi Total Pembayaran
                        </small>

                        <h2 id="totalPreview">
                            Rp 0
                        </h2>

                    </div>

                </div>


            </div>



            <button
                type="submit"
                class="
                    transaction-btn
                    btn-primary
                    btn-save
                "
            >
                💾 Simpan Transaksi
            </button>


        </form>


    </div>



    <!-- =====================================================
         DAFTAR TRANSAKSI
    ====================================================== -->

    <div class="transaction-panel">


        <div class="panel-title">

            <div>

                <h2>
                    📋 Daftar Transaksi
                </h2>

                <p>
                    Cari, filter dan kelola seluruh transaksi laundry.
                </p>

            </div>

        </div>



        <!-- =================================================
             FILTER
        ================================================== -->

        <form
            action="{{ route('transaksi.index') }}"
            method="GET"
            class="filter-box"
        >


            <!-- SEARCH -->

            <div class="filter-group">

                <label>
                    Cari Transaksi
                </label>

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Kode transaksi atau nama pelanggan..."
                >

            </div>



            <!-- FILTER PEMBAYARAN -->

            <div class="filter-group">

                <label>
                    Pembayaran
                </label>

                <select name="status_pembayaran">

                    <option value="">
                        Semua Pembayaran
                    </option>

                    <option
                        value="Lunas"

                        {{
                            request('status_pembayaran')
                            === 'Lunas'
                            ? 'selected'
                            : ''
                        }}
                    >
                        Lunas
                    </option>

                    <option
                        value="Belum Lunas"

                        {{
                            request('status_pembayaran')
                            === 'Belum Lunas'
                            ? 'selected'
                            : ''
                        }}
                    >
                        Belum Lunas
                    </option>

                </select>

            </div>



            <!-- FILTER STATUS -->

            <div class="filter-group">

                <label>
                    Status Laundry
                </label>

                <select name="status_laundry">

                    <option value="">
                        Semua Status
                    </option>


                    @foreach([
                        'Diterima',
                        'Dicuci',
                        'Dikeringkan',
                        'Disetrika',
                        'Selesai',
                        'Diambil',
                        'Dikirim'
                    ] as $filterStatus)

                        <option
                            value="{{ $filterStatus }}"

                            {{
                                request('status_laundry')
                                === $filterStatus
                                ? 'selected'
                                : ''
                            }}
                        >
                            {{ $filterStatus }}
                        </option>

                    @endforeach

                </select>

            </div>



            <!-- ACTION FILTER -->

            <div class="filter-actions">

                <button
                    type="submit"
                    class="
                        transaction-btn
                        btn-primary
                    "
                >
                    🔍 Filter
                </button>


                @if(
                    request('search')
                    ||
                    request('status_pembayaran')
                    ||
                    request('status_laundry')
                )

                    <a
                        href="{{ route('transaksi.index') }}"
                        class="
                            transaction-btn
                            btn-secondary
                        "
                    >
                        Reset
                    </a>

                @endif

            </div>


        </form>



        <!-- =================================================
             TABLE
        ================================================== -->

        <div class="transaction-table-wrapper">


            <table class="transaction-table">


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
                            Berat
                        </th>

                        <th>
                            Total
                        </th>

                        <th>
                            Pengambilan
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
                    $transaksis
                    as $transaksi
                )


                    <tr>


                        <!-- KODE -->

                        <td>

                            <span class="transaction-code">

                                {{
                                    $transaksi
                                        ->kode_transaksi
                                }}

                            </span>

                        </td>



                        <!-- PELANGGAN -->

                        <td>

                            <span class="customer-name">

                                {{
                                    $transaksi
                                        ->pelanggan
                                        ->nama
                                    ?? '-'
                                }}

                            </span>


                            <span class="customer-phone">

                                {{
                                    $transaksi
                                        ->pelanggan
                                        ->no_hp
                                    ?? '-'
                                }}

                            </span>

                        </td>



                        <!-- LAYANAN -->

                        <td>

                            {{
                                $transaksi
                                    ->layanan
                                    ->nama_layanan
                                ?? '-'
                            }}

                        </td>



                        <!-- BERAT -->

                        <td>

                            {{
                                $transaksi->berat
                            }}
                            Kg

                        </td>



                        <!-- TOTAL -->

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



                        <!-- PENGAMBILAN -->

                        <td>


                            @if(
                                $transaksi
                                    ->jenis_pengambilan
                                === 'kirim'
                            )

                                <span
                                    class="
                                        transaction-badge
                                        badge-blue
                                    "
                                >
                                    🚚 Kirim
                                </span>

                            @else

                                <span
                                    class="
                                        transaction-badge
                                        badge-orange
                                    "
                                >
                                    🏠 Ambil Sendiri
                                </span>

                            @endif


                        </td>



                        <!-- PEMBAYARAN -->

                        <td>


                            @if(
                                $transaksi
                                    ->status_pembayaran
                                === 'Lunas'
                            )

                                <span
                                    class="
                                        transaction-badge
                                        badge-green
                                    "
                                >
                                    ✓ Lunas
                                </span>


                                <div
                                    style="
                                        margin-top:5px;
                                        font-size:9px;
                                        color:#64748b;
                                    "
                                >

                                    {{
                                        $transaksi
                                            ->metode_pembayaran
                                        ?? '-'
                                    }}

                                </div>


                            @else


                                <span
                                    class="
                                        transaction-badge
                                        badge-red
                                    "
                                >
                                    Belum Lunas
                                </span>


                                <div class="payment-action">


                                    <form
                                        method="POST"
                                        action="{{
                                            route(
                                                'transaksi.bayar',
                                                $transaksi
                                            )
                                        }}"
                                        class="payment-form"
                                    >

                                        @csrf


                                        <select
                                            name="metode_pembayaran"
                                            required
                                        >

                                            <option value="Tunai">
                                                Tunai
                                            </option>

                                            <option value="Transfer">
                                                Transfer
                                            </option>

                                            <option value="QRIS">
                                                QRIS
                                            </option>

                                        </select>


                                        <button
                                            type="submit"
                                            class="
                                                transaction-btn
                                                btn-success
                                            "
                                        >
                                            Bayar
                                        </button>


                                    </form>


                                </div>


                            @endif


                        </td>



                        <!-- STATUS -->

                        <td>


                            <form
                                method="POST"
                                action="{{
                                    route(
                                        'transaksi.status',
                                        $transaksi
                                    )
                                }}"
                            >

                                @csrf


                                <select
                                    name="status_laundry"
                                    class="status-select"
                                    onchange="this.form.submit()"
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


                        </td>



                        <!-- AKSI -->

                        <td>


                            <div class="transaction-action">


                                <!-- DETAIL -->

                                <a
                                    href="{{
                                        route(
                                            'transaksi.show',
                                            $transaksi
                                        )
                                    }}"
                                    class="
                                        transaction-btn
                                        btn-info
                                    "
                                >
                                    👁 Detail
                                </a>



                                <!-- EDIT -->

                                <a
                                    href="{{
                                        route(
                                            'transaksi.edit',
                                            $transaksi
                                        )
                                    }}"
                                    class="
                                        transaction-btn
                                        btn-warning
                                    "
                                >
                                    ✏️ Edit
                                </a>



                                <!-- DELETE -->

                                <form
                                    method="POST"
                                    action="{{
                                        route(
                                            'transaksi.destroy',
                                            $transaksi
                                        )
                                    }}"

                                    onsubmit="
                                        return confirm(
                                            'Yakin ingin menghapus transaksi ini?'
                                        )
                                    "
                                >

                                    @csrf

                                    @method('DELETE')


                                    <button
                                        type="submit"
                                        class="
                                            transaction-btn
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
                            colspan="9"
                            class="empty-transaction"
                        >

                            @if(
                                request('search')
                                ||
                                request('status_pembayaran')
                                ||
                                request('status_laundry')
                            )

                                🔍 Tidak ada transaksi
                                yang sesuai dengan filter.

                            @else

                                🧺 Belum ada transaksi laundry.

                            @endif

                        </td>

                    </tr>


                @endforelse


                </tbody>


            </table>


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
        | TOTAL OTOMATIS
        |--------------------------------------------------------------------------
        */

        const layanan =
            document.getElementById(
                'layanan'
            );


        const berat =
            document.getElementById(
                'berat'
            );


        const totalPreview =
            document.getElementById(
                'totalPreview'
            );


        function hitungTotal()
        {
            if (
                !layanan
                ||
                !berat
                ||
                !totalPreview
            ) {
                return;
            }


            const option =
                layanan.options[
                    layanan.selectedIndex
                ];


            const harga =
                Number(
                    option
                        ?.dataset
                        ?.harga
                    || 0
                );


            const jumlahBerat =
                Number(
                    berat.value
                    || 0
                );


            const total =
                harga *
                jumlahBerat;


            totalPreview.innerText =
                'Rp ' +
                new Intl.NumberFormat(
                    'id-ID'
                ).format(
                    Math.round(total)
                );
        }


        if (layanan) {

            layanan.addEventListener(
                'change',
                hitungTotal
            );

        }


        if (berat) {

            berat.addEventListener(
                'input',
                hitungTotal
            );

        }



        /*
        |--------------------------------------------------------------------------
        | JENIS PENGAMBILAN
        |--------------------------------------------------------------------------
        */

        const jenisPengambilan =
            document.getElementById(
                'jenisPengambilan'
            );


        const alamatBox =
            document.getElementById(
                'alamatBox'
            );


        function cekPengambilan()
        {
            if (
                !jenisPengambilan
                ||
                !alamatBox
            ) {
                return;
            }


            alamatBox.style.display =
                jenisPengambilan.value
                === 'kirim'
                    ? 'block'
                    : 'none';
        }


        if (jenisPengambilan) {

            jenisPengambilan.addEventListener(
                'change',
                cekPengambilan
            );

        }



        /*
        |--------------------------------------------------------------------------
        | PEMBAYARAN
        |--------------------------------------------------------------------------
        */

        const caraBayar =
            document.getElementById(
                'caraBayar'
            );


        const metodeBox =
            document.getElementById(
                'metodeBox'
            );


        const metodePembayaran =
            document.getElementById(
                'metodePembayaran'
            );


        const qrisBox =
            document.getElementById(
                'qrisBox'
            );


        function cekQris()
        {
            if (
                !qrisBox
                ||
                !caraBayar
                ||
                !metodePembayaran
            ) {
                return;
            }


            qrisBox.style.display =
                (
                    caraBayar.value
                    === 'langsung'

                    &&

                    metodePembayaran.value
                    === 'QRIS'
                )
                    ? 'block'
                    : 'none';
        }


        function cekPembayaran()
        {
            if (
                !caraBayar
                ||
                !metodeBox
            ) {
                return;
            }


            if (
                caraBayar.value
                === 'nanti'
            ) {

                metodeBox.style.display =
                    'none';


                if (qrisBox) {

                    qrisBox.style.display =
                        'none';

                }

            } else {

                metodeBox.style.display =
                    'block';


                cekQris();

            }
        }


        if (caraBayar) {

            caraBayar.addEventListener(
                'change',
                cekPembayaran
            );

        }


        if (metodePembayaran) {

            metodePembayaran.addEventListener(
                'change',
                cekQris
            );

        }



        /*
        |--------------------------------------------------------------------------
        | INITIAL STATE
        |--------------------------------------------------------------------------
        */

        hitungTotal();

        cekPengambilan();

        cekPembayaran();

    }
);

</script>

@endpush