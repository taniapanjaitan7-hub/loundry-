@extends('layouts.app')

@section('title', 'Edit Layanan - Tania Mutiara Laundry')


@push('styles')

<style>
    .edit-service-page {
        width: 100%;
        max-width: 1050px;
        margin: 0 auto;
    }

    .edit-service-hero {
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

    .edit-service-hero::before {
        content: "";
        position: absolute;
        width: 250px;
        height: 250px;
        right: -90px;
        top: -130px;
        border-radius: 50%;
        background: rgba(255, 255, 255, .10);
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }

    .hero-content h1 {
        margin: 0 0 8px;
        font-size: 28px;
    }

    .hero-content p {
        max-width: 620px;
        margin: 0;
        color: rgba(255, 255, 255, .84);
        font-size: 12px;
        line-height: 1.7;
    }

    .hero-icon {
        position: relative;
        z-index: 2;
        width: 95px;
        height: 95px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        border-radius: 25px;
        border: 1px solid rgba(255, 255, 255, .18);
        background: rgba(255, 255, 255, .13);
        font-size: 43px;
    }

    .edit-alert {
        margin-bottom: 20px;
        padding: 14px 16px;
        border: 1px solid #fecaca;
        border-radius: 11px;
        background: #fee2e2;
        color: #991b1b;
        font-size: 11px;
    }

    .edit-alert ul {
        margin: 8px 0 0;
        padding-left: 20px;
    }

    .edit-grid {
        display: grid;
        grid-template-columns: minmax(0, 1.5fr) minmax(270px, .7fr);
        gap: 20px;
        align-items: start;
    }

    .edit-panel,
    .preview-panel {
        padding: 23px;
        background: #fff;
        border: 1px solid #e8eef7;
        border-radius: 19px;
        box-shadow: 0 8px 25px rgba(15, 23, 42, .06);
    }

    .panel-title {
        margin-bottom: 21px;
    }

    .panel-title h2 {
        margin: 0 0 5px;
        color: #0f172a;
        font-size: 17px;
    }

    .panel-title p {
        margin: 0;
        color: #94a3b8;
        font-size: 9px;
    }

    .edit-group {
        margin-bottom: 17px;
    }

    .edit-group label {
        display: block;
        margin-bottom: 7px;
        color: #334155;
        font-size: 10px;
        font-weight: 700;
    }

    .edit-control {
        width: 100%;
        padding: 11px 12px;
        border: 1px solid #cbd5e1;
        border-radius: 9px;
        outline: none;
        background: #fff;
        color: #1e293b;
        font-size: 11px;
        transition: .2s;
    }

    .edit-control:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 3px rgba(37, 99, 235, .08);
    }

    .edit-note {
        margin-top: 6px;
        color: #94a3b8;
        font-size: 8px;
        line-height: 1.5;
    }

    .edit-actions {
        display: flex;
        gap: 8px;
        margin-top: 22px;
        flex-wrap: wrap;
    }

    .edit-btn {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        gap: 5px;
        padding: 10px 14px;
        border: none;
        border-radius: 9px;
        cursor: pointer;
        text-decoration: none;
        font-size: 9px;
        font-weight: 700;
        transition: .2s;
    }

    .edit-btn:hover {
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

    .preview-icon {
        width: 62px;
        height: 62px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 15px;
        border-radius: 17px;
        background: linear-gradient(135deg, #dbeafe, #e0f2fe);
        font-size: 28px;
    }

    .preview-panel h3 {
        margin: 0 0 4px;
        color: #0f172a;
        font-size: 17px;
    }

    .preview-id {
        margin-bottom: 18px;
        color: #94a3b8;
        font-size: 8px;
    }

    .preview-item {
        padding: 12px 0;
        border-bottom: 1px solid #edf2f7;
    }

    .preview-item:last-child {
        border-bottom: none;
    }

    .preview-item small {
        display: block;
        margin-bottom: 5px;
        color: #64748b;
        font-size: 8px;
        font-weight: 700;
        text-transform: uppercase;
    }

    .preview-item strong {
        color: #0f172a;
        font-size: 11px;
    }

    .preview-price {
        color: #059669 !important;
        font-size: 19px !important;
    }

    .preview-status {
        color: #16a34a !important;
    }

    .preview-info {
        margin-top: 16px;
        padding: 11px;
        border: 1px solid #dbeafe;
        border-radius: 10px;
        background: #eff6ff;
        color: #1d4ed8;
        font-size: 8px;
        line-height: 1.6;
    }

    @media(max-width: 850px) {
        .edit-grid {
            grid-template-columns: 1fr;
        }
    }

    @media(max-width: 650px) {
        .edit-service-hero {
            flex-direction: column;
            align-items: flex-start;
        }

        .hero-icon {
            display: none;
        }

        .edit-actions {
            flex-direction: column;
        }

        .edit-btn {
            width: 100%;
        }
    }
</style>

@endpush


@section('content')

<div class="edit-service-page">

    <!-- HERO -->
    <section class="edit-service-hero">

        <div class="hero-content">

            <h1>
                ✏️ Edit Layanan
            </h1>

            <p>
                Perbarui nama layanan, harga dan estimasi pengerjaan
                agar informasi Tania Mutiara Laundry tetap akurat.
            </p>

        </div>

        <div class="hero-icon">
            👕
        </div>

    </section>


    <!-- ERROR -->
    @if($errors->any())

        <div class="edit-alert">

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


    <div class="edit-grid">

        <!-- FORM -->
        <div class="edit-panel">

            <div class="panel-title">

                <h2>
                    📝 Informasi Layanan
                </h2>

                <p>
                    Ubah data kemudian simpan perubahan.
                </p>

            </div>


            <form
                action="{{
                    route(
                        'layanan.update',
                        $layanan
                    )
                }}"
                method="POST"
            >

                @csrf
                @method('PUT')


                <!-- NAME -->
                <div class="edit-group">

                    <label>
                        👕 Nama Layanan
                    </label>

                    <input
                        type="text"
                        name="nama_layanan"
                        id="namaLayanan"
                        class="edit-control"
                        value="{{
                            old(
                                'nama_layanan',
                                $layanan->nama_layanan
                            )
                        }}"
                        maxlength="255"
                        required
                    >

                    <div class="edit-note">
                        Contoh: Cuci Setrika, Cuci Kering,
                        atau Laundry Express.
                    </div>

                </div>


                <!-- PRICE -->
                <div class="edit-group">

                    <label>
                        💰 Harga
                    </label>

                    <input
                        type="number"
                        name="harga"
                        id="hargaLayanan"
                        class="edit-control"
                        value="{{
                            old(
                                'harga',
                                $layanan->harga
                            )
                        }}"
                        min="0"
                        step="1"
                        required
                    >

                    <div class="edit-note">
                        Masukkan angka tanpa titik dan tanpa
                        tulisan Rp. Contoh: 10000.
                    </div>

                </div>


                <!-- ESTIMATION -->
                <div class="edit-group">

                    <label>
                        ⏱ Estimasi Pengerjaan
                    </label>

                    <input
                        type="text"
                        name="estimasi"
                        id="estimasiLayanan"
                        class="edit-control"
                        value="{{
                            old(
                                'estimasi',
                                $layanan->estimasi
                            )
                        }}"
                        maxlength="100"
                        placeholder="Contoh: 2 Hari"
                    >

                    <div class="edit-note">
                        Contoh: 3 Jam, 1 Hari, 2 Hari,
                        atau Express.
                    </div>

                </div>


                <div class="edit-actions">

                    <button
                        type="submit"
                        class="edit-btn btn-primary"
                    >
                        💾 Simpan Perubahan
                    </button>


                    <a
                        href="{{ route('layanan.index') }}"
                        class="edit-btn btn-secondary"
                    >
                        ← Kembali
                    </a>

                </div>

            </form>

        </div>


        <!-- LIVE PREVIEW -->
        <aside class="preview-panel">

            <div class="preview-icon">
                🫧
            </div>


            <h3 id="previewNama">
                {{ $layanan->nama_layanan }}
            </h3>


            <div class="preview-id">
                ID Layanan #{{ $layanan->id }}
            </div>


            <div class="preview-item">

                <small>
                    Preview Harga
                </small>

                <strong
                    class="preview-price"
                    id="previewHarga"
                >
                    Rp {{
                        number_format(
                            $layanan->harga,
                            0,
                            ',',
                            '.'
                        )
                    }}
                </strong>

            </div>


            <div class="preview-item">

                <small>
                    Preview Estimasi
                </small>

                <strong id="previewEstimasi">

                    {{
                        $layanan->estimasi
                        ?? 'Belum ditentukan'
                    }}

                </strong>

            </div>


            <div class="preview-item">

                <small>
                    Status
                </small>

                <strong class="preview-status">
                    ● Aktif
                </strong>

            </div>


            <div class="preview-info">

                💡 Preview di atas berubah otomatis ketika
                kamu mengetik. Data database baru berubah
                setelah tombol <strong>Simpan Perubahan</strong>
                ditekan.

            </div>

        </aside>

    </div>

