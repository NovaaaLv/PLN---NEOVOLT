<!DOCTYPE html>
<html>
<head>
    <title>Laravel PDF Example</title>
    <style>
        body {
            font-family: 'Arial, sans-serif';
        }
        .container {
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .content {
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>{{ $title }}</h1>
        </div>
        <div class="content">
            <p>No Kontrol : {{$date}}</p>
            <p>No Kontrol : {{$pemakaian->pelanggan->no_kontrol}}</p>
            <p>Jenis Pelanggan : {{$pemakaian->pelanggan->jenis->jenis_plg}}</p>
            <p>Nama Pengguna : {{$pemakaian->pelanggan->nama}}</p>
            <p>Waktu : {{$pemakaian->tahun}} / {{$pemakaian->bulan}}</p>
            <p>Meter Awal : {{$pemakaian->meter_awal}}</p>
            <p>Meter Akhir : {{$pemakaian->meter_akhir}}</p>
            <p>Jumlah Pakai : {{$pemakaian->jumlah_pakai}}</p>
            <p>Biaya Pemakaian : {{$pemakaian->biaya_pemakaian}}</p>
        </div>
    </div>
</body>
</html>
