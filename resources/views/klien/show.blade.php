<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bukti Pembayaran</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { text-align: center; margin-top: 50px; }
        h1 { color: #0077b6; }
        table { width: 80%; margin: 0 auto; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 10px; }
        th { background: #f5faff; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bukti Pembayaran</h1>
        <p>Kode Booking: #{{ $booking->id }}</p>
        <table>
            <tr><th>Nama</th><td>{{ $booking->nama }}</td></tr>
            <tr><th>Ruangan</th><td>{{ $booking->ruangan->nama_ruangan }}</td></tr>
            <tr><th>Tanggal</th><td>{{ $booking->tanggal }}</td></tr>
            <tr><th>Jam</th><td>{{ $booking->jam }}</td></tr>
            <tr><th>Durasi</th><td>{{ $booking->durasi }} Jam</td></tr>
            <tr><th>Total Harga</th><td>Rp {{ number_format($booking->total_harga, 0, ',', '.') }}</td></tr>
            <tr><th>Status</th><td>LUNAS</td></tr>
        </table>
        <p style="margin-top:20px;">Terima kasih telah menggunakan layanan kami 🎵</p>
    </div>
</body>
</html>
