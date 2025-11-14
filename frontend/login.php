<?php
include("../config/koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,900" rel="stylesheet">

    <link href="../frontend/custom.css" rel="stylesheet">
</head>

<body class="bg-gradient-brand">

    <div class="d-flex justify-content-center align-items-center vh-100">

        <div class="card shadow-lg border-0 p-4 form-card">

            <div class="text-center mb-4">
                <h1 class="h4 text-dark">Welcome Back!</h1>
                <span class="badge badge-accent">Login</span>
            </div>

            <form action="../backend/login_user.php" method="POST">

                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>

                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    Login
                </button>
            </form>
            <hr>
            <div class="text-center">
                <a href="register.php" class="small">Belum punya akun? Registrasi!</a>
            </div>

        </div>
    </div>

</body>

</html>