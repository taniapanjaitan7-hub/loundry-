@extends('layouts.app')

@section('title', 'Detail Transaksi - Tania Mutiara Laundry')


@push('styles')

<style>

    /* =========================================================
       DETAIL TRANSAKSI PREMIUM
    ========================================================= */

    .transaction-detail-page {
        width: 100%;
        max-width: 1100px;
        margin: 0 auto;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .detail-header {
        display: flex;
        justify-content: space-between;
        align-items: center;

        gap: 20px;

        margin-bottom: 24px;

        flex-wrap: wrap;
    }


    .detail-header h1 {
        margin: 0 0 6px;

        color: #0f172a;

        font-size: 28px;
    }


    .detail-header p {
        margin: 0;

        color: #64748b;

        font-size: 12px;
    }


    .detail-actions {
        display: flex;

        gap: 8px;

        flex-wrap: wrap;
    }


    /* =========================================================
       BUTTON
    ========================================================= */

    .detail-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        gap: 6px;

        padding: 10px 15px;

        border: none;

        border-radius: 9px;

        cursor: pointer;

        text-decoration: none;

        font-size: 10px;

        font-weight: 700;

        transition: .2s;
    }


    .detail-btn:hover {
        transform: translateY(-1px);
    }


    .btn-back {
        background: #64748b;
        color: white;
    }


    .btn-edit {
        background: #f59e0b;
        color: white;
    }


    .btn-print {
        background: #2563eb;
        color: white;
    }


    /* =========================================================
       TOP SUMMARY
    ========================================================= */

    .detail-summary {
        display: grid;

        grid-template-columns:
            repeat(4, 1fr);

        gap: 14px;

        margin-bottom: 24px;
    }


    .summary-card {
        padding: 17px;

        background: white;

        border:
            1px solid #e8eef7;

        border-radius: 15px;

        box-shadow:
            0 5px 18px
            rgba(15,23,42,.05);
    }


    .summary-card small {
        display: block;

        margin-bottom: 6px;

        color: #64748b;

        font-size: 9px;

        font-weight: 700;

        text-transform: uppercase;
    }


    .summary-card strong {
        color: #0f172a;

        font-size: 13px;
    }


    .summary-total strong {
        color: #059669;

        font-size: 17px;
    }


    /* =========================================================
       RECEIPT
    ========================================================= */

    .receipt-card {
        position: relative;

        overflow: hidden;

        background: white;

        border:
            1px solid #e8eef7;

        border-radius: 22px;

        box-shadow:
            0 12px 35px
            rgba(15,23,42,.08);
    }


    .receipt-top-line {
        height: 6px;

        background:
            linear-gradient(
                90deg,
                #1e3a8a,
                #2563eb,
                #0ea5e9
            );
    }


    .receipt-content {
        padding: 30px;
    }


    /* =========================================================
       BRAND
    ========================================================= */

    .receipt-brand {
        text-align: center;

        padding-bottom: 25px;

        margin-bottom: 25px;

        border-bottom:
            2px dashed #cbd5e1;
    }


    .receipt-logo {
        width: 74px;
        height: 74px;

        margin:
            0 auto 12px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 22px;

        background:
            linear-gradient(
                135deg,
                #dbeafe,
                #e0f2fe
            );

        font-size: 38px;

        transform: rotate(-3deg);
    }


    .receipt-brand h2 {
        margin: 0;

        color: #1e3a8a;

        font-size: 26px;
    }


    .receipt-brand p {
        margin:
            6px 0 0;

        color: #64748b;

        font-size: 11px;
    }


    .transaction-code {
        display: inline-flex;
        align-items: center;

        margin-top: 14px;

        padding: 7px 13px;

        background: #eff6ff;

        color: #1d4ed8;

        border:
            1px solid #bfdbfe;

        border-radius: 30px;

        font-size: 10px;

        font-weight: 800;
    }


    /* =========================================================
       SECTION
    ========================================================= */

    .receipt-section {
        margin-top: 26px;
    }


    .section-title {
        display: flex;
        align-items: center;

        gap: 8px;

        margin:
            0 0 14px;

        color: #1e3a8a;

        font-size: 15px;
    }


    .section-title::after {
        content: "";

        height: 1px;

        flex: 1;

        background: #e2e8f0;
    }


    /* =========================================================
       INFO GRID
    ========================================================= */

    .info-grid {
        display: grid;

        grid-template-columns:
            repeat(2, 1fr);

        gap: 12px;
    }


    .info-item {
        padding: 14px;

        background: #f8fafc;

        border:
            1px solid #edf2f7;

        border-radius: 11px;
    }


    .info-label {
        display: block;

        margin-bottom: 5px;

        color: #64748b;

        font-size: 9px;

        font-weight: 600;

        text-transform: uppercase;
    }


    .info-value {
        color: #0f172a;

        font-size: 12px;

        font-weight: 700;

        line-height: 1.5;
    }


    /* =========================================================
       BADGES
    ========================================================= */

    .detail-badge {
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
       TRACKING STATUS
    ========================================================= */

    .tracking-box {
        margin-top: 10px;

        padding: 20px;

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


    .tracking-list {
        display: grid;

        grid-template-columns:
            repeat(5, 1fr);

        gap: 8px;
    }


    .tracking-item {
        text-align: center;

        position: relative;
    }


    .tracking-circle {
        width: 34px;
        height: 34px;

        margin:
            0 auto 7px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 50%;

        background: #e2e8f0;

        color: #64748b;

        font-size: 12px;

        font-weight: 700;
    }


    .tracking-item.active
    .tracking-circle {
        background: #2563eb;

        color: white;

        box-shadow:
            0 0 0 5px
            rgba(37,99,235,.10);
    }


    .tracking-item.completed
    .tracking-circle {
        background: #16a34a;

        color: white;
    }


    .tracking-item small {
        color: #64748b;

        font-size: 8px;

        font-weight: 700;
    }


    /* =========================================================
       TOTAL PRICE
    ========================================================= */

    .total-price-box {
        display: flex;
        justify-content: space-between;
        align-items: center;

        gap: 20px;

        margin-top: 28px;

        padding: 22px;

        background:
            linear-gradient(
                135deg,
                #eff6ff,
                #ecfdf5
            );

        border:
            1px solid #bfdbfe;

        border-radius: 15px;
    }


    .total-price-box span {
        color: #475569;

        font-size: 12px;

        font-weight: 700;
    }


    .total-price-box strong {
        color: #059669;

        font-size: 26px;
    }


    /* =========================================================
       NOTE
    ========================================================= */

    .note-box {
        padding: 15px;

        background: #fff7ed;

        border:
            1px solid #fed7aa;

        border-radius: 11px;

        color: #9a3412;

        font-size: 11px;

        line-height: 1.6;
    }


    /* =========================================================
       FOOTER RECEIPT
    ========================================================= */

    .receipt-footer {
        margin-top: 28px;

        padding-top: 22px;

        border-top:
            2px dashed #cbd5e1;

        text-align: center;

        color: #64748b;

        font-size: 10px;

        line-height: 1.7;
    }


    .receipt-footer strong {
        display: block;

        margin-bottom: 4px;

        color: #1e3a8a;

        font-size: 12px;
    }


    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media(max-width: 900px) {

        .detail-summary {
            grid-template-columns:
                repeat(2, 1fr);
        }


        .tracking-list {
            grid-template-columns:
                repeat(3, 1fr);
        }

    }


    @media(max-width: 650px) {

        .info-grid {
            grid-template-columns:
                1fr;
        }


        .detail-summary {
            grid-template-columns:
                1fr;
        }


        .tracking-list {
            grid-template-columns:
                repeat(2, 1fr);
        }


        .total-price-box {
            flex-direction: column;

            align-items: flex-start;
        }


        .receipt-content {
            padding: 20px;
        }

    }


    /* =========================================================
       PRINT / STRUK
    ========================================================= */

    @media print {

        @page {
            margin: 8mm;
        }


        .sidebar,
        .page-overlay,
        .footer,
        .detail-header,
        .detail-summary,
        .no-print,
        .alert-success,
        .alert-error-layout {
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


        .transaction-detail-page {
            width: 100%;

            max-width: 80mm;

            margin: 0 auto;
        }


        .receipt-card {
            border: none;

            border-radius: 0;

            box-shadow: none;
        }


        .receipt-top-line {
            display: none;
        }


        .receipt-content {
            padding: 5px;
        }


        .receipt-logo {
            width: 55px;
            height: 55px;

            font-size: 28px;
        }


        .receipt-brand h2 {
            font-size: 18px;
        }


        .receipt-brand p {
            font-size: 9px;
        }


        .info-grid {
            grid-template-columns: 1fr;

            gap: 6px;
        }


        .info-item {
            padding: 8px;

            background: white;

            border:
                1px solid #e2e8f0;

            break-inside: avoid;
        }


        .section-title {
            font-size: 11px;

            margin-top: 15px;
        }


        .tracking-box {
            display: none;
        }


        .total-price-box {
            padding: 12px;

            background: white;

            border:
                2px solid #0f172a;
        }


        .total-price-box strong {
            color: #000;

            font-size: 18px;
        }


        .detail-badge {
            border:
                1px solid #cbd5e1;

            background: white !important;

            color: black !important;
        }


        .note-box {
            background: white;

            color: black;

            border:
                1px solid #cbd5e1;
        }

    }

</style>

@endpush



@section('content')


@php

    $statusUrutan = [
        'Diterima',
        'Dicuci',
        'Dikeringkan',
        'Disetrika',
        'Selesai'
    ];

    $statusSekarang =
        array_search(
            $transaksi->status_laundry,
            $statusUrutan
        );

    if (
        in_array(
            $transaksi->status_laundry,
            ['Diambil', 'Dikirim']
        )
    ) {
        $statusSekarang = 4;
    }

@endphp



<div class="transaction-detail-page">


    <!-- =====================================================
         HEADER
    ====================================================== -->

    <div class="detail-header no-print">


        <div>

            <h1>
                🧾 Detail Transaksi
            </h1>

            <p>
                Informasi lengkap pesanan dan
                struk Tania Mutiara Laundry.
            </p>

        </div>



        <div class="detail-actions">


            <a
                href="{{ route('transaksi.index') }}"
                class="detail-btn btn-back"
            >
                ← Kembali
            </a>


            <a
                href="{{
                    route(
                        'transaksi.edit',
                        $transaksi
                    )
                }}"
                class="detail-btn btn-edit"
            >
                ✏️ Edit
            </a>


            <button
                type="button"
                onclick="window.print()"
                class="detail-btn btn-print"
            >
                🖨 Cetak / Simpan PDF
            </button>


        </div>


    </div>



    <!-- =====================================================
         SUMMARY
    ====================================================== -->

    <div class="detail-summary no-print">


        <div class="summary-card">

            <small>
                Pelanggan
            </small>

            <strong>
                {{
                    $transaksi
                        ->pelanggan
                        ->nama
                    ?? '-'
                }}
            </strong>

        </div>


        <div class="summary-card">

            <small>
                Status Laundry
            </small>

            <strong>
                {{ $transaksi->status_laundry }}
            </strong>

        </div>


        <div class="summary-card">

            <small>
                Pembayaran
            </small>

            <strong>
                {{ $transaksi->status_pembayaran }}
            </strong>

        </div>


        <div class="summary-card summary-total">

            <small>
                Total
            </small>

            <strong>

                Rp
                {{
                    number_format(
                        $transaksi->total,
                        0,
                        ',',
                        '.'
                    )
                }}

            </strong>

        </div>


    </div>



    <!-- =====================================================
         RECEIPT
    ====================================================== -->

    <div class="receipt-card">


        <div class="receipt-top-line"></div>


        <div class="receipt-content">


            <!-- =============================================
                 BRAND
            ============================================== -->

            <div class="receipt-brand">


                <div class="receipt-logo">
                    🧺
                </div>


                <h2>
                    Tania Mutiara Laundry
                </h2>


                <p>
                    Bersih • Wangi • Rapi
                </p>


                <div class="transaction-code">

                    🧾 {{ $transaksi->kode_transaksi }}

                </div>


            </div>



            <!-- =============================================
                 PELANGGAN
            ============================================== -->

            <div class="receipt-section">


                <h3 class="section-title">

                    👤 Informasi Pelanggan

                </h3>


                <div class="info-grid">


                    <div class="info-item">

                        <span class="info-label">
                            Nama Pelanggan
                        </span>

                        <div class="info-value">

                            {{
                                $transaksi
                                    ->pelanggan
                                    ->nama
                                ?? '-'
                            }}

                        </div>

                    </div>



                    <div class="info-item">

                        <span class="info-label">
                            Nomor HP
                        </span>

                        <div class="info-value">

                            {{
                                $transaksi
                                    ->pelanggan
                                    ->no_hp
                                ?? '-'
                            }}

                        </div>

                    </div>



                    <div class="info-item">

                        <span class="info-label">
                            Alamat
                        </span>

                        <div class="info-value">

                            {{
                                $transaksi
                                    ->pelanggan
                                    ->alamat
                                ?? '-'
                            }}

                        </div>

                    </div>



                    <div class="info-item">

                        <span class="info-label">
                            Pengambilan
                        </span>


                        <div class="info-value">


                            @if(
                                $transaksi
                                    ->jenis_pengambilan
                                === 'kirim'
                            )

                                🚚 Kirim ke Alamat

                            @else

                                🏠 Ambil Sendiri

                            @endif


                        </div>

                    </div>


                </div>



                @if(
                    $transaksi
                        ->jenis_pengambilan
                    === 'kirim'
                )


                    <div
                        class="info-item"
                        style="margin-top:12px;"
                    >

                        <span class="info-label">
                            Alamat Pengiriman
                        </span>

                        <div class="info-value">

                            {{
                                $transaksi
                                    ->alamat_kirim
                                ?? '-'
                            }}

                        </div>

                    </div>


                @endif


            </div>



            <!-- =============================================
                 DETAIL LAUNDRY
            ============================================== -->

            <div class="receipt-section">


                <h3 class="section-title">

                    👕 Detail Laundry

                </h3>


                <div class="info-grid">


                    <div class="info-item">

                        <span class="info-label">
                            Layanan
                        </span>

                        <div class="info-value">

                            {{
                                $transaksi
                                    ->layanan
                                    ->nama_layanan
                                ?? '-'
                            }}

                        </div>

                    </div>



                    <div class="info-item">

                        <span class="info-label">
                            Berat Laundry
                        </span>

                        <div class="info-value">

                            {{ $transaksi->berat }}
                            Kg

                        </div>

                    </div>



                    <div class="info-item">

                        <span class="info-label">
                            Harga / Kg
                        </span>

                        <div class="info-value">

                            Rp
                            {{
                                number_format(
                                    $transaksi
                                        ->harga_per_kg,
                                    0,
                                    ',',
                                    '.'
                                )
                            }}

                        </div>

                    </div>



                    <div class="info-item">

                        <span class="info-label">
                            Status Laundry
                        </span>

                        <div class="info-value">

                            <span
                                class="
                                    detail-badge
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


                </div>


            </div>



            <!-- =============================================
                 TRACKING
            ============================================== -->

            <div class="receipt-section no-print">


                <h3 class="section-title">

                    🔄 Proses Laundry

                </h3>


                <div class="tracking-box">


                    <div class="tracking-list">


                        @foreach(
                            $statusUrutan
                            as $index => $status
                        )


                            <div
                                class="
                                    tracking-item

                                    {{
                                        $statusSekarang !== false
                                        && $index < $statusSekarang
                                        ? 'completed'
                                        : ''
                                    }}

                                    {{
                                        $statusSekarang !== false
                                        && $index === $statusSekarang
                                        ? 'active'
                                        : ''
                                    }}
                                "
                            >


                                <div class="tracking-circle">


                                    @if(
                                        $statusSekarang !== false
                                        &&
                                        $index < $statusSekarang
                                    )

                                        ✓

                                    @else

                                        {{ $index + 1 }}

                                    @endif


                                </div>


                                <small>

                                    {{ $status }}

                                </small>


                            </div>


                        @endforeach


                    </div>


                </div>


            </div>



            <!-- =============================================
                 WAKTU
            ============================================== -->

            <div class="receipt-section">


                <h3 class="section-title">

                    📅 Informasi Waktu

                </h3>


                <div class="info-grid">


                    <div class="info-item">

                        <span class="info-label">
                            Tanggal Masuk
                        </span>

                        <div class="info-value">


                            @if(
                                $transaksi->tanggal_masuk
                            )

                                {{
                                    \Carbon\Carbon::parse(
                                        $transaksi
                                            ->tanggal_masuk
                                    )
                                    ->translatedFormat(
                                        'd F Y'
                                    )
                                }}

                            @else

                                -

                            @endif


                        </div>

                    </div>



                    <div class="info-item">

                        <span class="info-label">
                            Perkiraan Selesai
                        </span>

                        <div class="info-value">


                            @if(
                                $transaksi
                                    ->tanggal_selesai
                            )

                                {{
                                    \Carbon\Carbon::parse(
                                        $transaksi
                                            ->tanggal_selesai
                                    )
                                    ->translatedFormat(
                                        'd F Y'
                                    )
                                }}

                            @else

                                -

                            @endif


                        </div>

                    </div>


                </div>


            </div>



            <!-- =============================================
                 PEMBAYARAN
            ============================================== -->

            <div class="receipt-section">


                <h3 class="section-title">

                    💳 Informasi Pembayaran

                </h3>


                <div class="info-grid">


                    <div class="info-item">

                        <span class="info-label">
                            Status Pembayaran
                        </span>


                        <div class="info-value">


                            @if(
                                $transaksi
                                    ->status_pembayaran
                                === 'Lunas'
                            )


                                <span
                                    class="
                                        detail-badge
                                        badge-green
                                    "
                                >

                                    ✓ Lunas

                                </span>


                            @else


                                <span
                                    class="
                                        detail-badge
                                        badge-red
                                    "
                                >

                                    Belum Lunas

                                </span>


                            @endif


                        </div>

                    </div>



                    <div class="info-item">

                        <span class="info-label">
                            Cara Bayar
                        </span>

                        <div class="info-value">


                            @if(
                                $transaksi
                                    ->cara_bayar
                                === 'langsung'
                            )

                                Bayar Langsung

                            @else

                                Bayar Nanti

                            @endif


                        </div>

                    </div>



                    <div class="info-item">

                        <span class="info-label">
                            Metode Pembayaran
                        </span>

                        <div class="info-value">

                            {{
                                $transaksi
                                    ->metode_pembayaran
                                ?? '-'
                            }}

                        </div>

                    </div>



                    <div class="info-item">

                        <span class="info-label">
                            Harga Laundry
                        </span>

                        <div class="info-value">

                            Rp
                            {{
                                number_format(
                                    $transaksi->total,
                                    0,
                                    ',',
                                    '.'
                                )
                            }}

                        </div>

                    </div>


                </div>


            </div>



            <!-- =============================================
                 TOTAL
            ============================================== -->

            <div class="total-price-box">


                <span>
                    💰 Total Pembayaran
                </span>


                <strong>

                    Rp
                    {{
                        number_format(
                            $transaksi->total,
                            0,
                            ',',
                            '.'
                        )
                    }}

                </strong>


            </div>



            <!-- =============================================
                 CATATAN
            ============================================== -->

            @if($transaksi->catatan)


                <div class="receipt-section">


                    <h3 class="section-title">

                        📝 Catatan

                    </h3>


                    <div class="note-box">

                        {{ $transaksi->catatan }}

                    </div>


                </div>


            @endif



            <!-- =============================================
                 FOOTER
            ============================================== -->

            <div class="receipt-footer">


                <strong>

                    Terima kasih telah menggunakan
                    Tania Mutiara Laundry

                </strong>


                Kami senang dapat merawat pakaian Anda.


                <br>


                Bersih • Wangi • Rapi


                <br>


                © {{ date('Y') }}
                Tania Mutiara Laundry


            </div>


        </div>


    </div>


</div>


@endsection