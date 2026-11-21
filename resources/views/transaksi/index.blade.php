@extends('layouts.app')

@section('title', 'Transaksi - Tania Mutiara Laundry')

@push('styles')

<style>
    .tx-page {
        width: 100%;
    }

    /* =====================================================
       HERO
    ====================================================== */

    .tx-hero {
        position: relative;
        overflow: hidden;

        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 20px;

        padding: 30px;

        margin-bottom: 22px;

        border-radius: 24px;

        background:
            linear-gradient(
                115deg,
                rgba(8, 35, 85, .97),
                rgba(37, 99, 235, .91),
                rgba(14, 165, 233, .72)
            ),
            url("{{ asset('images/laundry-bg.png') }}");

        background-size: cover;
        background-position: center;

        color: white;

        box-shadow:
            0 18px 45px
            rgba(15,23,42,.16);
    }

    .tx-hero::after {
        content: "";

        position: absolute;

        width: 250px;
        height: 250px;

        right: -90px;
        top: -130px;

        border-radius: 50%;

        background:
            rgba(255,255,255,.09);
    }

    .tx-hero-content {
        position: relative;
        z-index: 2;
    }

    .tx-hero h1 {
        margin:
            0 0 7px;

        color: white;

        font-size: 29px;
        font-weight: 900;
    }

    .tx-hero p {
        max-width: 700px;

        margin: 0;

        color:
            rgba(255,255,255,.87);

        font-size: 11px;

        line-height: 1.7;
    }

    .tx-hero-badge {
        position: relative;
        z-index: 2;

        padding:
            10px 14px;

        border:
            1px solid
            rgba(255,255,255,.24);

        border-radius: 30px;

        background:
            rgba(255,255,255,.15);

        color: white;

        font-size: 9px;
        font-weight: 800;

        white-space: nowrap;
    }

    /* =====================================================
       ALERT
    ====================================================== */

    .tx-alert {
        margin-bottom: 18px;

        padding:
            13px 15px;

        border-radius: 11px;

        font-size: 11px;
    }

    .tx-alert-success {
        border:
            1px solid #bbf7d0;

        background: #dcfce7;

        color: #166534;
    }

    .tx-alert-error {
        border:
            1px solid #fecaca;

        background: #fee2e2;

        color: #991b1b;
    }

    .tx-alert-error ul {
        margin:
            8px 0 0;

        padding-left: 20px;
    }

    /* =====================================================
       STAT
    ====================================================== */

    .tx-stats {
        display: grid;

        grid-template-columns:
            repeat(3, 1fr);

        gap: 14px;

        margin-bottom: 22px;
    }

    .tx-stat {
        position: relative;
        overflow: hidden;

        padding: 20px;

        border:
            1px solid #e7edf6;

        border-radius: 18px;

        background:
            linear-gradient(
                145deg,
                #ffffff,
                #f8fafc
            );

        box-shadow:
            0 8px 24px
            rgba(15,23,42,.06);

        transition: .2s;
    }

    .tx-stat:hover {
        transform:
            translateY(-4px);

        box-shadow:
            0 15px 32px
            rgba(15,23,42,.10);
    }

    .tx-stat-top {
        display: flex;
        align-items: center;
        justify-content: space-between;

        margin-bottom: 12px;
    }

    .tx-stat-top small {
        color: #64748b;

        font-size: 8px;
        font-weight: 800;

        text-transform: uppercase;
    }

    .tx-stat-icon {
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

    .tx-stat h2 {
        margin:
            0 0 5px;

        color: #0f172a;

        font-size: 25px;
        font-weight: 900;
    }

    .tx-stat p {
        margin: 0;

        color: #94a3b8;

        font-size: 9px;

        line-height: 1.5;
    }

    .tx-stat-green h2 {
        color: #059669;
    }

    .tx-stat-red h2 {
        color: #e11d48;
    }

    .tx-stat-purple h2 {
        color: #7c3aed;
    }

    .tx-stat-blue h2 {
        color: #2563eb;
    }

    /* =====================================================
       PANEL
    ====================================================== */

    .tx-panel {
        margin-bottom: 22px;

        padding: 23px;

        border:
            1px solid #e7edf6;

        border-radius: 20px;

        background:
            rgba(255,255,255,.98);

        box-shadow:
            0 8px 25px
            rgba(15,23,42,.06);
    }

    .tx-panel-title {
        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 15px;

        margin-bottom: 20px;

        flex-wrap: wrap;
    }

    .tx-panel-title h2 {
        margin: 0;

        color: #0f172a;

        font-size: 17px;
        font-weight: 900;
    }

    .tx-panel-title p {
        margin:
            5px 0 0;

        color: #94a3b8;

        font-size: 9px;
    }

    /* =====================================================
       FORM
    ====================================================== */

    .tx-form-grid {
        display: grid;

        grid-template-columns:
            repeat(2, 1fr);

        gap: 15px;
    }

    .tx-group.full {
        grid-column:
            1 / -1;
    }

    .tx-group label {
        display: block;

        margin-bottom: 6px;

        color: #334155;

        font-size: 10px;
        font-weight: 800;
    }

    .tx-group input,
    .tx-group select,
    .tx-group textarea {
        width: 100%;

        padding:
            10px 11px;

        border:
            1px solid #cbd5e1;

        border-radius: 9px;

        background: white;

        color: #1e293b;

        outline: none;

        font-size: 10px;

        transition: .2s;
    }

    .tx-group input:focus,
    .tx-group select:focus,
    .tx-group textarea:focus {
        border-color: #2563eb;

        box-shadow:
            0 0 0 3px
            rgba(37,99,235,.08);
    }

    .tx-group textarea {
        resize: vertical;
    }

    /* =====================================================
       TOTAL
    ====================================================== */

    .tx-total-box {
        padding: 18px;

        border:
            1px solid #bfdbfe;

        border-radius: 14px;

        background:
            linear-gradient(
                135deg,
                #eff6ff,
                #f0f9ff
            );
    }

    .tx-total-box small {
        color: #64748b;

        font-size: 8px;
        font-weight: 800;

        text-transform: uppercase;
    }

    .tx-total-box h2 {
        margin:
            7px 0 0;

        color: #1d4ed8;

        font-size: 26px;
        font-weight: 900;
    }

    /* =====================================================
       QRIS
    ====================================================== */

    .tx-qris {
        display: none;

        padding: 19px;

        border:
            2px dashed #cbd5e1;

        border-radius: 14px;

        background: #f8fafc;

        text-align: center;
    }

    .tx-qris img {
        width: 170px;
        max-width: 100%;

        border-radius: 10px;
    }

    .tx-qris-placeholder {
        width: 145px;
        height: 145px;

        margin:
            0 auto 10px;

        display: flex;
        align-items: center;
        justify-content: center;

        border:
            2px solid #0f172a;

        border-radius: 9px;

        background: white;

        color: #0f172a;

        font-size: 22px;
        font-weight: 900;
    }

    .tx-qris small {
        color: #64748b;

        font-size: 9px;
    }

    /* =====================================================
       BUTTON
    ====================================================== */

    .tx-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        gap: 5px;

        padding:
            9px 12px;

        border: none;

        border-radius: 8px;

        cursor: pointer;

        text-decoration: none;

        font-size: 9px;
        font-weight: 800;

        transition: .2s;
    }

    .tx-btn:hover {
        transform:
            translateY(-1px);
    }

    .tx-btn-primary {
        background: #2563eb;
        color: white;
    }

    .tx-btn-success {
        background: #16a34a;
        color: white;
    }

    .tx-btn-info {
        background: #0ea5e9;
        color: white;
    }

    .tx-btn-warning {
        background: #f59e0b;
        color: white;
    }

    .tx-btn-danger {
        background: #dc2626;
        color: white;
    }

    .tx-btn-secondary {
        background: #64748b;
        color: white;
    }

    .tx-submit {
        margin-top: 17px;

        padding:
            12px 17px;

        font-size: 10px;
    }

    /* =====================================================
       FILTER
    ====================================================== */

    .tx-filter {
        display: grid;

        grid-template-columns:
            minmax(180px, 1.5fr)
            repeat(5, minmax(120px, 1fr));

        gap: 9px;

        align-items: end;

        margin-bottom: 15px;

        padding: 15px;

        border:
            1px solid #edf2f7;

        border-radius: 14px;

        background: #f8fafc;
    }

    .tx-filter-group label {
        display: block;

        margin-bottom: 5px;

        color: #64748b;

        font-size: 8px;
        font-weight: 800;

        text-transform: uppercase;
    }

    .tx-filter-group input,
    .tx-filter-group select {
        width: 100%;

        padding:
            9px 9px;

        border:
            1px solid #cbd5e1;

        border-radius: 8px;

        background: white;

        outline: none;

        font-size: 9px;
    }

    .tx-filter-actions {
        grid-column:
            1 / -1;

        display: flex;
        justify-content: flex-end;

        gap: 7px;

        padding-top: 3px;
    }

    .tx-filter-result {
        display: flex;
        align-items: center;
        justify-content: space-between;

        gap: 10px;

        margin-bottom: 15px;

        padding:
            10px 12px;

        border-radius: 10px;

        background: #eff6ff;

        color: #1e40af;

        font-size: 9px;
    }

    /* =====================================================
       TABLE
    ====================================================== */

    .tx-table-wrapper {
        width: 100%;

        overflow-x: auto;
    }

    .tx-table {
        width: 100%;

        min-width: 1450px;

        border-collapse: collapse;
    }

    .tx-table th {
        padding:
            11px 9px;

        border-bottom:
            1px solid #e2e8f0;

        background: #f8fafc;

        color: #64748b;

        text-align: left;

        font-size: 8px;
        font-weight: 800;

        text-transform: uppercase;
    }

    .tx-table td {
        padding:
            12px 9px;

        border-bottom:
            1px solid #f1f5f9;

        color: #334155;

        vertical-align: middle;

        font-size: 9px;
    }

    .tx-table tbody tr:hover {
        background: #f8fafc;
    }

    .tx-code {
        color: #2563eb;

        font-weight: 900;
    }

    .tx-customer {
        color: #0f172a;

        font-weight: 800;
    }

    .tx-phone {
        display: block;

        margin-top: 3px;

        color: #94a3b8;

        font-size: 8px;
    }

    .tx-total {
        color: #0f172a;

        font-weight: 900;
    }

    /* =====================================================
       BADGE
    ====================================================== */

    .tx-badge {
        display: inline-flex;
        align-items: center;

        padding:
            5px 8px;

        border-radius: 20px;

        font-size: 8px;
        font-weight: 800;
    }

    .tx-green {
        background: #dcfce7;
        color: #166534;
    }

    .tx-red {
        background: #fee2e2;
        color: #991b1b;
    }

    .tx-blue {
        background: #dbeafe;
        color: #1d4ed8;
    }

    .tx-orange {
        background: #ffedd5;
        color: #9a3412;
    }

    /* =====================================================
       PAYMENT
    ====================================================== */

    .tx-payment-form {
        display: flex;
        align-items: center;

        gap: 5px;

        margin-top: 7px;
    }

    .tx-payment-form select {
        width: 85px;

        padding: 6px;

        border:
            1px solid #cbd5e1;

        border-radius: 7px;

        font-size: 8px;
    }

    /* =====================================================
       STATUS
    ====================================================== */

    .tx-status-select {
        min-width: 115px;

        padding: 7px;

        border:
            1px solid #cbd5e1;

        border-radius: 8px;

        background: white;

        font-size: 8px;

        cursor: pointer;
    }

    /* =====================================================
       ACTION
    ====================================================== */

    .tx-actions {
        display: flex;
        align-items: center;

        gap: 5px;

        flex-wrap: wrap;
    }

    .tx-actions form {
        margin: 0;
    }

    .tx-empty {
        padding:
            38px !important;

        color:
            #94a3b8 !important;

        text-align:
            center !important;
    }

    /* =====================================================
       RESPONSIVE
    ====================================================== */

    @media(max-width: 1250px) {

        .tx-stats {
            grid-template-columns:
                repeat(2, 1fr);
        }

        .tx-filter {
            grid-template-columns:
                repeat(2, 1fr);
        }
    }

    @media(max-width: 700px) {

        .tx-hero {
            align-items: flex-start;
            flex-direction: column;

            padding:
                24px 20px;
        }

        .tx-hero h1 {
            font-size: 23px;
        }

        .tx-hero-badge {
            width: 100%;

            text-align: center;
        }

        .tx-stats {
            grid-template-columns:
                1fr;
        }

        .tx-form-grid {
            grid-template-columns:
                1fr;
        }

        .tx-group.full {
            grid-column: auto;
        }

        .tx-filter {
            grid-template-columns:
                1fr;
        }

        .tx-filter-actions {
            grid-column: auto;

            justify-content: flex-start;

            flex-wrap: wrap;
        }

        .tx-filter-result {
            align-items: flex-start;
            flex-direction: column;
        }
    }
