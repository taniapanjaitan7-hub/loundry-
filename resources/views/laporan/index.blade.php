<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Laporan - Tania Mutiara Laundry</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            background: #f4f7fb;
            color: #1e293b;
        }

        /* SIDEBAR */
        .sidebar {
            width: 230px;
            min-height: 100vh;
            background: #2563eb;
            position: fixed;
            left: 0;
            top: 0;
            padding: 25px 20px;
            color: white;
        }

        .sidebar h2 {
            margin-top: 0;
            margin-bottom: 35px;
        }

        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 12px;
            margin-bottom: 8px;
            border-radius: 7px;
        }

        .sidebar a:hover {
            background: #1d4ed8;
        }

        .sidebar a.active {
            background: white;
            color: #2563eb;
            font-weight: bold;
        }

        /* CONTENT */
        .content {
            margin-left: 230px;
            padding: 30px;
        }

        .judul-web h1 {
            margin-bottom: 5px;
        }

        .judul-web p {
            color: #64748b;
            margin-top: 0;
        }

        /* FILTER */
        .filter-box {
            background: white;
            padding: 20px;
            border-radius: 12px;
            margin: 20px 0;
            box-shadow: 0 2px 8px rgba(0,0,0,.08);
        }

        .filter-form {
            display: flex;
            align-items: end;
            flex-wrap: wrap;
            gap: 15px;
        }

        .form-group {
            flex: 1;
            min-width: 180px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input[type="date"] {
            width: 100%;
            padding: 11px;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
        }

        /* BUTTON */
        .btn {
            border: none;
            padding: 11px 18px;
            border-radius: 7px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-secondary {
            background: #64748b;
            color: white;
        }

        .btn-print {
            background: #dc2626;
            color: white;
            margin: 15px 0 25px;
        }

        /* CARDS */
        .cards {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 15px;
            margin-bottom: 25px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,.08);
        }

        .card h3 {
            margin-top: 0;
            font-size: 14px;
            color: #64748b;
        }

        .card h2 {
            margin-bottom: 0;
            color: #2563eb;
        }

        .card.pendapatan h2 {
            color: #16a34a;
        }

        .card.belum-lunas h2 {
            color: #dc2626;
        }

        /* BOX */
        .box {
            background: white;
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 25px;
            box-shadow: 0 2px 8px rgba(0,0,0,.08);
        }

        .box h2 {
            margin-top: 0;
        }

        /* TABLE */
        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            padding: 11px;
            border: 1px solid #e2e8f0;
            text-align: left;
        }

        th {
            background: #f1f5f9;
        }

        .badge {
            padding: 5px 9px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: bold;
            display: inline-block;
        }

        .lunas {
            background: #dcfce7;
            color: #166534;
        }

        .belum {
            background: #fee2e2;
            color: #991b1b;
        }

        .status {
            background: #dbeafe;
            color: #1d4ed8;
        }

        /* HEADER PRINT */
        .header-laporan {
            display: none;
        }

        /* RESPONSIVE */
        @media(max-width: 1200px) {
            .cards {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        /* PRINT */
        @media print {

            body {
                background: white;
            }

            .sidebar,
            .judul-web,
            .filter-box,
            .btn-print {
                display: none !important;
            }

            .content {
                margin-left: 0;
                padding: 10px;
            }

            .header-laporan {
                display: block;
                text-align: center;
                margin-bottom: 25px;
            }

            .cards {
                grid-template-columns: repeat(5, 1fr);
            }

            .card,
            .box {
                box-shadow: none;
                border: 1px solid #ddd;
            }

            table {
                font-size: 10px;
            }
        }
    </style>
</head>

<body>

<div class="sidebar">

    <h2>🧺 Tania Laundry</h2>

    <a href="{{ route('dashboard') }}">
        🏠 Dashboard
    </a>

    <a href="{{ route('pelanggan.index') }}">
        👥 Pelanggan
    </a>

    <a href="{{ route('transaksi.index') }}">
        🧾 Transaksi
    </a>

    <a href="{{ route('layanan.index') }}">
        🧼 Layanan
    </a>

    <a href="{{ route('status.index') }}">
        🔄 Status Laundry
    </a>

    <a href="{{ route('laporan.index') }}" class="active">
        📊 Laporan
    </a>

</div>


<div class="content">

    <!-- HEADER UNTUK CETAK -->
    <div class="header-laporan">

        <h1>TANIA MUTIARA LAUNDRY</h1>

        <p>Laporan Sistem Informasi Laundry</p>

        @if($tanggalMulai || $tanggalAkhir)
            <p>
                Periode:
                {{ $tanggalMulai ? date('d-m-Y', strtotime($tanggalMulai)) : 'Awal' }}
                s/d
                {{ $tanggalAkhir ? date('d-m-Y', strtotime($tanggalAkhir)) : 'Sekarang' }}
            </p>
        @else
            <p>Semua Periode</p>
        @endif

        <p>
            Dicetak: {{ date('d-m-Y H:i') }}
        </p>

    </div>


    <!-- JUDUL -->
    <div class="judul-web">

        <h1>📊 Laporan Tania Laundry</h1>

        <p>
            Lihat transaksi, pendapatan, pelanggan,
            layanan, dan laporan berdasarkan periode.
        </p>

    </div>


    <!-- FILTER TANGGAL -->
    <div class="filter-box">

        <h3>📅 Filter Periode Laporan</h3>

        <form
            action="{{ route('laporan.index') }}"
            method="GET"
            class="filter-form"
        >

            <div class="form-group">

                <label>
                    Tanggal Mulai
                </label>

                <input
                    type="date"
                    name="tanggal_mulai"
                    value="{{ $tanggalMulai }}"
                >

            </div>


            <div class="form-group">

                <label>
                    Tanggal Akhir
                </label>

                <input
                    type="date"
                    name="tanggal_akhir"
                    value="{{ $tanggalAkhir }}"
                >

            </div>


            <button
                type="submit"
                class="btn btn-primary"
            >
                🔍 Tampilkan
            </button>


            @if($tanggalMulai || $tanggalAkhir)

                <a
                    href="{{ route('laporan.index') }}"
                    class="btn btn-secondary"
                >
                    Reset
                </a>

            @endif

        </form>

    </div>


    <!-- CETAK -->
    <button
        onclick="window.print()"
        class="btn btn-print"
    >
        🖨 Cetak / Simpan PDF
    </button>


    <!-- STATISTIK -->
    <div class="cards">

        <div class="card">

            <h3>Total Pelanggan</h3>

            <h2>
                {{ $totalPelanggan }}
            </h2>

        </div>


        <div class="card">

            <h3>Total Layanan</h3>

            <h2>
                {{ $totalLayanan }}
            </h2>

        </div>


        <div class="card">

            <h3>Total Transaksi</h3>

            <h2>
                {{ $totalTransaksi }}
            </h2>

        </div>


        <div class="card pendapatan">

            <h3>Pendapatan Lunas</h3>

            <h2>
                Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
            </h2>

        </div>


        <div class="card belum-lunas">

            <h3>Belum Lunas</h3>

            <h2>
                {{ $belumLunas }}
            </h2>

        </div>

    </div>


    <!-- DATA TRANSAKSI -->
    <div class="box">

        <h2>🧾 Data Transaksi</h2>

        @if($tanggalMulai || $tanggalAkhir)

            <p>
                Menampilkan transaksi periode:

                <strong>
                    {{ $tanggalMulai ? date('d-m-Y', strtotime($tanggalMulai)) : 'Awal' }}

                    sampai

                    {{ $tanggalAkhir ? date('d-m-Y', strtotime($tanggalAkhir)) : 'Sekarang' }}
                </strong>
            </p>

        @endif


        <div class="table-wrapper">

            <table>

                <thead>

                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Tanggal</th>
                    <th>Pelanggan</th>
                    <th>Layanan</th>
                    <th>Berat</th>
                    <th>Total</th>
                    <th>Pembayaran</th>
                    <th>Status Laundry</th>
                </tr>

                </thead>


                <tbody>

                @forelse($transaksis as $transaksi)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $transaksi->kode_transaksi }}
                        </td>

                        <td>
                            {{ $transaksi->tanggal_masuk
                                ? date('d-m-Y', strtotime($transaksi->tanggal_masuk))
                                : '-' }}
                        </td>

                        <td>
                            {{ $transaksi->pelanggan->nama ?? '-' }}
                        </td>

                        <td>
                            {{ $transaksi->layanan->nama_layanan ?? '-' }}
                        </td>

                        <td>
                            {{ $transaksi->berat }} Kg
                        </td>

                        <td>
                            Rp {{ number_format($transaksi->total, 0, ',', '.') }}
                        </td>

                        <td>

                            @if($transaksi->status_pembayaran === 'Lunas')

                                <span class="badge lunas">
                                    Lunas
                                </span>

                            @else

                                <span class="badge belum">
                                    Belum Lunas
                                </span>

                            @endif

                        </td>

                        <td>

                            <span class="badge status">
                                {{ $transaksi->status_laundry }}
                            </span>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="9"
                            style="text-align:center;"
                        >
                            Tidak ada transaksi pada periode ini.
                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>


    <!-- DATA PELANGGAN -->
    <div class="box">

        <h2>👥 Data Pelanggan</h2>

        <div class="table-wrapper">

            <table>

                <thead>

                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>No. HP</th>
                    <th>Alamat</th>
                </tr>

                </thead>


                <tbody>

                @forelse($pelanggans as $pelanggan)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $pelanggan->nama }}
                        </td>

                        <td>
                            {{ $pelanggan->no_hp ?? '-' }}
                        </td>

                        <td>
                            {{ $pelanggan->alamat ?? '-' }}
                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="4"
                            style="text-align:center;"
                        >
                            Belum ada data pelanggan.
                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>


    <!-- DATA LAYANAN -->
    <div class="box">

        <h2>🧼 Data Layanan</h2>

        <div class="table-wrapper">

            <table>

                <thead>

                <tr>
                    <th>No</th>
                    <th>Nama Layanan</th>
                    <th>Harga</th>
                    <th>Estimasi</th>
                </tr>

                </thead>


                <tbody>

                @forelse($layanans as $layanan)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $layanan->nama_layanan }}
                        </td>

                        <td>
                            Rp {{ number_format($layanan->harga, 0, ',', '.') }}
                        </td>

                        <td>
                            {{ $layanan->estimasi ?? '-' }}
                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="4"
                            style="text-align:center;"
                        >
                            Belum ada data layanan.
                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>