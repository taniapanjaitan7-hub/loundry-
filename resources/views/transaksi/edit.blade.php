@extends('layouts.app')

@section('title', 'Edit Transaksi - Tania Mutiara Laundry')


@push('styles')

<style>

    /* =========================================================
       EDIT TRANSAKSI PREMIUM
    ========================================================= */

    .edit-transaction-page {
        width: 100%;
        max-width: 1100px;
        margin: 0 auto;
    }


    /* =========================================================
       HEADER
    ========================================================= */

    .edit-header {
        display: flex;
        justify-content: space-between;
        align-items: center;

        gap: 20px;

        margin-bottom: 24px;

        flex-wrap: wrap;
    }


    .edit-header h1 {
        margin: 0 0 6px;

        color: #0f172a;

        font-size: 28px;
    }


    .edit-header p {
        margin: 0;

        color: #64748b;

        font-size: 12px;
    }


    .transaction-code-badge {
        display: inline-flex;
        align-items: center;

        gap: 7px;

        padding: 9px 14px;

        background: #eff6ff;

        border:
            1px solid #bfdbfe;

        border-radius: 30px;

        color: #1d4ed8;

        font-size: 11px;

        font-weight: 700;
    }



    /* =========================================================
       ALERT
    ========================================================= */

    .edit-error {
        margin-bottom: 20px;

        padding: 14px 16px;

        background: #fee2e2;

        border:
            1px solid #fecaca;

        border-radius: 11px;

        color: #991b1b;

        font-size: 12px;
    }


    .edit-error ul {
        margin:
            8px 0 0;

        padding-left: 20px;
    }



    /* =========================================================
       PANEL
    ========================================================= */

    .edit-panel {
        margin-bottom: 24px;

        padding: 25px;

        background: white;

        border:
            1px solid #e8eef7;

        border-radius: 20px;

        box-shadow:
            0 8px 25px
            rgba(15,23,42,.06);
    }


    .edit-panel-header {
        display: flex;
        justify-content: space-between;
        align-items: center;

        gap: 15px;

        margin-bottom: 22px;

        flex-wrap: wrap;
    }


    .edit-panel-header h2 {
        margin: 0;

        color: #0f172a;

        font-size: 18px;
    }


    .edit-panel-header p {
        margin:
            5px 0 0;

        color: #94a3b8;

        font-size: 10px;
    }



    /* =========================================================
       RINGKASAN TRANSAKSI
    ========================================================= */

    .transaction-summary {
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


    .summary-money strong {
        color: #059669;

        font-size: 16px;
    }



    /* =========================================================
       FORM
    ========================================================= */

    .edit-form-grid {
        display: grid;

        grid-template-columns:
            repeat(2, 1fr);

        gap: 18px;
    }


    .edit-form-group {
        margin-bottom: 2px;
    }


    .edit-form-group.full {
        grid-column:
            1 / -1;
    }


    .edit-form-group label {
        display: block;

        margin-bottom: 7px;

        color: #334155;

        font-size: 12px;

        font-weight: 700;
    }


    .edit-form-group input,
    .edit-form-group select,
    .edit-form-group textarea {
        width: 100%;

        padding: 11px 12px;

        background: white;

        border:
            1px solid #cbd5e1;

        border-radius: 9px;

        outline: none;

        color: #1e293b;

        font-size: 12px;

        transition: .2s;
    }


    .edit-form-group input:focus,
    .edit-form-group select:focus,
    .edit-form-group textarea:focus {
        border-color: #2563eb;

        box-shadow:
            0 0 0 3px
            rgba(37,99,235,.09);
    }


    .edit-form-group textarea {
        resize: vertical;
    }



    /* =========================================================
       TOTAL PREVIEW
    ========================================================= */

    .total-preview {
        position: relative;
        overflow: hidden;

        padding: 20px;

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


    .total-preview small {
        display: block;

        color: #64748b;

        font-size: 10px;

        font-weight: 700;

        text-transform: uppercase;
    }


    .total-preview h2 {
        margin:
            7px 0 0;

        color: #1d4ed8;

        font-size: 28px;
    }



    /* =========================================================
       PAYMENT STATUS
    ========================================================= */

    .status-info {
        display: flex;

        gap: 10px;

        flex-wrap: wrap;

        margin-top: 10px;
    }


    .status-badge {
        display: inline-flex;
        align-items: center;

        padding: 6px 10px;

        border-radius: 20px;

        font-size: 9px;

        font-weight: 700;
    }


    .status-lunas {
        background: #dcfce7;

        color: #166534;
    }


    .status-belum {
        background: #fee2e2;

        color: #991b1b;
    }


    .status-laundry {
        background: #dbeafe;

        color: #1d4ed8;
    }



    /* =========================================================
       BUTTON
    ========================================================= */

    .edit-actions {
        display: flex;

        gap: 10px;

        margin-top: 23px;

        flex-wrap: wrap;
    }


    .edit-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        gap: 6px;

        padding: 11px 16px;

        border: none;

        border-radius: 9px;

        cursor: pointer;

        text-decoration: none;

        font-size: 11px;

        font-weight: 700;

        transition: .2s;
    }


    .edit-btn:hover {
        transform:
            translateY(-1px);
    }


    .btn-save {
        background: #2563eb;

        color: white;
    }


    .btn-save:hover {
        background: #1d4ed8;
    }


    .btn-back {
        background: #64748b;

        color: white;
    }


    .btn-detail {
        background: #0ea5e9;

        color: white;
    }



    /* =========================================================
       RESPONSIVE
    ========================================================= */

    @media(max-width: 950px) {

        .transaction-summary {
            grid-template-columns:
                repeat(2, 1fr);
        }

    }


    @media(max-width: 700px) {

        .edit-form-grid {
            grid-template-columns:
                1fr;
        }


        .edit-form-group.full {
            grid-column:
                auto;
        }


        .transaction-summary {
            grid-template-columns:
                1fr;
        }

    }

</style>

@endpush



@section('content')


<div class="edit-transaction-page">


    <!-- =====================================================
         HEADER
    ====================================================== -->

    <div class="edit-header">


        <div>

            <h1>
                ✏️ Edit Transaksi
            </h1>

            <p>
                Perbarui data pesanan laundry pelanggan
                dengan aman dan mudah.
            </p>

        </div>


        <div class="transaction-code-badge">

            🧾 {{ $transaksi->kode_transaksi }}

        </div>


    </div>



    <!-- =====================================================
         VALIDATION ERROR
    ====================================================== -->

    @if($errors->any())

        <div class="edit-error">

            <strong>
                Data belum benar:
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
         RINGKASAN TRANSAKSI
    ====================================================== -->

    <div class="transaction-summary">


        <!-- PELANGGAN -->

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



        <!-- LAYANAN -->

        <div class="summary-card">

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



        <!-- PEMBAYARAN -->

        <div class="summary-card">

            <small>
                Pembayaran
            </small>

            <strong>
                {{ $transaksi->status_pembayaran }}
            </strong>

        </div>



        <!-- TOTAL -->

        <div class="summary-card summary-money">

            <small>
                Total Saat Ini
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
         FORM EDIT
    ====================================================== -->

    <div class="edit-panel">


        <div class="edit-panel-header">


            <div>

                <h2>
                    📝 Informasi Transaksi
                </h2>

                <p>
                    Perubahan harga akan dihitung otomatis
                    berdasarkan layanan dan berat laundry.
                </p>

            </div>


            <div class="status-info">


                @if(
                    $transaksi->status_pembayaran
                    === 'Lunas'
                )

                    <span class="status-badge status-lunas">

                        ✓ Lunas

                    </span>

                @else

                    <span class="status-badge status-belum">

                        Belum Lunas

                    </span>

                @endif


                <span class="status-badge status-laundry">

                    {{ $transaksi->status_laundry }}

                </span>


            </div>


        </div>



        <form
            method="POST"
            action="{{
                route(
                    'transaksi.update',
                    $transaksi
                )
            }}"
        >

            @csrf

            @method('PUT')



            <div class="edit-form-grid">


                <!-- =================================================
                     PELANGGAN
                ================================================== -->

                <div class="edit-form-group">

                    <label>
                        👤 Pelanggan
                    </label>


                    <select
                        name="pelanggan_id"
                        required
                    >


                        @foreach(
                            $pelanggans
                            as $pelanggan
                        )


                            <option
                                value="{{ $pelanggan->id }}"

                                {{
                                    old(
                                        'pelanggan_id',
                                        $transaksi
                                            ->pelanggan_id
                                    )
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



                <!-- =================================================
                     LAYANAN
                ================================================== -->

                <div class="edit-form-group">

                    <label>
                        👕 Layanan
                    </label>


                    <select
                        name="layanan_id"
                        id="layananEdit"
                        required
                    >


                        @foreach(
                            $layanans
                            as $layanan
                        )


                            <option
                                value="{{ $layanan->id }}"

                                data-harga="{{ $layanan->harga }}"

                                {{
                                    old(
                                        'layanan_id',
                                        $transaksi
                                            ->layanan_id
                                    )
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



                <!-- =================================================
                     BERAT
                ================================================== -->

                <div class="edit-form-group">

                    <label>
                        ⚖️ Berat Laundry (Kg)
                    </label>


                    <input
                        type="number"
                        name="berat"
                        id="beratEdit"
                        step="0.1"
                        min="0.1"

                        value="{{
                            old(
                                'berat',
                                $transaksi->berat
                            )
                        }}"

                        required
                    >

                </div>



                <!-- =================================================
                     TANGGAL SELESAI
                ================================================== -->

                <div class="edit-form-group">

                    <label>
                        📅 Perkiraan Tanggal Selesai
                    </label>


                    <input
                        type="date"
                        name="tanggal_selesai"

                        value="{{
                            old(
                                'tanggal_selesai',
                                $transaksi
                                    ->tanggal_selesai
                                ? \Carbon\Carbon::parse(
                                    $transaksi
                                        ->tanggal_selesai
                                )->format('Y-m-d')
                                : ''
                            )
                        }}"
                    >

                </div>



                <!-- =================================================
                     PENGAMBILAN
                ================================================== -->

                <div class="edit-form-group">

                    <label>
                        🚚 Jenis Pengambilan
                    </label>


                    <select
                        name="jenis_pengambilan"
                        id="jenisPengambilanEdit"
                        required
                    >


                        <option
                            value="ambil_sendiri"

                            {{
                                old(
                                    'jenis_pengambilan',
                                    $transaksi
                                        ->jenis_pengambilan
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
                                old(
                                    'jenis_pengambilan',
                                    $transaksi
                                        ->jenis_pengambilan
                                )
                                === 'kirim'
                                ? 'selected'
                                : ''
                            }}
                        >

                            Kirim ke Alamat

                        </option>


                    </select>

                </div>



                <!-- =================================================
                     ALAMAT KIRIM
                ================================================== -->

                <div
                    class="edit-form-group"
                    id="alamatEditBox"
                >

                    <label>
                        📍 Alamat Pengiriman
                    </label>


                    <textarea
                        name="alamat_kirim"
                        rows="3"
                        placeholder="Masukkan alamat pengiriman"
                    >{{
                        old(
                            'alamat_kirim',
                            $transaksi->alamat_kirim
                        )
                    }}</textarea>

                </div>



                <!-- =================================================
                     CATATAN
                ================================================== -->

                <div class="edit-form-group full">

                    <label>
                        📝 Catatan
                    </label>


                    <textarea
                        name="catatan"
                        rows="3"
                        placeholder="Catatan tambahan untuk transaksi..."
                    >{{
                        old(
                            'catatan',
                            $transaksi->catatan
                        )
                    }}</textarea>

                </div>



                <!-- =================================================
                     TOTAL PREVIEW
                ================================================== -->

                <div class="edit-form-group full">


                    <div class="total-preview">


                        <small>
                            Estimasi Total Setelah Perubahan
                        </small>


                        <h2 id="totalEditPreview">

                            Rp
                            {{
                                number_format(
                                    $transaksi->total,
                                    0,
                                    ',',
                                    '.'
                                )
                            }}

                        </h2>


                    </div>


                </div>


            </div>



            <!-- =================================================
                 ACTION
            ================================================== -->

            <div class="edit-actions">


                <button
                    type="submit"
                    class="edit-btn btn-save"
                >

                    💾 Simpan Perubahan

                </button>


                <a
                    href="{{
                        route(
                            'transaksi.show',
                            $transaksi
                        )
                    }}"
                    class="edit-btn btn-detail"
                >

                    👁 Detail / Struk

                </a>


                <a
                    href="{{ route('transaksi.index') }}"
                    class="edit-btn btn-back"
                >

                    ← Kembali

                </a>


            </div>


        </form>


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
                'layananEdit'
            );


        const berat =
            document.getElementById(
                'beratEdit'
            );


        const totalPreview =
            document.getElementById(
                'totalEditPreview'
            );


        function hitungTotalEdit()
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


            const beratValue =
                Number(
                    berat.value
                    || 0
                );


            const total =
                harga *
                beratValue;


            totalPreview.innerText =
                'Rp ' +
                new Intl.NumberFormat(
                    'id-ID'
                ).format(
                    Math.round(total)
                );
        }


        layanan?.addEventListener(
            'change',
            hitungTotalEdit
        );


        berat?.addEventListener(
            'input',
            hitungTotalEdit
        );


        hitungTotalEdit();



        /*
        |--------------------------------------------------------------------------
        | ALAMAT PENGIRIMAN
        |--------------------------------------------------------------------------
        */

        const jenisPengambilan =
            document.getElementById(
                'jenisPengambilanEdit'
            );


        const alamatBox =
            document.getElementById(
                'alamatEditBox'
            );


        function cekJenisPengambilan()
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


        jenisPengambilan
            ?.addEventListener(
                'change',
                cekJenisPengambilan
            );


        cekJenisPengambilan();

    }
);

</script>

@endpush