<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Laporan Tania Laundry</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            background: #f4f7fb;
        }

        .sidebar {
            width: 230px;
            height: 100vh;
            background: #2563eb;
            position: fixed;
            left: 0;
            top: 0;
            padding: 25px 20px;
            color: white;
        }

        .sidebar h2 {
            margin-bottom: 35px;
        }

        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            padding: 12px;
            margin-bottom: 8px;
            border-radius: 6px;
        }

        .sidebar a:hover {
            background: #1d4ed8;
        }

        .content {
            margin-left: 230px;
            padding: 30px;
        }

        .header-laporan {
            display: none;
        }

        .btn-print {
            display: inline-block;
            background: #dc2626;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 6px;
            cursor: pointer;
            margin: 15px 0 25px;
            font-size: 15px;
        }

        .cards {
            display: flex;
            gap: 20px;
            margin-bottom: 25px;
        }

        .card {
            flex: 1;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,.08);
        }

        .card h2 {
            color: #2563eb;
        }

        .box {
            background: white;
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 25px;
            box-shadow: 0 2px 8px rgba(0,0,0,.08);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }

        th {
            background: #f1f5f9;
        }

        @media print {

            body {
                background: white;
            }

            .sidebar,
            .btn-print,
            .judul-web {
                display: none;
            }

            .content {
                margin-left: 0;
                padding: 10px;
            }

            .header-laporan {
                display: block;
                text-align: center;
                margin-bottom: 30px;
            }

            .header-laporan h1 {
                margin-bottom: 5px;
            }

            .cards {
                display: flex;
            }

            .card,
            .box {
                box-shadow: none;
                border: 1px solid #ddd;
            }

            table {
                font-size: 12px;
            }
        }
    </style>
</head>

<body>

<div class="sidebar">

    <h2>🧺 Tania Laundry</h2>

    <a href="{{ route('dashboard') }}">Dashboard</a>
    <a href="{{ route('pelanggan.index') }}">Pelanggan</a>
    <a href="#">Transaksi</a>
    <a href="{{ route('layanan.index') }}">Layanan</a>
    <a href="#">Status Laundry</a>
    <a href="{{ route('laporan.index') }}">Laporan</a>

</div>


<div class="content">

    <div class="header-laporan">
        <h1>TANIA LAUNDRY</h1>
        <p>Laporan Sistem Informasi Laundry</p>
        <p>Tanggal: {{ date('d-m-Y') }}</p>
    </div>


    <div class="judul-web">

        <h1>Laporan Tania Laundry</h1>

        <p>
            Laporan data pelanggan dan layanan.
        </p>

    </div>


    <button
        onclick="window.print()"
        class="btn-print"
    >
        🖨 Cetak / Simpan PDF
    </button>


    <div class="cards">

        <div class="card">
            <h3>Total Pelanggan</h3>
            <h2>{{ $totalPelanggan }}</h2>
        </div>

        <div class="card">
            <h3>Total Layanan</h3>
            <h2>{{ $totalLayanan }}</h2>
        </div>

    </div>


    <div class="box">

        <h2>Data Pelanggan</h2>

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
                    <td colspan="4">
                        Belum ada data pelanggan
                    </td>
                </tr>

            @endforelse

            </tbody>

        </table>

    </div>


    <div class="box">

        <h2>Data Layanan</h2>

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
                    <td colspan="4">
                        Belum ada data layanan
                    </td>
                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>
</html>