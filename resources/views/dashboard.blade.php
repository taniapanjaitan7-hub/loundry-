<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tania Laundry</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f4f7fb;
        }

        .sidebar {
            width: 230px;
            height: 100vh;
            background: #2563eb;
            position: fixed;
            left: 0;
            top: 0;
            color: white;
            padding: 25px 20px;
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

        .header {
            margin-bottom: 30px;
        }

        .header h1 {
            color: #1f2937;
        }

        .header p {
            margin-top: 5px;
            color: #6b7280;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        .card h3 {
            color: #6b7280;
            font-size: 15px;
            margin-bottom: 15px;
        }

        .card h2 {
            color: #2563eb;
            font-size: 28px;
        }

        .table-container {
            margin-top: 30px;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
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
    </style>
</head>

<body>

    <div class="sidebar">
        <h2>🧺 Tania Laundry</h2>

        <a href="/">Dashboard</a>
        <a href="#">Pelanggan</a>
        <a href="#">Transaksi</a>
        <a href="#">Layanan</a>
        <a href="#">Status Laundry</a>
        <a href="#">Laporan</a>
    </div>

    <div class="content">

        <div class="header">
            <h1>Dashboard Laundry</h1>
            <p>Selamat datang di Sistem Informasi Tania Laundry</p>
        </div>

        <div class="cards">

            <div class="card">
                <h3>Total Pelanggan</h3>
                <h2>0</h2>
            </div>

            <div class="card">
                <h3>Pesanan Masuk</h3>
                <h2>0</h2>
            </div>

            <div class="card">
                <h3>Laundry Selesai</h3>
                <h2>0</h2>
            </div>

            <div class="card">
                <h3>Pendapatan</h3>
                <h2>Rp 0</h2>
            </div>

        </div>

        <div class="table-container">
            <h2>Transaksi Terbaru</h2>

            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pelanggan</th>
                        <th>Layanan</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td colspan="5" style="text-align:center;">
                            Belum ada transaksi
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>

    </div>

</body>
</html>