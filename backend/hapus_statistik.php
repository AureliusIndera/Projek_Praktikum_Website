<?php
require("auth.php");
requireRole(['admin']);
include("../config/koneksi.php");

if (!isset($_GET['id'])) {
    echo "<script>alert('ID pemain tidak ditemukan!'); history.back();</script>";
    exit;
}

$id = intval($_GET['id']);

// Cek apakah pemain punya statistik
$cek = mysqli_query($koneksi, "SELECT id_statistik FROM statistik WHERE id_pemain = $id");

if (mysqli_num_rows($cek) > 0) {
    echo "<script>
            alert('Tidak bisa menghapus pemain karena masih punya data statistik!');
            window.location.href='../frontend/admin/daftar_pemain_admin.php';
          </script>";
    exit;
}

// Hapus data pemain
$query = mysqli_query($koneksi, "DELETE FROM pemain WHERE id_pemain = $id");

if ($query) {
    echo "<script>
            alert('Pemain berhasil dihapus!');
            window.location.href='../frontend/admin/daftar_pemain_admin.php';
          </script>";
} else {
    echo "<script>alert('Gagal menghapus pemain!');</script>";
}
