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
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f5f5f5;
    }

    .receipt {
      width: 300px;
      padding: 20px;
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      text-align: center;
      font-size: 14px;
    }

    .receipt-header {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 15px;
    }

    .receipt-date {
      font-size: 12px;
      color: #888;
      margin-bottom: 20px;
    }

    .receipt-item {
      margin: 10px 0;
      display: flex;
      justify-content: space-between;
    }

    .receipt-item span {
      display: inline-block;
    }

    .receipt-footer {
      margin-top: 20px;
      border-top: 1px dashed #ddd;
      padding-top: 10px;
    }

    .total {
      font-weight: bold;
      font-size: 16px;
    }

    .receipt-line {
      border-top: 1px dashed #ddd;
      margin-top: 10px;
    }

    .footer {
      margin-top: 20px;
      font-size: 12px;
      color: #888;
    }

    .footer span {
      font-weight: bold;
    }
  </style>
</head>

<body>
  <div class="receipt">
    <div class="receipt-header">
      {{ $title }}
    </div>

    <div class="receipt-date">
      {{ $date }}
    </div>

    <div class="receipt-item">
      <span>No Kontrol:</span>
      <span>{{ $pemakaian->no_kontrol }}</span>
    </div>

    <div class="receipt-item">
      <span>Nama:</span>
      <span>{{ $pemakaian->pelanggan->nama }}</span>
    </div>

    <div class="receipt-item">
      <span>Alamat:</span>
      <span>{{ $pemakaian->pelanggan->alamat }}</span>
    </div>

    <div class="receipt-item">
      <span>Telepon:</span>
      <span>{{ $pemakaian->pelanggan->telepon }}</span>
    </div>

    <div class="receipt-line"></div>

    <div class="receipt-item">
      <span>Harga:</span>
      <span>{{ number_format($pemakaian->biaya_pemakaian, 0, ',', '.') }}</span>
    </div>

    <div class="receipt-item">
      <span>Status Pembayaran:</span>
      <span>{{ $pemakaian->status == 'lunas' ? 'Lunas' : 'Belum Lunas' }}</span>
    </div>

    <div class="receipt-footer">
      <div class="total">
        <span>Total Pembayaran:</span>
        <span>{{ number_format($pemakaian->biaya_pemakaian, 0, ',', '.') }}</span>
      </div>
    </div>

    <div class="footer">
      <p><span>Terima kasih telah bertransaksi dengan kami!</span></p>
      <p>Harap simpan struk ini sebagai bukti pembayaran.</p>
    </div>
  </div>
</body>

</html>
