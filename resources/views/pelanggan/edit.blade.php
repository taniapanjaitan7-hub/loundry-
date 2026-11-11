<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Pelanggan</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            padding: 40px;
        }

        .box {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,.1);
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button,
        a {
            padding: 10px 18px;
            border-radius: 6px;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }

        button {
            background: #2563eb;
            color: white;
        }

        a {
            background: #6b7280;
            color: white;
        }
    </style>
</head>

<body>

<div class="box">

    <h1>Edit Pelanggan</h1>

    <form
        action="{{ route('pelanggan.update', $pelanggan) }}"
        method="POST"
    >

        @csrf
        @method('PUT')

        <label>Nama Pelanggan</label>

        <input
            type="text"
            name="nama"
            value="{{ $pelanggan->nama }}"
            required
        >


        <label>No. HP</label>

        <input
            type="text"
            name="no_hp"
            value="{{ $pelanggan->no_hp }}"
        >


        <label>Alamat</label>

        <textarea
            name="alamat"
            rows="4"
        >{{ $pelanggan->alamat }}</textarea>


        <button type="submit">
            Simpan Perubahan
        </button>

        <a href="{{ route('pelanggan.index') }}">
            Kembali
        </a>

    </form>

</div>

</body>
</html>