</div>

@endsection


@push('scripts')

<script>

document.addEventListener(
    'DOMContentLoaded',
    function () {

        const namaInput =
            document.getElementById(
                'namaLayanan'
            );

        const hargaInput =
            document.getElementById(
                'hargaLayanan'
            );

        const estimasiInput =
            document.getElementById(
                'estimasiLayanan'
            );

        const previewNama =
            document.getElementById(
                'previewNama'
            );

        const previewHarga =
            document.getElementById(
                'previewHarga'
            );

        const previewEstimasi =
            document.getElementById(
                'previewEstimasi'
            );


        function rupiah(value)
        {
            const number =
                Number(value || 0);

            return (
                'Rp ' +
                number.toLocaleString(
                    'id-ID'
                )
            );
        }


        function updatePreview()
        {
            if (
                namaInput
                &&
                previewNama
            ) {

                previewNama.textContent =
                    namaInput.value.trim()
                    || 'Nama Layanan';

            }


            if (
                hargaInput
                &&
                previewHarga
            ) {

                previewHarga.textContent =
                    rupiah(
                        hargaInput.value
                    );

            }


            if (
                estimasiInput
                &&
                previewEstimasi
            ) {

                previewEstimasi.textContent =
                    estimasiInput.value.trim()
                    || 'Belum ditentukan';

            }
        }


        [
            namaInput,
            hargaInput,
            estimasiInput
        ]
        .forEach(
            function (input) {

                if (input) {

                    input.addEventListener(
                        'input',
                        updatePreview
                    );

                }

            }
        );


        updatePreview();

    }
);

</script>

@endpush