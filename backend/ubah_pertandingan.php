<?php
require("auth.php");
requireRole(['admin']);
include("../config/koneksi.php");

$id       = $_POST['id_pertandingan'];
$tanggal  = $_POST['tanggal'];
$lawan    = mysqli_real_escape_string($koneksi, $_POST['lawan']);

$query = "UPDATE pertandingan 
          SET tanggal='$tanggal', lawan='$lawan'
          WHERE id_pertandingan='$id'";

if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Data pertandingan berhasil diubah!'); 
          window.location.href='../frontend/admin/daftar_pertandingan_admin.php';</script>";
} else {
    echo "Gagal update: " . mysqli_error($koneksi);
}
