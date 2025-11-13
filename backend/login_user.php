<?php
session_start();
include ('../config/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    // cek user di database
    $query = "SELECT * FROM user WHERE email = '$email'";
    $cek_user = mysqli_query($koneksi, $query);
    if (mysqli_num_rows($cek_user) == 1) {
        $user = mysqli_fetch_assoc($cek_user);

        // verifikasi password;
        if (password_verify($password, $user['password'])) {
            $_SESSION['is_user'] = $user['id_user'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] === 'admin') {
                echo "<script>alert('Login Berhasil Sebagai Admin!');window.location.href='../frontend/admin/dashboard_admin.php';</script>";
            } else {
                echo "<script>alert('Login Berhasil Sebagai User!');window.location.href='../frontend/user/dashboard_user.php';</script>";
            }
        } else {
            echo "<script>alert('Password Salah!');window.location.href='../frontend/login.php';</script>";
        }
    }else 
    echo "<script>alert('Email Tidak Ditemukan!');window.location.href='../frontend/login.php';</script>";
}
?>