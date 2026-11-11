<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Layanan - Tania Laundry</title>

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

        .box {
            background: white;
            padding: 25px;
            border-radius: 10px;
            margin-bottom: 25px;
            box-shadow: 0 2px 8px rgba(0,0,0,.08);
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 11px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        .btn {
            border: none;
            padding: 10px 16px;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary {
            background: #2563eb;
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

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #f1f5f9;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .aksi {
            display: flex;
            gap: 5px;
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
    <a href="#">Laporan</a>
</div>

<div class="content">

    <h1>Data Layanan</h1>
    <p>Kelola jenis layanan dan harga laundry.</p>

    <br>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <div class="box">

        <h2>Tambah Layanan</h2>

        <form action="{{ route('layanan.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Nama Layanan</label>
                <input
                    type="text"
                    name="nama_layanan"
                    placeholder="Contoh: Cuci Setrika"
                    required
                >
            </div>

            <div class="form-group">
                <label>Harga</label>
                <input
                    type="number"
                    name="harga"
                    placeholder="Contoh: 10000"
                    required
                >
            </div>

            <div class="form-group">
                <label>Estimasi</label>
                <input
                    type="text"
                    name="estimasi"
                    placeholder="Contoh: 2 Hari"
                >
            </div>

            <button type="submit" class="btn btn-primary">
                Simpan Layanan
            </button>
        </form>
    </div>

    <div class="box">

        <h2>Daftar Layanan</h2>

        <br>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Layanan</th>
                    <th>Harga</th>
                    <th>Estimasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

            @forelse($layanans as $layanan)

                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $layanan->nama_layanan }}</td>

                    <td>
                        Rp {{ number_format($layanan->harga, 0, ',', '.') }}
                    </td>

                    <td>{{ $layanan->estimasi ?? '-' }}</td>

                    <td>
                        <div class="aksi">

                            <a
                                href="{{ route('layanan.edit', $layanan) }}"
                                class="btn btn-warning"
                            >
                                Edit
                            </a>

                            <form
                                action="{{ route('layanan.destroy', $layanan) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus layanan ini?')"
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
                    <td colspan="5" style="text-align:center;">
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