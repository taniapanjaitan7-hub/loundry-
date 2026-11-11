<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta
    name="viewport"
    content="width=device-width, initial-scale=1.0"
>

<title>Transaksi - Tania Laundry</title>

<style>

* {
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    margin: 0;
    background: #f5f7fb;
    color: #1f2937;
}


/* SIDEBAR */

.sidebar {
    width: 240px;
    height: 100vh;

    position: fixed;
    left: 0;
    top: 0;

    background:
        linear-gradient(
            180deg,
            #2563eb,
            #1d4ed8
        );

    padding: 28px 18px;
    color: white;
}

.logo {
    font-size: 21px;
    font-weight: bold;
    margin-bottom: 35px;
}

.sidebar a {
    display: block;

    padding: 12px 14px;

    margin-bottom: 7px;

    color: white;

    text-decoration: none;

    border-radius: 9px;

    transition: .2s;
}

.sidebar a:hover,
.sidebar .active {
    background:
        rgba(255,255,255,.18);
}


/* CONTENT */

.content {
    margin-left: 240px;
    padding: 32px;
}

.header h1 {
    margin-bottom: 6px;
}

.header p {
    margin-top: 0;
    color: #6b7280;
}


/* CARDS */

.cards {
    display: grid;

    grid-template-columns:
        repeat(3, 1fr);

    gap: 18px;

    margin: 25px 0;
}

.card {
    background: white;

    padding: 22px;

    border-radius: 14px;

    box-shadow:
        0 3px 15px
        rgba(0,0,0,.06);
}

.card small {
    color: #6b7280;
}

.card h2 {
    color: #2563eb;
    margin-bottom: 0;
}


/* BOX */

.box {
    background: white;

    padding: 25px;

    border-radius: 14px;

    margin-bottom: 25px;

    box-shadow:
        0 3px 15px
        rgba(0,0,0,.06);
}


/* FORM */

.form-grid {
    display: grid;

    grid-template-columns:
        repeat(2, 1fr);

    gap: 18px;
}

.form-group {
    margin-bottom: 10px;
}

.full {
    grid-column: 1 / -1;
}

label {
    display: block;

    margin-bottom: 7px;

    font-weight: 600;

    font-size: 14px;
}

input,
select,
textarea {

    width: 100%;

    padding: 11px 12px;

    border:
        1px solid #d1d5db;

    border-radius: 8px;

    outline: none;

    background: white;
}

input:focus,
select:focus,
textarea:focus {
    border-color: #2563eb;
}


/* TOTAL */

.total-box {

    padding: 18px;

    border-radius: 10px;

    background: #eff6ff;

    border:
        1px solid #bfdbfe;
}

.total-box small {
    color: #6b7280;
}

.total-box h2 {
    margin:
        5px 0 0;

    color: #1d4ed8;
}


/* BUTTON */

.btn {
    border: 0;

    padding: 10px 15px;

    border-radius: 7px;

    cursor: pointer;

    font-weight: 600;

    text-decoration: none;

    display: inline-block;
}

