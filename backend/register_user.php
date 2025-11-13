<?php
include ('../config/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $nama_lengkap = mysqli_real_escape_string($koneksi, $_POST['nama_lengkap']);

    // cek apakah email sudah terdaftar
    $query = "SELECT * FROM user WHERE email='$email'";
    $cek_user = mysqli_query($koneksi, $query);
    if (mysqli_num_rows($cek_user) > 0) {
        echo "<script>alert('Email Sudah Terdaftar!'); window.location.href='../frontend/register.php';</script>";
        exit;
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);  // hash password

    // simpan user ke database
    $query = "INSERT INTO user (username,email,password,nama_lengkap) VALUES ('$username','$email','$hashed_password', '$nama_lengkap')";
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Registrasi Berhasil!'); window.location.href='../frontend/login.php';</script>";
    } else {
        echo "<script>alert('Registrasi Gagal!'); window.location.href='../frontend/register.php';</script>";
    }
}
?>