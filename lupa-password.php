<?php
require "koneksi.php";
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - Sistem Rekam Medis</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background: linear-gradient(to right, #e0f2ff, #ffffff);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
    }
    .login-container {
      background: rgba(255, 255, 255, 0.95);
      padding: 40px 32px;
      width: 420px;
      border-radius: 24px;
      box-shadow: 0 12px 32px rgba(0, 0, 0, 0.1);
      text-align: center;
    }
    .login-container img.logo {
      width: 64px;
      margin-bottom: 20px;
    }
    .login-container h2 {
      font-weight: bold;
      margin-bottom: 8px;
    }
    .login-container p {
      margin-bottom: 24px;
      color: #555;
    }
    .form-control {
      border-radius: 12px;
      padding: 12px;
      margin-bottom: 16px;
    }
    .btn-primary {
      border-radius: 12px;
      padding: 12px;
      width: 100%;
    }
    .footer {
      margin-top: 24px;
      font-size: 0.85rem;
      color: #888;
    }
        #lupa {
      display: block;
      margin-top: 16px;
      color: #007bff;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <form action="proses-lupa.php" method="post">
    <div class="login-container">
      <img src="assets/gambar/logo.png" alt="Logo" class="logo" />
      <h2>Reset Password</h2>
      <input type="text" class="form-control" name="username" placeholder="Username" required />
      <input type="password" class="form-control" name="password" placeholder=" Masukan Password Baru" required />
      <input type="password2" class="form-control" name="password2" placeholder=" Konfirmasi Password Baru" required />
      <button type="submit" class="btn btn-primary" name="lupa">Reset</button>
      <a href="index.php" id="lupa">Kembali Ke Login</a>
      <div class="footer">© 2024–2025</div>
    </div>
  </form>
  <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