.btn-primary {
    background: #2563eb;
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


/* ALERT */

.alert {
    background: #dcfce7;

    color: #166534;

    padding: 13px;

    border-radius: 9px;

    margin-bottom: 20px;
}


/* TABLE */

.table-wrapper {
    overflow-x: auto;
}

table {
    width: 100%;

    border-collapse: collapse;

    min-width: 1150px;
}

th {
    background: #f8fafc;

    font-size: 13px;

    color: #475569;

    text-transform: uppercase;

    letter-spacing: .3px;
}

th,
td {
    padding: 13px;

    border-bottom:
        1px solid #e5e7eb;

    text-align: left;
}

tbody tr:hover {
    background: #f8fafc;
}


/* BADGE */

.badge {
    display: inline-block;

    padding: 5px 9px;

    border-radius: 20px;

    font-size: 12px;

    font-weight: bold;
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


/* ACTION */

.action {
    display: flex;
    gap: 5px;
    flex-wrap: wrap;
}

.payment-form {
    display: flex;
    gap: 5px;
}

.payment-form select {
    width: 95px;
    padding: 7px;
}


/* QRIS */

.qris-box {

    display: none;

    padding: 18px;

    background: #fafafa;

    border:
        2px dashed #cbd5e1;

    border-radius: 10px;

    text-align: center;
}

.qris-placeholder {

    width: 150px;
    height: 150px;

    margin: auto;

    display: flex;

    align-items: center;

    justify-content: center;

    background: white;

    border:
        2px solid #111827;

    font-size: 24px;

    font-weight: bold;

    margin-bottom: 10px;
}


/* RESPONSIVE */

@media(max-width:900px) {

    .sidebar {
        width: 200px;
    }

    .content {
        margin-left: 200px;
    }

    .cards,
    .form-grid {
        grid-template-columns: 1fr;
    }

}

</style>

</head>


<body>


<div class="sidebar">

    <div class="logo">
        🧺 Tania Laundry
    </div>

    <a href="{{ route('dashboard') }}">
        Dashboard
    </a>

    <a href="{{ route('pelanggan.index') }}">
        Pelanggan
    </a>

    <a
        href="{{ route('transaksi.index') }}"
        class="active"
    >
        Transaksi
    </a>

    <a href="{{ route('layanan.index') }}">
        Layanan
    </a>

    <a href="#">
        Status Laundry
    </a>

    <a href="{{ route('laporan.index') }}">
        Laporan
    </a>

</div>


<div class="content">


<div class="header">

    <h1>Transaksi Laundry</h1>

    <p>
        Kelola pesanan, pembayaran,
        pengiriman dan status laundry.
    </p>

</div>


@if(session('success'))

    <div class="alert">
        {{ session('success') }}
    </div>

@endif


<div class="cards">

    <div class="card">

        <small>Total Transaksi</small>

        <h2>
            {{ $totalTransaksi }}
        </h2>

    </div>


    <div class="card">

        <small>Belum Lunas</small>

        <h2>
            {{ $belumLunas }}
        </h2>

    </div>


    <div class="card">

        <small>Pendapatan Lunas</small>

        <h2>
            Rp {{ number_format(
                $pendapatan,
                0,
                ',',
                '.'
            ) }}
        </h2>

    </div>

</div>



<div class="box">

<h2>Tambah Transaksi</h2>

<form
    method="POST"
    action="{{ route('transaksi.store') }}"
>

@csrf


<div class="form-grid">


<div class="form-group">

    <label>Pelanggan</label>

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
            >

                {{ $pelanggan->nama }}
                -
                {{ $pelanggan->no_hp }}

            </option>

        @endforeach

    </select>

</div>



<div class="form-group">

    <label>Layanan</label>

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
        >

            {{ $layanan->nama_layanan }}

            -
            Rp {{ number_format(
                $layanan->harga,
                0,
                ',',
                '.'
            ) }}

        </option>

        @endforeach

    </select>

</div>



<div class="form-group">

    <label>Berat Laundry (Kg)</label>

    <input
        type="number"
        name="berat"
        id="berat"
        step="0.1"
        min="0.1"
        placeholder="Contoh: 3.5"
        required
    >

</div>



<div class="form-group">

    <label>Perkiraan Selesai</label>

    <input
        type="date"
        name="tanggal_selesai"
    >

</div>



<div class="form-group">

    <label>Pengambilan</label>

    <select
        name="jenis_pengambilan"
        id="jenisPengambilan"
    >

        <option value="ambil_sendiri">
            Ambil Sendiri
        </option>

        <option value="kirim">
            Kirim ke Alamat
        </option>

    </select>

</div>



<div
    class="form-group"
    id="alamatBox"
    style="display:none;"
>

    <label>Alamat Pengiriman</label>

    <textarea
        name="alamat_kirim"
        rows="2"
        placeholder="Masukkan alamat pengiriman"
    ></textarea>

</div>



<div class="form-group">

    <label>Pembayaran</label>

    <select
        name="cara_bayar"
        id="caraBayar"
    >

        <option value="langsung">
            Langsung Bayar
        </option>

        <option value="nanti">
            Bayar Nanti
        </option>

    </select>

</div>



<div
    class="form-group"
    id="metodeBox"
>

    <label>Metode Pembayaran</label>

    <select
        name="metode_pembayaran"
        id="metodePembayaran"
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

</div>



<div
    class="form-group full qris-box"
    id="qrisBox"
>

    @if(file_exists(
        public_path('images/qris.png')
    ))

        <img
            src="{{ asset('images/qris.png') }}"
            width="180"
            alt="QRIS"
        >

    @else

        <div class="qris-placeholder">
            QRIS
        </div>

        <small>
            Tambahkan gambar QRIS toko
            ke public/images/qris.png
        </small>

    @endif

</div>



<div class="form-group full">

    <label>Catatan</label>

    <textarea
        name="catatan"
        rows="2"
        placeholder="Catatan tambahan..."
    ></textarea>

</div>



<div class="form-group full">

    <div class="total-box">

        <small>
            Total Pembayaran
        </small>

        <h2 id="totalPreview">
            Rp 0
        </h2>

    </div>

</div>


</div>


<br>

<button
    type="submit"
    class="btn btn-primary"
>

    + Simpan Transaksi

</button>


</form>

</div>



<div class="box">

<h2>Daftar Transaksi</h2>

<br>


<div class="table-wrapper">

<table>


<thead>

<tr>

    <th>Kode</th>
    <th>Pelanggan</th>
    <th>Layanan</th>
    <th>Berat</th>
    <th>Total</th>
    <th>Pengambilan</th>
    <th>Pembayaran</th>
    <th>Status Cucian</th>
    <th>Aksi</th>

</tr>

</thead>


<tbody>


@forelse(
    $transaksis
    as $transaksi
)


<tr>


<td>

    <strong>
        {{ $transaksi->kode_transaksi }}
    </strong>

</td>


<td>

    {{ $transaksi->pelanggan->nama }}

    <br>

    <small>
        {{ $transaksi->pelanggan->no_hp }}
    </small>

</td>


<td>

    {{ $transaksi->layanan->nama_layanan }}

</td>


<td>

    {{ $transaksi->berat }} Kg

</td>


<td>

    <strong>

        Rp {{ number_format(
            $transaksi->total,
            0,
            ',',
            '.'
        ) }}

    </strong>

</td>


<td>

    @if(
        $transaksi->jenis_pengambilan
        === 'kirim'
    )

        <span class="badge badge-blue">
            Kirim
        </span>

    @else

        <span class="badge badge-orange">
            Ambil Sendiri
        </span>

    @endif

</td>


<td>


@if(
    $transaksi->status_pembayaran
    === 'Lunas'
)

    <span class="badge badge-green">
        Lunas
    </span>

    <br>

    <small>
        {{ $transaksi->metode_pembayaran }}
    </small>


@else


    <span class="badge badge-red">
        Belum Lunas
    </span>

    <br><br>


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
            class="btn btn-success"
        >
            Bayar
        </button>

    </form>


@endif


</td>



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
        $transaksi->status_laundry
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



<td>


<div class="action">


<a
    href="{{
        route(
            'transaksi.edit',
            $transaksi
        )
    }}"
    class="btn btn-warning"
