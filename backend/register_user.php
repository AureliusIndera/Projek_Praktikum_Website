<?php
include('../config/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // cek password sama
    if ($password !== $confirm_password) {
        echo "<script>
            alert('Konfirmasi Password Tidak Sama!');
            window.location.href='../frontend/register.php';
        </script>";
        exit;
    }

    // cek email sudah ada
    $queryCek = "SELECT * FROM user WHERE email='$email'";
    $cek_user = mysqli_query($koneksi, $queryCek);

    if (mysqli_num_rows($cek_user) > 0) {
        echo "<script>
            alert('Email Sudah Terdaftar!');
            window.location.href='../frontend/register.php';
        </script>";
        exit;
    }

    // hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // insert user baru
    $queryInsert = "
        INSERT INTO user (username, email, password, role)
        VALUES ('$username', '$email', '$hashed_password', 'user')
    ";

    if (mysqli_query($koneksi, $queryInsert)) {
        echo "<script>
            alert('Registrasi Berhasil!');
            window.location.href='../frontend/login.php';
        </script>";
    } else {
        echo "<script>
            alert('Registrasi Gagal! Silakan coba lagi.');
            window.location.href='../frontend/register.php';
        </script>";
    }
}
?>
