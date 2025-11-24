<?php
require("auth.php");
requireRole(['admin']);
include("../config/koneksi.php");

$id = $_GET['id'];

$query = "DELETE FROM pertandingan WHERE id_pertandingan='$id'";

if (mysqli_query($koneksi, $query)) {
    echo "<script>alert('Pertandingan berhasil dihapus!'); 
          window.location.href='../frontend/admin/daftar_pertandingan_admin.php';</script>";
} else {
    echo "Gagal: " . mysqli_error($koneksi);
}
