<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Bukti Pesanan - The Sound Project</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
  <style>
    * {
      box-sizing: border-box;
    }
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f4f7fa;
      margin: 0;
      padding: 40px 0;
      color: #333;
      display: flex;
      justify-content: center;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
    }
    .receipt-container {
      background: #fff;
      width: 680px;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0,0,0,0.1);
      overflow: hidden;
    }
    .receipt-header {
      background: #fff; 
      color: #000;      
      padding: 40px 30px;
      text-align: center;
      border-bottom: 4px solid #084fc1;
      user-select: none;
      font-family: 'Poppins', sans-serif; 
    }
    .receipt-header h1 {
      margin: 0;
      font-size: 36px;
      font-weight: 700;
      letter-spacing: 2px;
      text-transform: uppercase;
      user-select: none;
    }
    .receipt-header p.subtitle {
      margin: 12px 0 0 0;
      font-size: 18px;
      font-weight: 600;
      opacity: 0.85;
      letter-spacing: 1.2px;
      user-select: none;
    }

    .receipt-body {
      padding: 35px 45px;
      font-family: 'Poppins', sans-serif;
      color: #222;
    }
    table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0 12px;
      font-family: 'Poppins', sans-serif; 
    }
    table th, table td {
      padding: 14px 15px;
      background-color: #fafafa;
      font-size: 16px;
      font-weight: 600;
      text-align: left;
      color: #444;
      border-radius: 8px;
      vertical-align: middle;
      box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    }
    table th {
      width: 35%;
      color: #666;
      background-color: #e9ecef;
      font-family: 'Poppins', sans-serif;
    }
    table td {
      font-weight: 700;
      color: #222;
      font-family: 'Poppins', sans-serif;
    }
    .status {
      display: inline-block;
      padding: 8px 24px;
      border-radius: 25px;
      font-size: 14px;
      font-weight: 700;
      text-transform: uppercase;
      user-select: none;
      letter-spacing: 1px;
      font-family: 'Poppins', sans-serif;
    }
    .status-lunas {
      background-color: #198754;
      color: white;
      box-shadow: 0 0 8px #198754aa;
    }
    .status-menunggu {
      background-color: #ffc107;
      color: #212529;
      box-shadow: 0 0 8px #ffc107aa;
    }
    .receipt-footer {
      background-color: #f9f9f9;
      padding: 25px 40px;
      text-align: center;
      font-size: 15px;
      color: #1a237e;
      border-top: 1px solid #ddd;
      font-style: italic;
      user-select: none;
      letter-spacing: 0.4px;
      font-family: 'Poppins', sans-serif;
    }

    @media(max-width: 720px) {
      body {
        padding: 20px 10px;
      }
      .receipt-container {
        width: 100%;
      }
      table th, table td {
        padding: 12px 10px;
        font-size: 14px;
      }
      .receipt-header h1 {
        font-size: 28px;
      }
      .receipt-header p.subtitle {
        font-size: 14px;
      }
    }
  </style>
</head>
<body>
  <div class="receipt-container">
    <div class="receipt-header">
      <h1>The Sound Project</h1>
      <p class="subtitle">Bukti Pesanan</p>
    </div>

    <div class="receipt-body">
      <table>
        <tr>
          <th>Nama</th>
          <td>{{ $booking->nama }}</td>
        </tr>
        <tr>
          <th>Ruangan</th>
          <td>{{ $booking->ruangan->nama_ruangan }}</td>
        </tr>
        <tr>
          <th>Tanggal</th>
          <td>{{ $booking->tanggal }}</td>
        </tr>
        <tr>
          <th>Jam</th>
          <td>{{ $booking->jam }}</td>
        </tr>
        <tr>
          <th>Durasi</th>
          <td>{{ $booking->durasi }} Jam</td>
        </tr>
        <tr>
          <th>Total Harga</th>
          <td>Rp {{ number_format($booking->total_harga,0,',','.') }}</td>
        </tr>
        <<tr>
          <th>Status</th>
          <td><span class="status status-lunas">LUNAS</span>
          </td>
        </tr>
      </table>
    </div>
    <div class="receipt-footer">
      Terima kasih telah mempercayai layanan kami.<br />
      <small>Semoga harimu menyenangkan!</small>
    </div>
  </div>
</body>
</html>
