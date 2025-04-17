<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title }}</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .container {
      width: 100%;
      padding: 20px;
      box-sizing: border-box;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    table th,
    table td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    table th {
      background-color: #f4f4f4;
    }

    .text-right {
      text-align: right;
    }

    .header {
      text-align: center;
      margin-bottom: 30px;
    }

    .header h1 {
      font-size: 24px;
      margin: 0;
    }

    .header p {
      font-size: 14px;
      margin: 5px 0;
    }

    .footer {
      text-align: center;
      font-size: 12px;
      margin-top: 40px;
    }
  </style>
</head>

<body>

  <div class="container">
    <div class="header">
      <h1>{{ $title }}</h1>
      <p>Date: {{ $date }}</p>
    </div>

    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>No Kontrol</th>
          <th>Nama Pelanggan</th>
          <th>Jenis Pelanggan</th>
          <th>Tahun</th>
          <th>Bulan</th>
          <th>Meter Awal</th>
          <th>Meter Akhir</th>
          <th>Jumlah Pakai</th>
          <th>Biaya Beban</th>
          <th>Tarif KWH</th>
          <th>Biaya Pemakaian</th>
          <th>Total Bayar</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($pemakaian as $item)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->no_kontrol }}</td>
            <td>{{ $item->pelanggan->nama }}</td>
            <td>{{ $item->pelanggan->jenis->jenis_plg }}</td>
            <td>{{ $item->tahun }}</td>
            <td>{{ $item->bulan }}</td>
            <td>{{ $item->meter_awal }}</td>
            <td>{{ $item->meter_akhir }}</td>
            <td>{{ $item->jumlah_pakai }}</td>
            <td class="text-right">Rp {{ number_format($item->biaya_beban_pemakai, 0, ',', '.') }}</td>
            <td class="text-right">Rp {{ number_format($item->tarif_kwh, 0, ',', '.') }}</td>
            <td class="text-right">Rp {{ number_format($item->biaya_pemakaian, 0, ',', '.') }}</td>
            <td class="text-right">Rp {{ number_format($item->total_bayar, 0, ',', '.') }}</td>
            <td>{{ str_replace('_', ' ', $item->status) }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <div class="footer">
      <p>Report generated on {{ $date }}</p>
    </div>
  </div>

</body>

</html>
