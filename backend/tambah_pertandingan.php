<?php
require("auth.php");
requireRole(['admin']);
include("../config/koneksi.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $tanggal = $_POST['tanggal'];
    $lawan   = mysqli_real_escape_string($koneksi, $_POST['lawan']);

    $query = "INSERT INTO pertandingan (tanggal, lawan)
              VALUES ('$tanggal', '$lawan')";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Pertandingan berhasil ditambahkan!'); 
              window.location.href='../frontend/admin/daftar_pertandingan_admin.php';</script>";
    } else {
        echo "Gagal: " . mysqli_error($koneksi);
    }
}
