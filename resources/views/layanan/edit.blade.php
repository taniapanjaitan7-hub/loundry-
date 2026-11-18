@extends('layouts.app')

@section('title', 'Edit Layanan - Tania Mutiara Laundry')


@push('styles')

<style>

    /* =========================================================
       EDIT LAYANAN PREMIUM
    ========================================================= */

    .edit-service-page {
        width: 100%;
        max-width: 1050px;
        margin: 0 auto;
    }


    /* =========================================================
       HERO
    ========================================================= */

    .edit-service-hero {
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


    .edit-service-hero::before {
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


    .edit-service-hero::after {
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


    .edit-service-hero-content {
        position: relative;
        z-index: 2;
    }


    .edit-service-hero h1 {
        margin:
            0 0 8px;

        font-size: 28px;
    }


    .edit-service-hero p {
        margin: 0;

        max-width: 620px;

        color:
            rgba(255,255,255,.84);

        font-size: 12px;

        line-height: 1.7;
    }


    .edit-service-hero-icon {
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

        font-size: 44px;
    }



    /* =========================================================
       ALERT
    ========================================================= */

    .edit-service-error {
        margin-bottom: 20px;

        padding: 14px 16px;

        background: #fee2e2;

        border:
            1px solid #fecaca;

        border-radius: 11px;

        color: #991b1b;

        font-size: 11px;
    }


    .edit-service-error ul {
        margin:
            8px 0 0;

        padding-left: 20px;
    }



    /* =========================================================
       GRID
    ========================================================= */

    .edit-service-grid {
        display: grid;

        grid-template-columns:
            minmax(0, 1.5fr)
            minmax(260px, .65fr);

        gap: 20px;

        align-items: start;
    }



    /* =========================================================
       PANEL
    ========================================================= */

    .edit-service-panel {
        padding: 24px;

        background: white;

        border:
            1px solid #e8eef7;

        border-radius: 19px;

        box-shadow:
            0 8px 25px
            rgba(15,23,42,.06);
    }


    .edit-service-panel-header {
        margin-bottom: 22px;
    }


    .edit-service-panel-header h2 {
        margin:
            0 0 5px;

        color: #0f172a;

        font-size: 18px;
    }


    .edit-service-panel-header p {
        margin: 0;

        color: #94a3b8;

        font-size: 9px;

        line-height: 1.5;
    }



    /* =========================================================
       FORM
    ========================================================= */

    .edit-form-group {
        margin-bottom: 17px;
    }


    .edit-form-group label {
        display: block;

        margin-bottom: 7px;

        color: #334155;

        font-size: 11px;

        font-weight: 700;
    }


    .edit-form-group input {
        width: 100%;

        padding: 12px;

        background: white;

        border:
            1px solid #cbd5e1;

        border-radius: 9px;

        outline: none;

        color: #1e293b;

        font-size: 11px;

        transition: .2s;
    }


    .edit-form-group input:focus {
        border-color: #2563eb;

        box-shadow:
            0 0 0 3px
            rgba(37,99,235,.09);
    }


    .edit-form-note {
        margin-top: -5px;

        color: #94a3b8;

        font-size: 8px;

        line-height: 1.5;
    }



    /* =========================================================
       BUTTON
    ========================================================= */

    .edit-service-actions {
        display: flex;

        gap: 8px;

        margin-top: 23px;

        flex-wrap: wrap;
    }


    .edit-service-btn {
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


    .edit-service-btn:hover {
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


    .btn-secondary {
        background: #64748b;

        color: white;
    }



    /* =========================================================
       SUMMARY
    ========================================================= */

    .service-summary-card {
        padding: 22px;

        background: white;

        border:
            1px solid #e8eef7;

        border-radius: 19px;

        box-shadow:
            0 8px 25px
            rgba(15,23,42,.06);
    }


    .service-summary-icon {
        width: 60px;
        height: 60px;

        display: flex;
        align-items: center;
        justify-content: center;

        margin-bottom: 15px;

        border-radius: 17px;

        background:
            linear-gradient(
                135deg,
                #dbeafe,
                #e0f2fe
            );

        font-size: 28px;
    }


    .service-summary-card h3 {
        margin:
            0 0 6px;

        color: #0f172a;

        font-size: 16px;
    }


    .service-summary-id {
        margin-bottom: 18px;

        color: #94a3b8;

        font-size: 8px;
    }


    .summary-item {
        padding: 12px 0;

        border-bottom:
            1px solid #edf2f7;
    }


    .summary-item:last-child {
        border-bottom: none;
    }


    .summary-item small {
        display: block;

        margin-bottom: 5px;

        color: #64748b;

        font-size: 8px;

        font-weight: 700;

        text-transform: uppercase;
    }


    .summary-item strong {
        color: #0f172a;

        font-size: 11px;
    }


    .summary-price {
        color: #059669 !important;

        font-size: 18px !important;
    }



    /* =========================================================
       INFO
    ========================================================= */

    .edit-info-box {
        margin-top: 16px;

        padding: 12px;

        background: #eff6ff;

        border:
            1px solid #dbeafe;

        border-radius: 10px;

        color: #1d4ed8;

        font-size: 8px;

        line-height: 1.6;
    }



    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media(max-width: 850px) {

        .edit-service-grid {
            grid-template-columns:
                1fr;
        }

    }


    @media(max-width: 650px) {

        .edit-service-hero {
            align-items: flex-start;

            flex-direction: column;
        }


        .edit-service-hero-icon {
            display: none;
        }


        .edit-service-actions {
            flex-direction: column;
        }


        .edit-service-actions
        .edit-service-btn {
            width: 100%;
        }

    }

</style>

@endpush



@section('content')


<div class="edit-service-page">


    <!-- =====================================================
         HERO
    ====================================================== -->

    <section class="edit-service-hero">


        <div class="edit-service-hero-content">

            <h1>
                ✏️ Edit Layanan
            </h1>

            <p>
                Perbarui nama layanan, harga, dan estimasi
                pengerjaan agar informasi layanan
                Tania Mutiara Laundry selalu sesuai.
            </p>

        </div>


        <div class="edit-service-hero-icon">

            👕

        </div>


    </section>



    <!-- =====================================================
         ERROR
    ====================================================== -->

    @if($errors->any())

        <div class="edit-service-error">

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
         GRID
    ====================================================== -->

    <div class="edit-service-grid">


        <!-- =================================================
             FORM EDIT
        ================================================== -->

        <div class="edit-service-panel">


            <div class="edit-service-panel-header">

                <h2>
                    📝 Form Edit Layanan
                </h2>

                <p>
                    Ubah informasi layanan kemudian
                    tekan tombol Simpan Perubahan.
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



                <!-- NAMA -->

                <div class="edit-form-group">

                    <label>
                        👕 Nama Layanan
                    </label>


                    <input
                        type="text"
                        name="nama_layanan"
                        value="{{
                            old(
                                'nama_layanan',
                                $layanan->nama_layanan
                            )
                        }}"
                        placeholder="Contoh: Cuci Setrika"
                        required
                    >


                    <div class="edit-form-note">

                        Gunakan nama layanan yang
                        mudah dipahami pelanggan.

                    </div>

                </div>



                <!-- HARGA -->

                <div class="edit-form-group">

                    <label>
                        💰 Harga Layanan
                    </label>


                    <input
                        type="number"
                        name="harga"
                        id="harga"
                        value="{{
                            old(
                                'harga',
                                $layanan->harga
                            )
                        }}"
                        placeholder="Contoh: 10000"
                        min="0"
                        step="1"
                        required
                    >


                    <div class="edit-form-note">

                        Masukkan nominal angka tanpa
                        titik atau tanda rupiah.

                    </div>

                </div>



                <!-- ESTIMASI -->

                <div class="edit-form-group">

                    <label>
                        ⏱ Estimasi Pengerjaan
                    </label>


                    <input
                        type="text"
                        name="estimasi"
                        id="estimasi"
                        value="{{
                            old(
                                'estimasi',
                                $layanan->estimasi
                            )
                        }}"
                        placeholder="Contoh: 2 Hari"
                    >


                    <div class="edit-form-note">

                        Contoh:
                        1 Hari,
                        2 Hari,
                        3 Jam,
                        atau Express.

                    </div>

                </div>



                <!-- ACTION -->

                <div class="edit-service-actions">


                    <button
                        type="submit"
                        class="
                            edit-service-btn
                            btn-primary
                        "
                    >

                        💾 Simpan Perubahan

                    </button>


                    <a
                        href="{{
                            route(
                                'layanan.index'
                            )
                        }}"
                        class="
                            edit-service-btn
                            btn-secondary
                        "
                    >

                        ← Kembali

                    </a>


                </div>


            </form>


        </div>



        <!-- =================================================
             SUMMARY
        ================================================== -->

        <aside class="service-summary-card">


            <div class="service-summary-icon">

                🫧

            </div>


            <h3>
                {{ $layanan->nama_layanan }}
            </h3>


            <div class="service-summary-id">

                ID Layanan
                #{{ $layanan->id }}

            </div>



            <div class="summary-item">

                <small>
                    Harga Saat Ini
                </small>


                <strong class="summary-price">

                    Rp
                    {{
                        number_format(
                            $layanan->harga,
                            0,
                            ',',
                            '.'
                        )
                    }}

                </strong>

            </div>



            <div class="summary-item">

                <small>
                    Estimasi Saat Ini
                </small>


                <strong>

                    {{
                        $layanan->estimasi
                        ?? 'Belum ditentukan'
                    }}

                </strong>

            </div>



            <div class="summary-item">

                <small>
                    Status Layanan
                </small>


                <strong
                    style="
                        color:#16a34a;
                    "
                >
                    ● Aktif
                </strong>

            </div>



            <div class="edit-info-box">

                💡 Perubahan harga layanan
                akan digunakan pada transaksi
                baru setelah data disimpan.

            </div>


        </aside>


    </div>


</div>


@endsection