</style>

@endpush


@section('content')

<div class="tx-page">

    <!-- =====================================================
         HERO
    ====================================================== -->

    <div class="tx-hero">

        <div class="tx-hero-content">

            <h1>
                🧾 Transaksi Laundry
            </h1>

            <p>
                Kelola transaksi pelanggan, pembayaran,
                pengiriman, proses laundry dan struk
                Tania Mutiara Laundry dalam satu halaman.
            </p>

        </div>

        <div class="tx-hero-badge">
            🧺 Sistem Transaksi Aktif
        </div>

    </div>


    <!-- =====================================================
         ALERT
    ====================================================== -->

    @if(session('success'))

        <div class="tx-alert tx-alert-success">

            ✓ {{ session('success') }}

        </div>

    @endif


    @if($errors->any())

        <div class="tx-alert tx-alert-error">

            <strong>
                ⚠ Ada data yang perlu diperbaiki.
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
         STATISTIK
    ====================================================== -->

    <div class="tx-stats">

        <div class="tx-stat">

            <div class="tx-stat-top">

                <small>
                    Total Transaksi
                </small>

                <div class="tx-stat-icon">
                    🧾
                </div>

            </div>

            <h2>
                {{ $totalTransaksi }}
            </h2>

            <p>
                Seluruh transaksi yang tersimpan.
            </p>

        </div>


        <div class="tx-stat tx-stat-purple">

            <div class="tx-stat-top">

                <small>
                    Transaksi Hari Ini
                </small>

                <div class="tx-stat-icon">
                    📅
                </div>

            </div>

            <h2>
                {{ $transaksiHariIni }}
            </h2>

            <p>
                Pesanan yang masuk hari ini.
            </p>

        </div>


        <div class="tx-stat tx-stat-blue">

            <div class="tx-stat-top">

                <small>
                    Sedang Diproses
                </small>

                <div class="tx-stat-icon">
                    🫧
                </div>

            </div>

            <h2>
                {{ $transaksiAktif }}
            </h2>

            <p>
                Laundry yang belum diselesaikan.
            </p>

        </div>


        <div class="tx-stat tx-stat-green">

            <div class="tx-stat-top">

                <small>
                    Sudah Lunas
                </small>

                <div class="tx-stat-icon">
                    ✅
                </div>

            </div>

            <h2>
                {{ $totalLunas }}
            </h2>

            <p>
                Transaksi yang telah dibayar.
            </p>

        </div>


        <div class="tx-stat tx-stat-red">

            <div class="tx-stat-top">

                <small>
                    Belum Lunas
                </small>

                <div class="tx-stat-icon">
                    💳
                </div>

            </div>

            <h2>
                {{ $belumLunas }}
            </h2>

            <p>

                Tagihan Rp
                {{
                    number_format(
                        $nominalBelumLunas,
                        0,
                        ',',
                        '.'
                    )
                }}

            </p>

        </div>


        <div class="tx-stat tx-stat-green">

            <div class="tx-stat-top">

                <small>
                    Total Pendapatan
                </small>

                <div class="tx-stat-icon">
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
                Dari seluruh transaksi Lunas.
            </p>

        </div>

    </div>


    <!-- =====================================================
         TAMBAH TRANSAKSI
    ====================================================== -->

    <div class="tx-panel">

        <div class="tx-panel-title">

            <div>

                <h2>
                    ➕ Tambah Transaksi Baru
                </h2>

                <p>
                    Isi data pesanan pelanggan.
                </p>

            </div>

        </div>


        <form
            action="{{ route('transaksi.store') }}"
            method="POST"
            id="transactionForm"
        >

            @csrf


            <div class="tx-form-grid">

                <!-- PELANGGAN -->

                <div class="tx-group">

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

                <div class="tx-group">

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

                <div class="tx-group">

                    <label>
                        ⚖️ Berat Laundry (Kg)
                    </label>

                    <input
                        type="number"
                        name="berat"
                        id="berat"
                        min="0.1"
                        max="1000"
                        step="0.1"
                        value="{{ old('berat') }}"
                        placeholder="Contoh: 3.5"
                        required
                    >

                </div>


                <!-- PERKIRAAN SELESAI -->

                <div class="tx-group">

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

                <div class="tx-group">

                    <label>
                        🚚 Jenis Pengambilan
                    </label>

                    <select
                        name="jenis_pengambilan"
                        id="jenisPengambilan"
                        required
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
                            🏠 Ambil Sendiri
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
                            🚚 Kirim ke Alamat
                        </option>

                    </select>

                </div>


                <!-- ALAMAT -->

                <div
                    class="tx-group"
                    id="alamatBox"
                    style="display:none;"
                >

                    <label>
                        📍 Alamat Pengiriman
                    </label>

                    <textarea
                        name="alamat_kirim"
                        id="alamatKirim"
                        rows="2"
                        placeholder="Masukkan alamat lengkap pengiriman"
                    >{{ old('alamat_kirim') }}</textarea>

                </div>


                <!-- CARA BAYAR -->

                <div class="tx-group">

                    <label>
                        💳 Cara Pembayaran
                    </label>

                    <select
                        name="cara_bayar"
                        id="caraBayar"
                        required
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


                <!-- METODE -->

                <div
                    class="tx-group"
                    id="metodeBox"
                >

                    <label>
                        💵 Metode Pembayaran
                    </label>

                    <select
                        name="metode_pembayaran"
                        id="metodePembayaran"
                    >

                        @foreach([
                            'Tunai',
                            'Transfer',
                            'QRIS'
                        ] as $metode)

                            <option
                                value="{{ $metode }}"

                                {{
                                    old(
                                        'metode_pembayaran',
                                        'Tunai'
                                    )
                                    === $metode
                                    ? 'selected'
                                    : ''
                                }}
                            >

                                {{ $metode }}

                            </option>

                        @endforeach

                    </select>

                </div>


                <!-- QRIS -->

                <div
                    class="
                        tx-group
                        full
                        tx-qris
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
                            src="{{
                                asset(
                                    'images/qris.png'
                                )
                            }}"
                            alt="QRIS Tania Mutiara Laundry"
                        >

                        <br>

                        <small>
                            Scan QRIS untuk melakukan pembayaran.
                        </small>

                    @else

                        <div class="tx-qris-placeholder">
                            QRIS
                        </div>

                        <small>
                            Simpan gambar QRIS sebagai
                            public/images/qris.png
                        </small>

                    @endif

                </div>


                <!-- CATATAN -->

                <div class="tx-group full">

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

                <div class="tx-group full">

                    <div class="tx-total-box">

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
                    tx-btn
                    tx-btn-primary
                    tx-submit
                "
                id="saveTransaction"
            >
                💾 Simpan Transaksi
            </button>

        </form>

    </div>


    <!-- =====================================================
         DAFTAR TRANSAKSI
    ====================================================== -->

    <div class="tx-panel">

        <div class="tx-panel-title">

            <div>

                <h2>
                    📋 Daftar Transaksi
                </h2>

                <p>
                    Cari, filter dan kelola transaksi laundry.
                </p>

            </div>

        </div>


        <!-- FILTER -->

        <form
            action="{{ route('transaksi.index') }}"
            method="GET"
            class="tx-filter"
        >

            <div class="tx-filter-group">

                <label>
                    🔎 Cari
                </label>

                <input
                    type="text"
                    name="search"
                    value="{{ $search }}"
                    placeholder="Kode, nama, HP atau layanan..."
                >

            </div>


            <div class="tx-filter-group">

                <label>
                    💳 Pembayaran
                </label>

                <select name="status_pembayaran">

                    <option value="">
                        Semua
                    </option>

                    <option
                        value="Lunas"

                        {{
                            $statusPembayaran
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
                            $statusPembayaran
                            === 'Belum Lunas'
                            ? 'selected'
                            : ''
                        }}
                    >
                        Belum Lunas
                    </option>

                </select>

            </div>


            <div class="tx-filter-group">

                <label>
                    🫧 Status Laundry
                </label>

                <select name="status_laundry">

                    <option value="">
                        Semua
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
                                $statusLaundry
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


            <div class="tx-filter-group">

                <label>
                    🚚 Pengambilan
                </label>

                <select name="jenis_pengambilan">

                    <option value="">
                        Semua
                    </option>

                    <option
                        value="ambil_sendiri"

                        {{
                            $jenisPengambilan
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
                            $jenisPengambilan
                            === 'kirim'
                            ? 'selected'
                            : ''
                        }}
                    >
                        Kirim
                    </option>

                </select>

            </div>


            <div class="tx-filter-group">

                <label>
                    📅 Dari
                </label>

                <input
                    type="date"
                    name="tanggal_mulai"
                    value="{{ $tanggalMulai }}"
                >

            </div>


            <div class="tx-filter-group">

                <label>
                    📅 Sampai
                </label>

                <input
                    type="date"
                    name="tanggal_akhir"
                    value="{{ $tanggalAkhir }}"
                >

            </div>


            <div class="tx-filter-actions">

                <button
                    type="submit"
                    class="
                        tx-btn
                        tx-btn-primary
                    "
                >
                    🔍 Terapkan Filter
                </button>


                @if(
                    $search
                    ||
                    $statusPembayaran
                    ||
                    $statusLaundry
                    ||
                    $jenisPengambilan
                    ||
                    $tanggalMulai
                    ||
                    $tanggalAkhir
                )

                    <a
                        href="{{
                            route(
                                'transaksi.index'
                            )
                        }}"
                        class="
                            tx-btn
                            tx-btn-secondary
                        "
                    >
                        ↻ Reset
                    </a>

                @endif

            </div>

        </form>


        <!-- HASIL -->

        <div class="tx-filter-result">

            <span>

                📊 Menampilkan

                <strong>
                    {{ $totalHasilFilter }}
                </strong>

                dari

                <strong>
                    {{ $totalTransaksi }}
                </strong>

                transaksi.

            </span>


            <span>

                ⚖️ Total seluruh berat:

                <strong>

                    {{
                        number_format(
                            $totalBerat,
                            1,
                            ',',
                            '.'
                        )
                    }}

                    Kg

                </strong>

            </span>

        </div>


        <!-- TABLE -->

        <div class="tx-table-wrapper">

            <table class="tx-table">

                <thead>

                    <tr>

                        <th>
                            Kode
                        </th>

                        <th>
                            Tanggal
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
                            Status
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

                            <span class="tx-code">

                                {{
                                    $transaksi
                                        ->kode_transaksi
                                }}

                            </span>

                        </td>


                        <!-- TANGGAL -->

                        <td>

                            {{
                                $transaksi
                                    ->tanggal_masuk
                                ? \Carbon\Carbon::parse(
                                    $transaksi
                                        ->tanggal_masuk
                                )->format('d/m/Y')
                                : '-'
                            }}

                        </td>


                        <!-- PELANGGAN -->

                        <td>

                            <span class="tx-customer">

                                {{
                                    $transaksi
                                        ->pelanggan
                                        ->nama
                                    ?? '-'
                                }}

                            </span>

                            <span class="tx-phone">

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

                            <span class="tx-total">

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
                                        tx-badge
                                        tx-blue
                                    "
                                >
                                    🚚 Kirim
                                </span>

                            @else

                                <span
                                    class="
                                        tx-badge
                                        tx-orange
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
                                        tx-badge
                                        tx-green
                                    "
                                >
                                    ✓ Lunas
                                </span>

                                <span class="tx-phone">

                                    {{
                                        $transaksi
                                            ->metode_pembayaran
                                        ?? '-'
                                    }}

                                </span>

                            @else

                                <span
                                    class="
                                        tx-badge
                                        tx-red
                                    "
                                >
                                    Belum Lunas
                                </span>


                                <form
                                    method="POST"

                                    action="{{
                                        route(
                                            'transaksi.bayar',
                                            $transaksi
                                        )
                                    }}"

                                    class="tx-payment-form"
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
                                            tx-btn
                                            tx-btn-success
                                        "
                                    >
                                        Bayar
                                    </button>

                                </form>

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
                                    class="tx-status-select"
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

                            <div class="tx-actions">

                                <a
                                    href="{{
                                        route(
                                            'transaksi.show',
                                            $transaksi
                                        )
                                    }}"
                                    class="
                                        tx-btn
                                        tx-btn-info
                                    "
                                >
                                    👁 Detail
                                </a>


                                <a
                                    href="{{
                                        route(
                                            'transaksi.edit',
                                            $transaksi
                                        )
                                    }}"
                                    class="
                                        tx-btn
                                        tx-btn-warning
                                    "
                                >
                                    ✏ Edit
                                </a>


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
                                            'Yakin ingin menghapus transaksi {{ $transaksi->kode_transaksi }}?'
                                        );
                                    "
                                >

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="
                                            tx-btn
                                            tx-btn-danger
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
                            colspan="10"
                            class="tx-empty"
                        >

                            @if(
                                $search
                                ||
                                $statusPembayaran
                                ||
                                $statusLaundry
                                ||
                                $jenisPengambilan
                                ||
                                $tanggalMulai
                                ||
                                $tanggalAkhir
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
        | ELEMEN
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

        const jenisPengambilan =
            document.getElementById(
                'jenisPengambilan'
            );

        const alamatBox =
            document.getElementById(
                'alamatBox'
            );

        const alamatKirim =
            document.getElementById(
                'alamatKirim'
            );

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

        const transactionForm =
            document.getElementById(
                'transactionForm'
            );

        const saveTransaction =
            document.getElementById(
                'saveTransaction'
            );


        /*
        |--------------------------------------------------------------------------
        | TOTAL OTOMATIS
        |--------------------------------------------------------------------------
        */

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
                    option?.dataset?.harga
                    || 0
                );


            const jumlahBerat =
                Number(
                    berat.value
                    || 0
                );


            const total =
                harga
                *
                jumlahBerat;


            totalPreview.textContent =
                'Rp '
                +
                new Intl.NumberFormat(
                    'id-ID'
                ).format(
                    Math.round(total)
                );
        }


        /*
        |--------------------------------------------------------------------------
        | PENGIRIMAN
        |--------------------------------------------------------------------------
        */

        function cekPengambilan()
        {
            if (
                !jenisPengambilan
                ||
                !alamatBox
            ) {
                return;
            }


            const kirim =
                jenisPengambilan.value
                === 'kirim';


            alamatBox.style.display =
                kirim
                    ? 'block'
                    : 'none';


            if (alamatKirim) {

                alamatKirim.required =
                    kirim;

            }
        }


        /*
        |--------------------------------------------------------------------------
        | QRIS
        |--------------------------------------------------------------------------
        */

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


            const tampil =
                caraBayar.value
                === 'langsung'
                &&
                metodePembayaran.value
                === 'QRIS';


            qrisBox.style.display =
                tampil
                    ? 'block'
                    : 'none';
        }


        /*
        |--------------------------------------------------------------------------
        | PEMBAYARAN
        |--------------------------------------------------------------------------
        */

        function cekPembayaran()
        {
            if (
                !caraBayar
                ||
                !metodeBox
                ||
                !metodePembayaran
            ) {
                return;
            }


            const langsung =
                caraBayar.value
                === 'langsung';


            metodeBox.style.display =
                langsung
                    ? 'block'
                    : 'none';


            metodePembayaran.required =
                langsung;


            if (!langsung) {

                if (qrisBox) {

                    qrisBox.style.display =
                        'none';

                }

            } else {

                cekQris();

            }
        }


        /*
        |--------------------------------------------------------------------------
        | EVENT
        |--------------------------------------------------------------------------
        */

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


        if (jenisPengambilan) {

            jenisPengambilan.addEventListener(
                'change',
                cekPengambilan
            );

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
        | CEGAH DOUBLE CLICK SIMPAN
        |--------------------------------------------------------------------------
        */

        if (
            transactionForm
            &&
            saveTransaction
        ) {

            transactionForm.addEventListener(
                'submit',
                function () {

                    saveTransaction.disabled =
                        true;

                    saveTransaction.textContent =
                        '⏳ Menyimpan...';

                }
            );

        }


        /*
        |--------------------------------------------------------------------------
        | INITIAL
        |--------------------------------------------------------------------------
        */

        hitungTotal();

        cekPengambilan();

        cekPembayaran();

    }
);
</script>

@endpush