<?php
require("auth.php");
requireRole(['admin']);
include("../config/koneksi.php");

// Pastikan method POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nama   = mysqli_real_escape_string($koneksi, $_POST['nama_pemain']);
    $posisi = mysqli_real_escape_string($koneksi, $_POST['posisi']);
    $tinggi = (int) $_POST['tinggi_cm'];
    $berat  = (int) $_POST['berat_kg'];
    $tanggal_lahir = mysqli_real_escape_string($koneksi, $_POST['tanggal_lahir']);
    $nomor_punggung = (int) $_POST['nomor_punggung'];

    // Cek apakah nomor punggung sudah digunakan
    $cek = mysqli_query($koneksi, "SELECT * FROM pemain WHERE nomor_punggung = '$nomor_punggung'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>
                alert('Nomor punggung sudah digunakan!');
                history.back();
              </script>";
        exit;
    }

    // QUERY INSERT
    $query = "
        INSERT INTO pemain (nama_pemain, posisi, tinggi_cm, berat_kg, tanggal_lahir, nomor_punggung)
        VALUES ('$nama', '$posisi', '$tinggi', '$berat', '$tanggal_lahir', '$nomor_punggung')
    ";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>
                alert('Pemain berhasil ditambahkan!');
                window.location.href='../frontend/admin/daftar_pemain_admin.php';
              </script>";
    } else {
        echo "Gagal menambahkan pemain: " . mysqli_error($koneksi);
    }
}
