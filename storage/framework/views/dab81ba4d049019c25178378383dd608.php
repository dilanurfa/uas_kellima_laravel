<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bukti Pembayaran</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      background: #f3f4f6;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      color: #212529;
    }
    .receipt-container {
      max-width: 650px;
      margin: 50px auto;
    }
    .receipt-card {
      background: #fff;
      border-radius: 1rem;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0,0,0,0.08);
      position: relative;
    }
    .receipt-header {
      background: linear-gradient(135deg,#0d6efd,#4dabf7);
      color: #fff;
      padding: 2rem;
      text-align: center;
      position: relative;
    }
    .receipt-header h1 {
      font-weight: 700;
      font-size: 1.8rem;
      margin: 0;
    }
    .receipt-header i {
      font-size: 2.5rem;
      margin-bottom: 10px;
    }
    .receipt-body {
      padding: 2rem;
    }
    .detail-item {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0.8rem 0;
      border-bottom: 1px dashed #dee2e6;
    }
    .detail-item:last-child {
      border-bottom: none;
    }
    .detail-label {
      color: #6c757d;
      font-weight: 500;
      font-size: 0.95rem;
    }
    .detail-value {
      font-weight: 600;
      font-size: 1rem;
      text-align: right;
      max-width: 60%;
      word-break: break-word;
    }
    .status-badge {
      font-size: 0.85rem;
      padding: .4em .8em;
      border-radius: 50px;
    }
    .receipt-footer {
      background: #f8f9fa;
      padding: 1rem 2rem;
      text-align: center;
      font-size: 0.9rem;
      color: #6c757d;
    }
    .btn-custom {
      border-radius: 50px;
      padding: 10px 20px;
      font-weight: 500;
      font-size: 0.95rem;
    }
  </style>
</head>
<body>
  <div class="receipt-container">
    <div class="receipt-card">
      <!-- HEADER -->
      <div class="receipt-header">
        <i class="bi bi-receipt-cutoff"></i>
        <h1>Bukti Pembayaran</h1>
      </div>

      <!-- BODY -->
      <div class="receipt-body">
        <div class="detail-item">
          <span class="detail-label"><i class="bi bi-person-fill me-2"></i>Nama</span>
          <span class="detail-value"><?php echo e($booking->nama); ?></span>
        </div>
        <div class="detail-item">
          <span class="detail-label"><i class="bi bi-building me-2"></i>Ruangan</span>
          <span class="detail-value"><?php echo e($booking->ruangan->nama_ruangan); ?></span>
        </div>
        <div class="detail-item">
          <span class="detail-label"><i class="bi bi-calendar3 me-2"></i>Tanggal</span>
          <span class="detail-value"><?php echo e($booking->tanggal); ?></span>
        </div>
        <div class="detail-item">
          <span class="detail-label"><i class="bi bi-clock-history me-2"></i>Jam</span>
          <span class="detail-value"><?php echo e($booking->jam); ?></span>
        </div>
        <div class="detail-item">
          <span class="detail-label"><i class="bi bi-hourglass-split me-2"></i>Durasi</span>
          <span class="detail-value"><?php echo e($booking->durasi); ?> Jam</span>
        </div>
        <div class="detail-item">
          <span class="detail-label"><i class="bi bi-cash-coin me-2"></i>Total Harga</span>
          <span class="detail-value text-primary">Rp <?php echo e(number_format($booking->total_harga, 0, ',', '.')); ?></span>
        </div>
        <div class="detail-item">
          <span class="detail-label"><i class="bi bi-patch-check-fill me-2"></i>Status</span>
          <span class="detail-value">
            <span class="badge bg-success status-badge">LUNAS</span>
          </span>
        </div>

        <div class="text-center mt-4">
          <a href="/" class="btn btn-primary btn-custom me-2">
            <i class="bi bi-house-door-fill me-1"></i>Kembali
          </a>
          <a href="<?php echo e(route('booking.download', $booking->id)); ?>" class="btn btn-outline-secondary btn-custom">
  <i class="bi bi-filetype-pdf me-1"></i>Download PDF
</a>

        </div>
      </div>

      <!-- FOOTER -->
      <div class="receipt-footer">
        Terima kasih telah mempercayai layanan kami 💙<br>
        <small>Semoga harimu menyenangkan!</small>
      </div>
    </div>
  </div>
</body>
</html>
<?php /**PATH C:\Users\lenovo\Documents\uas_kellima_laravel\resources\views/klien/show.blade.php ENDPATH**/ ?>