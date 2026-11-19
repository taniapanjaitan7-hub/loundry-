@extends('layouts.app')

@section('title', 'Layanan - Tania Mutiara Laundry')

@push('styles')
<style>
    .service-page {
        width: 100%;
    }

    .service-hero {
        position: relative;
        overflow: hidden;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 24px;
        margin-bottom: 24px;
        padding: 30px;
        border-radius: 22px;
        color: #fff;
        background: linear-gradient(135deg, #1e3a8a, #2563eb 55%, #0ea5e9);
        box-shadow: 0 16px 38px rgba(37, 99, 235, .18);
    }

    .service-hero::before {
        content: "";
        position: absolute;
        width: 250px;
        height: 250px;
        right: -90px;
        top: -130px;
        border-radius: 50%;
        background: rgba(255, 255, 255, .10);
    }

    .service-hero-content {
        position: relative;
        z-index: 2;
    }

    .service-hero h1 {
        margin: 0 0 8px;
        font-size: 29px;
    }

    .service-hero p {
        margin: 0;
        max-width: 650px;
        color: rgba(255, 255, 255, .84);
        font-size: 12px;
        line-height: 1.7;
    }

    .service-hero-icon {
        position: relative;
        z-index: 2;
        width: 95px;
        height: 95px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        border: 1px solid rgba(255, 255, 255, .18);
        border-radius: 25px;
        background: rgba(255, 255, 255, .13);
        font-size: 43px;
    }

    .service-alert {
        margin-bottom: 20px;
        padding: 13px 15px;
        border-radius: 11px;
        font-size: 11px;
    }

    .service-alert-success {
        background: #dcfce7;
        border: 1px solid #bbf7d0;
        color: #166534;
    }

    .service-alert-error {
        background: #fee2e2;
        border: 1px solid #fecaca;
        color: #991b1b;
    }

    .service-alert-error ul {
        margin: 8px 0 0;
        padding-left: 20px;
    }

    .service-stats {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 14px;
        margin-bottom: 24px;
    }

    .service-stat {
        position: relative;
        overflow: hidden;
        padding: 19px;
        background: #fff;
        border: 1px solid #e8eef7;
        border-radius: 16px;
        box-shadow: 0 7px 22px rgba(15, 23, 42, .05);
        transition: .2s;
    }

    .service-stat:hover {
        transform: translateY(-3px);
    }

    .service-stat-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 12px;
    }

    .service-stat-top small {
        color: #64748b;
        font-size: 8px;
        font-weight: 800;
        text-transform: uppercase;
    }

    .service-stat-icon {
        width: 39px;
        height: 39px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 11px;
        background: #eff6ff;
        font-size: 18px;
    }

    .service-stat h2 {
        margin: 0 0 5px;
        color: #0f172a;
        font-size: 22px;
    }

    .service-stat p {
        margin: 0;
        color: #94a3b8;
        font-size: 8px;
    }

    .green h2 {
        color: #059669;
    }

    .blue h2 {
        color: #2563eb;
    }

    .orange h2 {
        color: #ea580c;
    }

    .service-grid {
        display: grid;
        grid-template-columns: minmax(300px, .72fr) minmax(0, 1.8fr);
        gap: 20px;
        align-items: start;
    }

    .service-panel {
        padding: 22px;
        background: #fff;
        border: 1px solid #e8eef7;
        border-radius: 19px;
        box-shadow: 0 8px 25px rgba(15, 23, 42, .06);
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
        font-size: 17px;
    }

    .panel-header p {
        margin: 5px 0 0;
        color: #94a3b8;
        font-size: 9px;
    }

    .service-count {
        display: inline-flex;
        padding: 5px 9px;
        border-radius: 20px;
        background: #dcfce7;
        color: #166534;
        font-size: 8px;
        font-weight: 800;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 7px;
        color: #334155;
        font-size: 10px;
        font-weight: 700;
    }

    .form-control {
        width: 100%;
        padding: 11px 12px;
        border: 1px solid #cbd5e1;
        border-radius: 9px;
        background: #fff;
        color: #1e293b;
        outline: none;
        font-size: 11px;
        transition: .2s;
    }

    .form-control:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, .08);
    }

    .form-note {
        margin-bottom: 16px;
        padding: 10px 11px;
        background: #f8fafc;
        border-radius: 9px;
        color: #64748b;
        font-size: 8px;
        line-height: 1.6;
    }

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
        transform: translateY(-1px);
    }

    .btn-primary {
        background: #2563eb;
        color: #fff;
    }

    .btn-secondary {
        background: #64748b;
        color: #fff;
    }

    .btn-warning {
        background: #f59e0b;
        color: #fff;
    }

    .btn-danger {
        background: #dc2626;
        color: #fff;
    }

    .btn-save {
        width: 100%;
        padding: 11px;
    }

    .service-search {
        display: flex;
        gap: 7px;
        margin-bottom: 10px;
    }

    .service-search input {
        flex: 1;
    }

    .search-result-info {
        margin-bottom: 16px;
        color: #64748b;
        font-size: 8px;
    }

    .service-list {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 13px;
    }

    .service-card {
        position: relative;
        overflow: hidden;
        padding: 17px;
        border: 1px solid #e8eef7;
        border-radius: 15px;
        background: #fff;
        box-shadow: 0 5px 17px rgba(15, 23, 42, .04);
        transition: .2s;
    }

    .service-card:hover {
        transform: translateY(-2px);
        border-color: #bfdbfe;
        box-shadow: 0 10px 22px rgba(15, 23, 42, .08);
    }

    .service-card-top {
        display: flex;
        gap: 11px;
        align-items: flex-start;
        margin-bottom: 14px;
    }

    .service-icon {
        width: 42px;
        height: 42px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-shrink: 0;
        border-radius: 12px;
        background: linear-gradient(135deg, #dbeafe, #e0f2fe);
        font-size: 19px;
    }

    .service-title h3 {
        margin: 0 0 4px;
        color: #0f172a;
        font-size: 13px;
    }

    .service-title small {
        color: #94a3b8;
        font-size: 8px;
    }

    .service-price {
        margin-bottom: 12px;
        color: #059669;
        font-size: 18px;
        font-weight: 800;
    }

    .service-price span {
        color: #94a3b8;
        font-size: 8px;
        font-weight: 500;
    }

    .service-detail {
        display: flex;
        justify-content: space-between;
        gap: 10px;
        padding: 10px;
        margin-bottom: 14px;
        border-radius: 9px;
        background: #f8fafc;
    }

    .service-detail small {
        color: #64748b;
        font-size: 8px;
    }

    .service-detail strong {
        color: #1d4ed8;
        font-size: 9px;
    }

    .service-actions {
        display: flex;
        gap: 6px;
        flex-wrap: wrap;
    }

    .service-actions form {
        margin: 0;
    }

    .empty-box {
        grid-column: 1 / -1;
        padding: 40px 20px;
        border: 1px dashed #cbd5e1;
        border-radius: 14px;
        background: #f8fafc;
        text-align: center;
        color: #94a3b8;
    }

    .empty-box span {
        display: block;
        margin-bottom: 8px;
        font-size: 35px;
    }

    .empty-box strong {
        color: #475569;
        font-size: 12px;
    }

    .empty-box p {
        margin: 6px 0 0;
        font-size: 9px;
    }

    @media(max-width: 1150px) {
        .service-stats {
            grid-template-columns: repeat(2, 1fr);
        }

        .service-grid {
            grid-template-columns: 1fr;
        }
    }

    @media(max-width: 750px) {
        .service-stats,
        .service-list {
            grid-template-columns: 1fr;
        }

        .service-hero {
            flex-direction: column;
            align-items: flex-start;
        }

        .service-hero-icon {
            display: none;
        }

        .service-search {
            flex-direction: column;
        }
    }
</style>
@endpush


@section('content')

@php

    $jumlahLayanan =
        $totalLayanan
        ?? $layanans->count();

    $hargaRataRata =
        $rataHarga
        ?? (
            $jumlahLayanan > 0
            ? $layanans->avg('harga')
            : 0
        );

    $termahal =
        $layananTermahal
        ?? (
            $jumlahLayanan > 0
            ? $layanans->sortByDesc('harga')->first()
            : null
        );

    $termurah =
        $layananTermurah
        ?? (
            $jumlahLayanan > 0
            ? $layanans->sortBy('harga')->first()
            : null
        );

@endphp


<div class="service-page">

    <!-- HERO -->
    <section class="service-hero">

        <div class="service-hero-content">

            <h1>
                👕 Data Layanan
            </h1>

            <p>
                Kelola jenis layanan, harga dan estimasi pengerjaan
                Tania Mutiara Laundry agar proses transaksi lebih
                cepat, konsisten dan mudah dipantau.
            </p>

        </div>

        <div class="service-hero-icon">
            🫧
        </div>

    </section>


    <!-- SUCCESS -->
    @if(session('success'))

        <div class="service-alert service-alert-success">
            ✓ {{ session('success') }}
        </div>

    @endif


    <!-- ERROR -->
    @if($errors->any())

        <div class="service-alert service-alert-error">

            <strong>
                Data layanan belum benar:
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


    <!-- STATS -->
    <div class="service-stats">

        <div class="service-stat">

            <div class="service-stat-top">

                <small>
                    Total Layanan
                </small>

                <div class="service-stat-icon">
                    👕
                </div>

            </div>

            <h2>
                {{ $jumlahLayanan }}
            </h2>

            <p>
                Jenis layanan tersedia
            </p>

        </div>


        <div class="service-stat green">

            <div class="service-stat-top">

                <small>
                    Rata-Rata Harga
                </small>

                <div class="service-stat-icon">
                    💰
                </div>

            </div>

            <h2>
                Rp {{ number_format($hargaRataRata, 0, ',', '.') }}
            </h2>

            <p>
                Rata-rata seluruh layanan
            </p>

        </div>


        <div class="service-stat blue">

            <div class="service-stat-top">

                <small>
                    Harga Tertinggi
                </small>

                <div class="service-stat-icon">
                    ⭐
                </div>

            </div>

            <h2>
                Rp {{
                    number_format(
                        $termahal?->harga ?? 0,
                        0,
                        ',',
                        '.'
                    )
                }}
            </h2>

            <p>
                {{ $termahal?->nama_layanan ?? 'Belum ada layanan' }}
            </p>

        </div>


        <div class="service-stat orange">

            <div class="service-stat-top">

                <small>
                    Harga Terendah
                </small>

                <div class="service-stat-icon">
                    🏷️
                </div>

            </div>

            <h2>
                Rp {{
                    number_format(
                        $termurah?->harga ?? 0,
                        0,
                        ',',
                        '.'
                    )
                }}
            </h2>

            <p>
                {{ $termurah?->nama_layanan ?? 'Belum ada layanan' }}
            </p>

        </div>

    </div>


    <div class="service-grid">

        <!-- FORM TAMBAH -->
        <div class="service-panel">

            <div class="panel-header">

                <div>

                    <h2>
                        ➕ Tambah Layanan
                    </h2>

                    <p>
                        Tambahkan layanan laundry baru.
                    </p>

                </div>

            </div>


            <form
                action="{{ route('layanan.store') }}"
                method="POST"
            >

                @csrf


                <div class="form-group">

                    <label>
                        👕 Nama Layanan
                    </label>

                    <input
                        type="text"
                        name="nama_layanan"
                        class="form-control"
                        value="{{ old('nama_layanan') }}"
                        placeholder="Contoh: Cuci Setrika"
                        maxlength="255"
                        required
                    >

                </div>


                <div class="form-group">

                    <label>
                        💰 Harga
                    </label>

                    <input
                        type="number"
                        name="harga"
                        class="form-control"
                        value="{{ old('harga') }}"
                        placeholder="Contoh: 10000"
                        min="0"
                        step="1"
                        required
                    >

                </div>


                <div class="form-group">

                    <label>
                        ⏱ Estimasi
                    </label>

                    <input
                        type="text"
                        name="estimasi"
                        class="form-control"
                        value="{{ old('estimasi') }}"
                        placeholder="Contoh: 2 Hari"
                        maxlength="100"
                    >

                </div>


                <div class="form-note">

                    💡 Harga cukup ditulis dengan angka,
                    misalnya <strong>10000</strong>.
                    Jangan menambahkan tulisan "Rp" pada input harga.

                </div>


                <button
                    type="submit"
                    class="service-btn btn-primary btn-save"
                >
                    💾 Simpan Layanan
                </button>

            </form>

        </div>


        <!-- DAFTAR -->
        <div class="service-panel">

            <div class="panel-header">

                <div>

                    <h2>
                        📋 Daftar Layanan
                    </h2>

                    <p>
                        Cari, edit atau hapus layanan laundry.
                    </p>

                </div>

                <span class="service-count">
                    ● {{ $jumlahLayanan }} Layanan
                </span>

            </div>


            <!-- SEARCH -->
            <div class="service-search">

                <input
                    type="text"
                    id="serviceSearch"
                    class="form-control"
                    placeholder="Cari nama, harga atau estimasi..."
                >

                <button
                    type="button"
                    id="serviceReset"
                    class="service-btn btn-secondary"
                >
                    Reset
                </button>

            </div>


            <div class="search-result-info">

                Menampilkan
                <strong id="visibleServiceCount">
                    {{ $jumlahLayanan }}
                </strong>
                dari
                <strong>
                    {{ $jumlahLayanan }}
                </strong>
                layanan.

            </div>


            <!-- SERVICE LIST -->
            <div
                class="service-list"
                id="serviceList"
            >

                @forelse($layanans as $layanan)

                    <div
                        class="service-card"
                        data-search="{{
                            strtolower(
                                $layanan->nama_layanan
                                . ' '
                                . $layanan->harga
                                . ' '
                                . ($layanan->estimasi ?? '')
                            )
                        }}"
                    >

                        <div class="service-card-top">

                            <div class="service-icon">
                                👕
                            </div>

                            <div class="service-title">

                                <h3>
                                    {{ $layanan->nama_layanan }}
                                </h3>

                                <small>
                                    ID #{{ $layanan->id }}
                                </small>

                            </div>

                        </div>


                        <div class="service-price">

                            Rp {{
                                number_format(
                                    $layanan->harga,
                                    0,
                                    ',',
                                    '.'
                                )
                            }}

                            <span>
                                / layanan
                            </span>

                        </div>


                        <div class="service-detail">

                            <small>
                                ⏱ Estimasi
                            </small>

                            <strong>
                                {{ $layanan->estimasi ?? 'Belum ditentukan' }}
                            </strong>

                        </div>


                        <div class="service-actions">

                            <a
                                href="{{
                                    route(
                                        'layanan.edit',
                                        $layanan
                                    )
                                }}"
                                class="service-btn btn-warning"
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
                                onsubmit="return confirm('Yakin ingin menghapus layanan ini?')"
                            >

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="service-btn btn-danger"
                                >
                                    🗑 Hapus
                                </button>

                            </form>

                        </div>

                    </div>

                @empty

                    <div class="empty-box">

                        <span>
                            🧺
                        </span>

                        <strong>
                            Belum ada layanan
                        </strong>

                        <p>
                            Tambahkan layanan menggunakan
                            form di sebelah kiri.
                        </p>

                    </div>

                @endforelse

            </div>


            <div
                class="empty-box"
                id="searchEmpty"
                style="display:none; margin-top:13px;"
            >

                <span>
                    🔍
                </span>

                <strong>
                    Layanan tidak ditemukan
                </strong>

                <p>
                    Coba gunakan kata pencarian lain.
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

        const visibleCounter =
            document.getElementById(
                'visibleServiceCount'
            );


        function filterServices()
        {
            if (!searchInput) {
                return;
            }

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
                        card.dataset.search || '';

                    if (
                        text.includes(keyword)
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


            if (visibleCounter) {

                visibleCounter.textContent =
                    visible;

            }


            if (emptyBox) {

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


        if (searchInput) {

            searchInput.addEventListener(
                'input',
                filterServices
            );

        }


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