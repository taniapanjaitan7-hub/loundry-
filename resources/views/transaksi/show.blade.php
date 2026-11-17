@extends('layouts.app')

@section('title', 'Detail Transaksi - Tania Mutiara Laundry')

@push('styles')
<style>
    .detail-page {
        max-width: 950px;
        margin: 0 auto;
    }

    .detail-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        margin-bottom: 25px;
        flex-wrap: wrap;
    }

    .detail-header h1 {
        margin: 0 0 6px 0;
        color: #172033;
    }

    .detail-header p {
        margin: 0;
        color: #64748b;
    }

    .action-buttons {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .btn-detail {
        display: inline-block;
        border: none;
        padding: 11px 18px;
        border-radius: 9px;
        text-decoration: none;
        cursor: pointer;
        font-size: 14px;
        font-weight: 600;
    }

    .btn-back {
        background: #64748b;
        color: white;
    }

    .btn-print {
        background: #2563eb;
        color: white;
    }

    .btn-edit {
        background: #f59e0b;
        color: white;
    }

    .receipt {
        background: white;
        border-radius: 18px;
        padding: 30px;
        box-shadow: 0 8px 30px rgba(15, 23, 42, 0.10);
    }

    .receipt-brand {
        text-align: center;
        padding-bottom: 22px;
        border-bottom: 2px dashed #cbd5e1;
        margin-bottom: 25px;
    }

    .receipt-logo {
        width: 72px;
        height: 72px;
        margin: 0 auto 12px;

        display: flex;
        align-items: center;
        justify-content: center;

        border-radius: 50%;
        background: #eff6ff;
        font-size: 38px;
    }

    .receipt-brand h2 {
        margin: 0;
        color: #1e3a8a;
        font-size: 26px;
    }

    .receipt-brand p {
        margin: 6px 0 0;
        color: #64748b;
    }

    .transaction-code {
        margin-top: 15px;
        display: inline-block;
        background: #dbeafe;
        color: #1d4ed8;
        padding: 8px 15px;
        border-radius: 20px;
        font-weight: bold;
    }

    .section-title {
        margin: 25px 0 15px;
        color: #1e3a8a;
        font-size: 17px;
        border-left: 4px solid #2563eb;
        padding-left: 10px;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 14px;
    }

    .info-item {
        background: #f8fafc;
        padding: 15px;
        border-radius: 10px;
        border: 1px solid #e2e8f0;
    }

    .info-item .label {
        color: #64748b;
        font-size: 12px;
        margin-bottom: 6px;
    }

    .info-item .value {
        color: #172033;
        font-weight: 600;
        line-height: 1.5;
    }

    .price-box {
        margin-top: 25px;
        padding: 20px;
        border-radius: 12px;
        background: #eff6ff;

        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
    }

    .price-box span {
        color: #475569;
        font-weight: 600;
    }

    .price-box strong {
        color: #1d4ed8;
        font-size: 25px;
    }

    .badge {
        display: inline-block;
        padding: 6px 11px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: bold;
    }

    .badge-lunas {
        background: #dcfce7;
        color: #166534;
    }

    .badge-belum {
        background: #fee2e2;
        color: #991b1b;
    }

    .badge-status {
        background: #dbeafe;
        color: #1d4ed8;
    }

    .note-box {
        background: #fff7ed;
        color: #9a3412;
        border: 1px solid #fed7aa;
        padding: 15px;
        border-radius: 10px;
        line-height: 1.6;
    }

    .receipt-footer {
        text-align: center;
        border-top: 2px dashed #cbd5e1;
        margin-top: 28px;
        padding-top: 20px;
        color: #64748b;
    }

    .receipt-footer strong {
        color: #1e3a8a;
    }

    @media (max-width: 700px) {
        .info-grid {
            grid-template-columns: 1fr;
        }

        .price-box {
            flex-direction: column;
            align-items: flex-start;
        }

        .receipt {
            padding: 20px;
        }
    }

    /* CETAK STRUK */
    @media print {
        .sidebar,
        .page-overlay,
        .footer,
        .no-print,
        .alert-success {
            display: none !important;
        }

        body {
            background: white !important;
        }

        .main-content {
            margin-left: 0 !important;
            padding: 0 !important;
        }

        .detail-page {
            max-width: 100%;
            margin: 0;
        }

        .receipt {
            box-shadow: none;
            border: none;
            border-radius: 0;
            padding: 10px;
        }

        .info-item {
            break-inside: avoid;
        }
    }
</style>
@endpush


@section('content')

<div class="detail-page">

    <div class="detail-header no-print">

        <div>
            <h1>🧾 Detail Transaksi</h1>

            <p>
                Informasi lengkap transaksi Tania Mutiara Laundry.
            </p>
        </div>

        <div class="action-buttons">

            <a
                href="{{ route('transaksi.index') }}"
                class="btn-detail btn-back"
            >
                ← Kembali
            </a>

            <a
                href="{{ route('transaksi.edit', $transaksi) }}"
                class="btn-detail btn-edit"
            >
                ✏️ Edit
            </a>

            <button
                type="button"
                onclick="window.print()"
                class="btn-detail btn-print"
            >
                🖨 Cetak / Simpan PDF
            </button>

        </div>

    </div>


    <div class="receipt">

        <!-- BRAND -->
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
                {{ $transaksi->kode_transaksi }}
            </div>

        </div>


        <!-- DATA PELANGGAN -->
        <h3 class="section-title">
            👤 Informasi Pelanggan
        </h3>

        <div class="info-grid">

            <div class="info-item">

                <div class="label">
                    Nama Pelanggan
                </div>

                <div class="value">
                    {{ $transaksi->pelanggan->nama ?? '-' }}
                </div>

            </div>


            <div class="info-item">

                <div class="label">
                    Nomor HP
                </div>

                <div class="value">
                    {{ $transaksi->pelanggan->no_hp ?? '-' }}
                </div>

            </div>


            <div class="info-item">

                <div class="label">
                    Alamat
                </div>

                <div class="value">
                    {{ $transaksi->pelanggan->alamat ?? '-' }}
                </div>

            </div>


            <div class="info-item">

                <div class="label">
                    Jenis Pengambilan
                </div>

                <div class="value">

                    @if($transaksi->jenis_pengambilan === 'kirim')

                        🚚 Antar / Kirim

                    @else

                        🏠 Ambil Sendiri

                    @endif

                </div>

            </div>

        </div>


        @if($transaksi->jenis_pengambilan === 'kirim')

            <div
                class="info-item"
                style="margin-top:14px;"
            >

                <div class="label">
                    Alamat Pengiriman
                </div>

                <div class="value">
                    {{ $transaksi->alamat_kirim ?? '-' }}
                </div>

            </div>

        @endif


        <!-- DETAIL LAUNDRY -->
        <h3 class="section-title">
            👕 Detail Laundry
        </h3>

        <div class="info-grid">

            <div class="info-item">

                <div class="label">
                    Layanan
                </div>

                <div class="value">
                    {{ $transaksi->layanan->nama_layanan ?? '-' }}
                </div>

            </div>


            <div class="info-item">

                <div class="label">
                    Berat Laundry
                </div>

                <div class="value">
                    {{ $transaksi->berat }} Kg
                </div>

            </div>


            <div class="info-item">

                <div class="label">
                    Harga per Kg
                </div>

                <div class="value">

                    Rp
                    {{ number_format(
                        $transaksi->harga_per_kg,
                        0,
                        ',',
                        '.'
                    ) }}

                </div>

            </div>


            <div class="info-item">

                <div class="label">
                    Status Laundry
                </div>

                <div class="value">

                    <span class="badge badge-status">

                        {{ $transaksi->status_laundry }}

                    </span>

                </div>

            </div>

        </div>


        <!-- TANGGAL -->
        <h3 class="section-title">
            📅 Informasi Waktu
        </h3>

        <div class="info-grid">

            <div class="info-item">

                <div class="label">
                    Tanggal Masuk
                </div>

                <div class="value">

                    @if($transaksi->tanggal_masuk)

                        {{
                            \Carbon\Carbon::parse(
                                $transaksi->tanggal_masuk
                            )->format('d-m-Y')
                        }}

                    @else

                        -

                    @endif

                </div>

            </div>


            <div class="info-item">

                <div class="label">
                    Estimasi Tanggal Selesai
                </div>

                <div class="value">

                    @if($transaksi->tanggal_selesai)

                        {{
                            \Carbon\Carbon::parse(
                                $transaksi->tanggal_selesai
                            )->format('d-m-Y')
                        }}

                    @else

                        -

                    @endif

                </div>

            </div>

        </div>


        <!-- PEMBAYARAN -->
        <h3 class="section-title">
            💳 Pembayaran
        </h3>

        <div class="info-grid">

            <div class="info-item">

                <div class="label">
                    Status Pembayaran
                </div>

                <div class="value">

                    @if($transaksi->status_pembayaran === 'Lunas')

                        <span class="badge badge-lunas">
                            ✓ Lunas
                        </span>

                    @else

                        <span class="badge badge-belum">
                            Belum Lunas
                        </span>

                    @endif

                </div>

            </div>


            <div class="info-item">

                <div class="label">
                    Cara Bayar
                </div>

                <div class="value">

                    @if($transaksi->cara_bayar === 'langsung')

                        Bayar Langsung

                    @else

                        Bayar Nanti

                    @endif

                </div>

            </div>


            <div class="info-item">

                <div class="label">
                    Metode Pembayaran
                </div>

                <div class="value">
                    {{ $transaksi->metode_pembayaran ?? '-' }}
                </div>

            </div>


            <div class="info-item">

                <div class="label">
                    Total Harga
                </div>

                <div class="value">

                    Rp
                    {{ number_format(
                        $transaksi->total,
                        0,
                        ',',
                        '.'
                    ) }}

                </div>

            </div>

        </div>


        <!-- TOTAL -->
        <div class="price-box">

            <span>
                Total Pembayaran
            </span>

            <strong>

                Rp
                {{ number_format(
                    $transaksi->total,
                    0,
                    ',',
                    '.'
                ) }}

            </strong>

        </div>


        <!-- CATATAN -->
        @if($transaksi->catatan)

            <h3 class="section-title">
                📝 Catatan
            </h3>

            <div class="note-box">

                {{ $transaksi->catatan }}

            </div>

        @endif


        <!-- FOOTER -->
        <div class="receipt-footer">

            <strong>
                Terima kasih telah menggunakan
                Tania Mutiara Laundry
            </strong>

            <br><br>

            Bersih • Wangi • Rapi

            <br>

            © {{ date('Y') }}
            Tania Mutiara Laundry

        </div>

    </div>

</div>

@endsection