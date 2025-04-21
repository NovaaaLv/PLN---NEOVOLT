<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>{{ $title }}</title>
  <style>
    body {
      font-family: 'Helvetica', 'Arial', sans-serif;
      margin: 0;
      padding: 10px;
      background: #ffffff;
      color: #333;
      font-size: 12px;
    }

    .invoice {
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 6px;
    }

    .invoice-header {
      text-align: center;
      margin-bottom: 15px;
    }

    .invoice-header h1 {
      margin: 0;
      font-size: 18px;
      color: #000;
    }

    .invoice-header p {
      margin: 2px 0 0;
      font-size: 10px;
      color: #777;
    }

    .line {
      border-top: 1px dashed #999;
      margin: 10px 0;
    }

    .item {
      display: flex;
      justify-content: space-between;
      margin: 4px 0;
    }

    .item span:last-child {
      font-weight: 600;
    }

    .total {
      display: flex;
      justify-content: space-between;
      border-top: 1px solid #333;
      margin-top: 10px;
      padding-top: 6px;
      font-size: 13px;
      font-weight: bold;
      color: #000;
    }

    .footer {
      text-align: center;
      margin-top: 15px;
      font-size: 10px;
      color: #777;
    }

    .footer span {
      font-weight: 600;
      color: #333;
    }
  </style>
</head>

<body>
  <div class="invoice">
    <div class="invoice-header">
      <h1>{{ $title }}</h1>
      <p>{{ $date }}</p>
    </div>

    <div class="item">
      <span>No Kontrol:</span>
      <span>{{ $pemakaian->no_kontrol }}</span>
    </div>
    <div class="item">
      <span>Bulan / Tahun:</span>
      <span>{{ $pemakaian->bulan }} / {{ $pemakaian->tahun }}</span>
    </div>
    <div class="item">
      <span>Nama:</span>
      <span>{{ $pemakaian->pelanggan->nama }}</span>
    </div>
    <div class="item">
      <span>Alamat:</span>
      <span>{{ $pemakaian->pelanggan->alamat }}</span>
    </div>
    <div class="item">
      <span>Telepon:</span>
      <span>{{ $pemakaian->pelanggan->telepon }}</span>
    </div>

    <div class="line"></div>

    <div class="item">
      <span>Meter Awal:</span>
      <span>{{ $pemakaian->meter_awal }}</span>
    </div>
    <div class="item">
      <span>Meter Akhir:</span>
      <span>{{ $pemakaian->meter_akhir }}</span>
    </div>
    <div class="item">
      <span>Jumlah Pakai:</span>
      <span>{{ $pemakaian->jumlah_pakai }}</span>
    </div>

    <div class="line"></div>

    <div class="item">
      <span>Harga (Pemakaian):</span>
      <span>Rp {{ number_format($pemakaian->biaya_pemakaian, 0, ',', '.') }}</span>
    </div>
    <div class="item">
      <span>Status:</span>
      <span>{{ $pemakaian->status == 'lunas' ? 'Lunas' : 'Belum Lunas' }}</span>
    </div>

    <div class="total">
      <span>Total Bayar:</span>
      <span>Rp {{ number_format($pemakaian->total_bayar, 0, ',', '.') }}</span>
    </div>

    <div class="footer">
      <p><span>Terima kasih</span> telah bertransaksi!</p>
      <p>Simpan struk ini sebagai bukti pembayaran.</p>
    </div>
  </div>
</body>

</html>
