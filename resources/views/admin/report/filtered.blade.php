<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title }}</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      color: #333;
      padding: 20px;
    }

    h1 {
      text-align: center;
      color: #2F855A;
      margin-bottom: 5px;
    }

    p {
      text-align: center;
      font-size: 12px;
      color: #666;
      margin-bottom: 30px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 10px;
      font-size: 13px;
    }

    table thead {
      background-color: #2F855A;
      color: #fff;
    }

    table thead th {
      padding: 10px;
      border: 1px solid #ccc;
    }

    table tbody td {
      padding: 10px;
      border: 1px solid #ddd;
      text-align: center;
    }

    table tbody tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    .footer {
      margin-top: 30px;
      text-align: center;
      font-size: 11px;
      color: #999;
    }

    .total-row {
      font-weight: bold;
      background-color: #FEEBCB;
    }
  </style>
</head>

<body>
  <h1>{{ $title }}</h1>
  <p>Tanggal Cetak: {{ $date }}</p>

  @php
    $bulanIndo = [
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember',
    ];

    $totalKeseluruhan = 0;
    $totalTunggakan = 0;
    $totalLunas = 0;
  @endphp

  <!-- Rekap Data -->
  <table style="width: 50%; margin: 0 auto 20px auto; font-size: 13px;">
    <tr>
      <td>Total Data Lunas</td>
      <td>: {{ $lunas->count() }}</td>
    </tr>
    <tr>
      <td>Total Data Belum Lunas</td>
      <td>: {{ $belumLunas->count() }}</td>
    </tr>
  </table>

  <table>
    <thead>
      <tr>
        <th>No Kontrol</th>
        <th>Nama Pelanggan</th>
        <th>Bulan</th>
        <th>Tahun</th>
        <th>Jumlah Pakai</th>
        <th>Total Pembayaran</th>
        <th>Status</th>
        <th>Tunggakan</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($pemakaian as $item)
        @php
          $totalKeseluruhan += $item->total_bayar;
          if ($item->status != 'lunas') {
              $totalTunggakan += $item->total_bayar;
          } else {
              $totalLunas += $item->total_bayar;
          }
        @endphp
        <tr>
          <td>{{ $item->no_kontrol }}</td>
          <td>{{ $item->pelanggan->nama }}</td>
          <td>{{ $bulanIndo[$item->bulan] }}</td>
          <td>{{ $item->tahun }}</td>
          <td>{{ $item->jumlah_pakai }}</td>
          <td>
            @if ($item->status == 'lunas')
              Rp. {{ number_format($item->total_bayar, 0, ',', '.') }}
            @else
              -
            @endif
          </td>
          <td>
            @if ($item->status == 'lunas')
              <span style="color: green; font-weight: bold;">Lunas</span>
            @else
              <span style="color: red; font-weight: bold;">Belum Lunas</span>
            @endif
          </td>
          <td>
            @if ($item->status != 'lunas')
              Rp. {{ number_format($item->total_bayar, 0, ',', '.') }}
            @else
              -
            @endif
          </td>
        </tr>
      @endforeach

      <!-- Total Row -->
      <tr class="total-row">
        <td colspan="5" style="text-align: right;">Total Pembayaran Lunas :</td>
        <td>Rp. {{ number_format($totalLunas, 0, ',', '.') }}</td>
        <td style="text-align: right;">Total Tunggakan :</td>
        <td>Rp. {{ number_format($totalTunggakan, 0, ',', '.') }}</td>
      </tr>
      <tr class="total-row">
        <td colspan="5" style="text-align: right;">Total Keseluruhan :</td>
        <td colspan="3">Rp. {{ number_format($totalKeseluruhan, 0, ',', '.') }}</td>
      </tr>
    </tbody>
  </table>

  <div class="footer">
    &copy; {{ date('Y') }} PLNEOVLT. All rights reserved.
  </div>
</body>

</html>
