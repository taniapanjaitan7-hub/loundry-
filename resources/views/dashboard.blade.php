@extends('layouts.app')

@section('title', 'Dashboard - Tania Mutiara Laundry')

@section('content')


<section class="hero">

    <div>

        <div class="hero-badge">
            ✨ Selamat Datang di Sistem Laundry
        </div>


        <h1>
            Tania Mutiara
            <span>Laundry</span>
        </h1>


        <p>
            Kelola pelanggan, transaksi, pembayaran,
            layanan dan proses laundry dengan lebih mudah,
            cepat, aman dan terorganisir.
        </p>


        <div class="hero-quote">

            “Bersih, Wangi, Rapi —
            Karena Setiap Pakaian Layak Mendapatkan
            Perawatan Terbaik.”

        </div>

    </div>

</section>



<div class="stats-grid">


    <div class="stat-card">

        <div class="stat-head">

            <small>
                Total Pelanggan
            </small>

            <div class="stat-icon">
                👥
            </div>

        </div>

        <h2>
            {{ $totalPelanggan }}
        </h2>

        <p>
            Pelanggan terdaftar
        </p>

    </div>



    <div class="stat-card">

        <div class="stat-head">

            <small>
                Pesanan Aktif
            </small>

            <div class="stat-icon">
                🧺
            </div>

        </div>

        <h2>
            {{ $pesananMasuk }}
        </h2>

        <p>
            Laundry sedang diproses
        </p>

    </div>



    <div class="stat-card">

        <div class="stat-head">

            <small>
                Laundry Selesai
            </small>

            <div class="stat-icon">
                ✅
            </div>

        </div>

        <h2>
            {{ $laundrySelesai }}
        </h2>

        <p>
            Pesanan telah selesai
        </p>

    </div>



    <div class="stat-card">

        <div class="stat-head">

            <small>
                Total Pendapatan
            </small>

            <div class="stat-icon">
                💰
            </div>

        </div>

        <h2>

            Rp {{ number_format(
                $pendapatan,
                0,
                ',',
                '.'
            ) }}

        </h2>

        <p>
            Pendapatan transaksi lunas
        </p>

    </div>


</div>



<div class="dashboard-grid">


    <div class="panel">


        <div class="panel-header">

            <div>

                <h2>
                    🧾 Transaksi Terbaru
                </h2>

                <div class="panel-description">

                    Aktivitas transaksi terbaru
                    Tania Mutiara Laundry.

                </div>

            </div>


            <a
                href="{{ route('transaksi.index') }}"
                class="btn btn-primary"
            >
                Lihat Semua →
            </a>

        </div>



        <div class="table-responsive">

            <table>


                <thead>

                <tr>

                    <th>Kode</th>

                    <th>Pelanggan</th>

                    <th>Layanan</th>

                    <th>Total</th>

                    <th>Status</th>

                </tr>

                </thead>


                <tbody>


                @forelse(
                    $transaksiTerbaru
                    as $transaksi
                )


                    <tr>


                        <td>

                            <strong style="color:#2563eb;">

                                {{
                                    $transaksi
                                    ->kode_transaksi
                                }}

                            </strong>

                        </td>


                        <td>

                            {{
                                $transaksi
                                ->pelanggan
                                ->nama ?? '-'
                            }}

                        </td>


                        <td>

                            {{
                                $transaksi
                                ->layanan
                                ->nama_layanan ?? '-'
                            }}

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
                                in_array(
                                    $transaksi->status_laundry,
                                    [
                                        'Selesai',
                                        'Diambil',
                                        'Dikirim'
                                    ]
                                )
                            )

                                <span
                                    class="badge badge-green"
                                >

                                    {{
                                        $transaksi
                                        ->status_laundry
                                    }}

                                </span>


                            @else


                                <span
                                    class="badge badge-blue"
                                >

                                    {{
                                        $transaksi
                                        ->status_laundry
                                    }}

                                </span>


                            @endif


                        </td>


                    </tr>


                @empty


                    <tr>

                        <td
                            colspan="5"
                            style="
                                text-align:center;
                                padding:35px;
                            "
                        >

                            🧺 Belum ada transaksi laundry.

                        </td>

                    </tr>


                @endforelse


                </tbody>


            </table>

        </div>


    </div>



    <div class="panel">


        <div class="panel-header">

            <h2>
                ⚡ Menu Cepat
            </h2>

        </div>


        <div class="quick-actions">


            <a
                href="{{ route('transaksi.index') }}"
                class="quick-action"
            >

                <div class="quick-icon">
                    ➕
                </div>

                <div>

                    <strong>
                        Transaksi Baru
                    </strong>

                    <small>
                        Tambahkan pesanan laundry
                    </small>

                </div>

            </a>



            <a
                href="{{ route('pelanggan.index') }}"
                class="quick-action"
            >

                <div class="quick-icon">
                    👤
                </div>

                <div>

                    <strong>
                        Tambah Pelanggan
                    </strong>

                    <small>
                        Kelola data pelanggan
                    </small>

                </div>

            </a>



            <a
                href="{{ route('status.index') }}"
                class="quick-action"
            >

                <div class="quick-icon">
                    🔄
                </div>

                <div>

                    <strong>
                        Status Laundry
                    </strong>

                    <small>
                        Pantau proses cucian
                    </small>

                </div>

            </a>



            <a
                href="{{ route('laporan.index') }}"
                class="quick-action"
            >

                <div class="quick-icon">
                    📄
                </div>

                <div>

                    <strong>
                        Laporan
                    </strong>

                    <small>
                        Cetak laporan laundry
                    </small>

                </div>

            </a>


        </div>



        <div
            style="
                margin-top:20px;
                padding:16px;
                background:#fff1f2;
                border-radius:13px;
                border:1px solid #fecdd3;
            "
        >

            <small
                style="
                    color:#9f1239;
                    font-weight:bold;
                "
            >

                💳 Pembayaran Belum Lunas

            </small>


            <h2
                style="
                    color:#e11d48;
                    margin-top:6px;
                "
            >

                {{ $belumLunas }}

            </h2>

        </div>


    </div>


</div>


@endsection