>

    Edit

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
            'Yakin ingin menghapus transaksi ini?'
        )
    "
>

@csrf

@method('DELETE')


<button
    type="submit"
    class="btn btn-danger"
>

    Hapus

</button>


</form>


</div>


</td>


</tr>


@empty


<tr>

<td
    colspan="9"
    style="text-align:center;"
>

    Belum ada transaksi.

</td>

</tr>


@endforelse


</tbody>


</table>

</div>

</div>


</div>



<script>


const layanan =
    document.getElementById('layanan');

const berat =
    document.getElementById('berat');

const totalPreview =
    document.getElementById('totalPreview');


function hitungTotal() {

    const option =
        layanan.options[
            layanan.selectedIndex
        ];

    const harga =
        Number(
            option?.dataset.harga || 0
        );

    const jumlahBerat =
        Number(
            berat.value || 0
        );

    const total =
        harga * jumlahBerat;

    totalPreview.innerText =
        'Rp ' +
        new Intl.NumberFormat(
            'id-ID'
        ).format(total);

}


layanan.addEventListener(
    'change',
    hitungTotal
);

berat.addEventListener(
    'input',
    hitungTotal
);



const jenisPengambilan =
    document.getElementById(
        'jenisPengambilan'
    );

const alamatBox =
    document.getElementById(
        'alamatBox'
    );


jenisPengambilan.addEventListener(
    'change',
    function () {

        alamatBox.style.display =
            this.value === 'kirim'
                ? 'block'
                : 'none';

    }
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


function pembayaran() {

    if (
        caraBayar.value === 'nanti'
    ) {

        metodeBox.style.display =
            'none';

        qrisBox.style.display =
            'none';

    } else {

        metodeBox.style.display =
            'block';

        cekQris();

    }

}


function cekQris() {

    qrisBox.style.display =
        (
            caraBayar.value ===
            'langsung'
            &&
            metodePembayaran.value ===
            'QRIS'
        )
        ? 'block'
        : 'none';

}


caraBayar.addEventListener(
    'change',
    pembayaran
);

metodePembayaran.addEventListener(
    'change',
    cekQris
);


pembayaran();


</script>


</body>

</html>