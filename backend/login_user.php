<?php
session_start();
include ('../config/koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    // cek user berdasarkan email
    $query = "SELECT * FROM user WHERE email = '$email'";
    $cek_user = mysqli_query($koneksi, $query);

    if (!$cek_user) {
        die("Query error: " . mysqli_error($koneksi));
    }

    if (mysqli_num_rows($cek_user) == 1) {
        $user = mysqli_fetch_assoc($cek_user);

        if (password_verify($password, $user['password'])) {

            // set session login
            $_SESSION['is_login'] = true;
            $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $user['role'];

            if ($user['role'] === 'admin') {
                echo "<script>
                    alert('Login Berhasil Sebagai Admin!');
                    window.location.href='../frontend/admin/dashboard_admin.php';
                </script>";
            } else {
                echo "<script>
                    alert('Login Berhasil!');
                    window.location.href='../frontend/user/dashboard_user.php';
                </script>";
            }

        } else {
            echo "<script>
                alert('Password Salah!');
                window.location.href='../frontend/login.php';
            </script>";
        }

    } else {
        echo "<script>
            alert('Email Tidak Ditemukan!');
            window.location.href='../frontend/login.php';
        </script>";
    }
}
?>
