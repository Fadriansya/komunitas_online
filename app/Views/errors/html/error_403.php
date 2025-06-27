<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>403 - Akses Ditolak</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
      overflow: hidden;
    }

    .error-container {
      text-align: center;
      animation: fadeInDown 1s ease;
    }

    h1 {
      font-size: 8rem;
      font-weight: bold;
      color: #dc3545;
      animation: bounce 2s infinite;
    }

    h2 {
      margin-bottom: 20px;
      color: #343a40;
      animation: fadeInUp 1s ease;
    }

    p {
      color: #6c757d;
      margin-bottom: 30px;
      animation: fadeInUp 1.5s ease;
    }

    .btn-custom {
      margin: 5px;
      padding: 10px 20px;
      font-size: 1rem;
      border-radius: 30px;
    }

    /* Animations */
    @keyframes fadeInDown {
      0% {
        opacity: 0;
        transform: translateY(-50px);
      }

      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes fadeInUp {
      0% {
        opacity: 0;
        transform: translateY(50px);
      }

      100% {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes bounce {

      0%,
      100% {
        transform: translateY(0);
      }

      50% {
        transform: translateY(-20px);
      }
    }
  </style>
</head>

<body>

  <div class="error-container">
    <h1>403</h1>
    <h2>Akses Ditolak</h2>
    <p>Maaf, kamu tidak memiliki izin untuk mengakses halaman ini.</p>
    <div>
      <a href="<?= base_url('/') ?>" class="btn btn-primary btn-custom">Kembali ke Beranda</a>
      <a href="<?= base_url('/login') ?>" class="btn btn-outline-primary btn-custom">Login</a>
    </div>
  </div>

</body>

</html>