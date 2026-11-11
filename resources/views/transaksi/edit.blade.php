<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<title>Edit Transaksi</title>

<style>

body {
    font-family: Arial, sans-serif;
    background: #f4f7fb;
    padding: 40px;
}

.box {
    max-width: 750px;

    margin: auto;

    background: white;

    padding: 30px;

    border-radius: 14px;

    box-shadow:
        0 4px 20px
        rgba(0,0,0,.08);
}

label {
    display: block;
    margin-top: 15px;
    margin-bottom: 6px;
    font-weight: bold;
}

input,
select,
textarea {
    width: 100%;
    padding: 11px;
    border: 1px solid #ccc;
    border-radius: 7px;
    box-sizing: border-box;
}

button,
.btn {
    margin-top: 20px;

    padding: 11px 18px;

    border: 0;

    border-radius: 7px;

    cursor: pointer;

    text-decoration: none;
}

button {
    background: #2563eb;
    color: white;
}

.btn {
    background: #64748b;
    color: white;
}

</style>

</head>


<body>


<div class="box">

<h1>Edit Transaksi</h1>

<p>
    {{ $transaksi->kode_transaksi }}
</p>


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


<label>Pelanggan</label>

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
        $transaksi->pelanggan_id
        == $pelanggan->id
        ? 'selected'
        : ''
    }}
>

    {{ $pelanggan->nama }}

</option>

@endforeach

</select>



<label>Layanan</label>

<select
    name="layanan_id"
    required
>

@foreach(
    $layanans
    as $layanan
)

<option
    value="{{ $layanan->id }}"

    {{
        $transaksi->layanan_id
        == $layanan->id
        ? 'selected'
        : ''
    }}
>

    {{ $layanan->nama_layanan }}

</option>

@endforeach

</select>



<label>Berat (Kg)</label>

<input
    type="number"
    name="berat"
    step="0.1"
    value="{{ $transaksi->berat }}"
    required
>



<label>Pengambilan</label>

<select
    name="jenis_pengambilan"
>

<option
    value="ambil_sendiri"

    {{
        $transaksi->jenis_pengambilan
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
        $transaksi->jenis_pengambilan
        === 'kirim'
        ? 'selected'
        : ''
    }}
>

    Kirim

</option>

</select>



<label>Alamat Kirim</label>

<textarea
    name="alamat_kirim"
    rows="3"
>{{ $transaksi->alamat_kirim }}</textarea>



<label>Tanggal Selesai</label>

<input
    type="date"
    name="tanggal_selesai"
    value="{{
        optional(
            $transaksi->tanggal_selesai
        )->format('Y-m-d')
    }}"
>



<label>Catatan</label>

<textarea
    name="catatan"
    rows="3"
>{{ $transaksi->catatan }}</textarea>



<button type="submit">

    Simpan Perubahan

</button>


<a
    href="{{
        route('transaksi.index')
    }}"
    class="btn"
>

    Kembali

</a>


</form>


</div>


</body>

</html>