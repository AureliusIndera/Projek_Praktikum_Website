<?php
include("../config/koneksi.php");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Sistem Analisis Performa Pemain Basket</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container-fluid auth-wrapper">
    <div class="card shadow-lg auth-card">
        <div class="card-body p-5">

                <div class="text-center mb-4">
                    <!-- Added Basketball Icon -->
                    <div class="display-3 mb-3">🏀</div>
                    <h1 class="card-title fw-bold text-primary">Daftar Akun</h1>
                    <p class="text-muted">Buat akun baru untuk mulai</p>
                </div>
                
                <form id="registerForm" action="../backend/register_user.php" method="POST">
                    <div class="mb-3">
                        <label for="nama" class="form-label fw-semibold">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required placeholder="Masukkan username">
                        <small class="text-danger" id="namaError" style="display:none;">Username minimal 3 karakter</small>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required placeholder="Masukkan email">
                        <small class="text-danger" id="emailError" style="display:none;">Email tidak valid</small>
                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required placeholder="Buat password">
                        <small class="text-danger" id="passwordError" style="display:none;">Password minimal 6 karakter</small>
                    </div>
                    
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label fw-semibold">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required placeholder="Konfirmasi password">
                        <small class="text-danger" id="confirmError" style="display:none;">Password tidak cocok</small>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100 fw-semibold">Daftar</button>
                </form>
                
                <hr class="my-4">
                
                <p class="text-center text-muted">
                    Sudah punya akun? <a href="login.php" class="text-primary fw-semibold">Masuk di sini</a>
                </p>
            </div>
        </div>
    </div>

</body>
</html>