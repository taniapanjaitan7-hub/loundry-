<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Laundry - Tania Laundry</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            background: #f4f7fb;
            color: #1f2937;
        }

        .sidebar {
            position: fixed;
            width: 240px;
            height: 100vh;
            background: linear-gradient(180deg, #2563eb, #1e40af);
            padding: 28px 18px;
            color: white;
        }

        .sidebar h2 {
            margin-bottom: 35px;
        }

        .sidebar a {
            display: block;
            padding: 12px;
            margin-bottom: 7px;
            border-radius: 9px;
            color: white;
            text-decoration: none;
        }

        .sidebar a:hover,
        .sidebar .active {
            background: rgba(255,255,255,.18);
        }

        .content {
            margin-left: 240px;
            padding: 32px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin: 25px 0;
        }

        .card {
            background: white;
            padding: 22px;
            border-radius: 14px;
            box-shadow: 0 3px 15px rgba(0,0,0,.06);
        }

        .card h2 {
            margin-bottom: 0;
            color: #2563eb;
        }

        .search {
            background: white;
            padding: 20px;
            border-radius: 14px;
            margin-bottom: 25px;
        }

        .search form {
            display: flex;
            gap: 10px;
        }

        .search input {
            flex: 1;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        .search button {
            background: #2563eb;
            color: white;
            border: 0;
            border-radius: 8px;
            padding: 0 20px;
            cursor: pointer;
        }

        .laundry {
            background: white;
            border-radius: 15px;
            padding: 22px;
            margin-bottom: 20px;
            box-shadow: 0 3px 15px rgba(0,0,0,.06);
        }

        .top {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }

        .kode {
            color: #2563eb;
            font-weight: bold;
        }

        .badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .lunas {
            background: #dcfce7;
            color: #166534;
        }

        .belum {
            background: #fee2e2;
            color: #991b1b;
        }

        .detail {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
            margin: 20px 0;
        }

        .detail div {
            background: #f8fafc;
            padding: 13px;
            border-radius: 9px;
        }

        .detail small {
            display: block;
            color: #64748b;
            margin-bottom: 5px;
        }

        .progress-bg {
            background: #e5e7eb;
            height: 10px;
            border-radius: 20px;
            overflow: hidden;
            margin: 10px 0;
        }

        .progress {
            height: 100%;
            background: linear-gradient(90deg, #2563eb, #06b6d4);
        }

        .status-form {
            margin-top: 18px;
            padding-top: 18px;
            border-top: 1px solid #ddd;
        }

        .status-form select {
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }
    </style>
</head>

<body>

<div class="sidebar">
    <h2>🧺 Tania Laundry</h2>

    <a href="{{ route('dashboard') }}">Dashboard</a>
    <a href="{{ route('pelanggan.index') }}">Pelanggan</a>
    <a href="{{ route('transaksi.index') }}">Transaksi</a>
    <a href="{{ route('layanan.index') }}">Layanan</a>
    <a href="{{ route('status.index') }}" class="active">Status Laundry</a>
    <a href="{{ route('laporan.index') }}">Laporan</a>
</div>

<div class="content">

    <h1>Status Laundry</h1>
    <p>Pantau proses cucian pelanggan.</p>

    <div class="cards">

        <div class="card">
            <small>Sedang Diproses</small>
            <h2>{{ $totalProses }}</h2>
        </div>

        <div class="card">
            <small>Siap Diambil</small>
            <h2>{{ $totalSelesai }}</h2>
        </div>

        <div class="card">
            <small>Sudah Selesai</small>
            <h2>{{ $totalDiambil }}</h2>
        </div>

    </div>

    <div class="search">

        <form method="GET" action="{{ route('status.index') }}">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Cari kode transaksi atau nama pelanggan"
            >

            <button type="submit">
                Cari
            </button>

        </form>

    </div>


    @forelse($transaksis as $transaksi)

        @php

            $alur = [
                'Diterima',
                'Dicuci',
                'Dikeringkan',
                'Disetrika',
                'Selesai'
            ];

            $posisi = array_search(
                $transaksi->status_laundry,
                $alur
            );

            if (in_array($transaksi->status_laundry, ['Diambil', 'Dikirim'])) {
                $posisi = 4;
            }

            if ($posisi === false) {
                $posisi = 0;
            }

            $progress = (($posisi + 1) / count($alur)) * 100;

        @endphp


        <div class="laundry">

            <div class="top">

                <div>

                    <div class="kode">
                        {{ $transaksi->kode_transaksi }}
                    </div>

                    <h3>
                        {{ $transaksi->pelanggan->nama }}
                    </h3>

                    <small>
                        {{ $transaksi->pelanggan->no_hp ?? '-' }}
                    </small>

                </div>


                <div>

                    @if($transaksi->status_pembayaran === 'Lunas')

                        <span class="badge lunas">
                            ✓ Lunas
                        </span>

                    @else

                        <span class="badge belum">
                            Belum Lunas
                        </span>

                    @endif

                </div>

            </div>


            <div class="detail">

                <div>
                    <small>Layanan</small>
                    <strong>
                        {{ $transaksi->layanan->nama_layanan }}
                    </strong>
                </div>

                <div>
                    <small>Berat</small>
                    <strong>
                        {{ $transaksi->berat }} Kg
                    </strong>
                </div>

                <div>
                    <small>Total</small>
                    <strong>
                        Rp {{ number_format($transaksi->total, 0, ',', '.') }}
                    </strong>
                </div>

                <div>
                    <small>Status</small>
                    <strong>
                        {{ $transaksi->status_laundry }}
                    </strong>
                </div>

            </div>


            <strong>Progress {{ round($progress) }}%</strong>

            <div class="progress-bg">
                <div
                    class="progress"
                    style="width: {{ $progress }}%"
                ></div>
            </div>


            <div class="status-form">

                <form
                    method="POST"
                    action="{{ route('transaksi.status', $transaksi) }}"
                >

                    @csrf

                    <label>Ubah Status: </label>

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
                                {{ $transaksi->status_laundry === $status ? 'selected' : '' }}
                            >
                                {{ $status }}
                            </option>

                        @endforeach

                    </select>

                </form>

            </div>

        </div>

    @empty

        <div class="laundry" style="text-align:center;">
            <h2>🧺 Belum Ada Transaksi</h2>
            <p>Transaksi laundry akan muncul di sini.</p>
        </div>

    @endforelse

</div>

</body>
</html>