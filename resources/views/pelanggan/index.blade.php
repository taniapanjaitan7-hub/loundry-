<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan - Tania Laundry</title>

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

        .sidebar a.active {
            background: #1e40af;
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

        input,
        textarea {
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

        .btn-secondary {
            background: #64748b;
            color: white;
        }

        .search-form {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .search-form input {
            flex: 1;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
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

        .hasil-pencarian {
            margin-bottom: 15px;
            color: #475569;
        }
    </style>
</head>

<body>

<div class="sidebar">

    <h2>🧺 Tania Laundry</h2>

    <a href="{{ route('dashboard') }}">
        Dashboard
    </a>

    <a href="{{ route('pelanggan.index') }}" class="active">
        Pelanggan
    </a>

    <a href="{{ route('transaksi.index') }}">
        Transaksi
    </a>

    <a href="{{ route('layanan.index') }}">
        Layanan
    </a>

    <a href="{{ route('status.index') }}">
        Status Laundry
    </a>

    <a href="{{ route('laporan.index') }}">
        Laporan
    </a>

</div>


<div class="content">

    <h1>Data Pelanggan</h1>
    <p>Kelola dan cari data pelanggan Tania Laundry.</p>

    <br>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif


    <div class="box">

        <h2>Tambah Pelanggan</h2>

        <form action="{{ route('pelanggan.store') }}" method="POST">

            @csrf

            <div class="form-group">
                <label>Nama Pelanggan</label>

                <input
                    type="text"
                    name="nama"
                    placeholder="Masukkan nama pelanggan"
                    required
                >
            </div>


            <div class="form-group">
                <label>No. HP</label>

                <input
                    type="text"
                    name="no_hp"
                    placeholder="Contoh: 08123456789"
                >
            </div>


            <div class="form-group">
                <label>Alamat</label>

                <textarea
                    name="alamat"
                    rows="3"
                    placeholder="Masukkan alamat pelanggan"
                ></textarea>
            </div>


            <button type="submit" class="btn btn-primary">
                Simpan Pelanggan
            </button>

        </form>

    </div>


    <div class="box">

        <h2>Daftar Pelanggan</h2>

        <br>

        <!-- PENCARIAN PELANGGAN -->
        <form
            action="{{ route('pelanggan.index') }}"
            method="GET"
            class="search-form"
        >

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Cari nama, nomor HP, atau alamat..."
            >

            <button type="submit" class="btn btn-primary">
                🔍 Cari
            </button>

            @if(request('search'))
                <a
                    href="{{ route('pelanggan.index') }}"
                    class="btn btn-secondary"
                >
                    Reset
                </a>
            @endif

        </form>


        @if(request('search'))
            <div class="hasil-pencarian">
                Hasil pencarian untuk:
                <strong>{{ request('search') }}</strong>
            </div>
        @endif


        <table>

            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>No. HP</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

            @forelse($pelanggans as $pelanggan)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $pelanggan->nama }}</td>

                    <td>{{ $pelanggan->no_hp ?? '-' }}</td>

                    <td>{{ $pelanggan->alamat ?? '-' }}</td>

                    <td>

                        <div class="aksi">

                            <a
                                href="{{ route('pelanggan.edit', $pelanggan) }}"
                                class="btn btn-warning"
                            >
                                Edit
                            </a>

                            <form
                                action="{{ route('pelanggan.destroy', $pelanggan) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus pelanggan ini?')"
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

                        @if(request('search'))
                            Data pelanggan tidak ditemukan.
                        @else
                            Belum ada data pelanggan.
                        @endif

                    </td>
                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>
</html>