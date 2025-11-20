<?php
include("../config/koneksi.php");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Analisis Performa Pemain Basket</title>
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
                    <h1 class="card-title fw-bold text-primary">Sistem Analisis Basket</h1>
                    <p class="text-muted">Masuk ke akun Anda</p>
                </div>
                
                <form id="loginForm" action="../backend/login_user.php" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required placeholder="Masukkan email Anda">
                        <small class="text-danger" id="emailError" style="display:none;">Email tidak valid</small>
                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required placeholder="Masukkan password">
                        <small class="text-danger" id="passwordError" style="display:none;">Password minimal 6 karakter</small>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100 fw-semibold">Masuk</button>
                </form>
                
                <hr class="my-4">
                
                <p class="text-center text-muted">
                    Belum punya akun? <a href="register.php" class="text-primary fw-semibold">Daftar di sini</a>
                </p>
            </div>
        </div>
    </div>

</body>
</html>
