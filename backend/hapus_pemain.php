<?php
require("auth.php");
requireRole(['admin']);
include("../config/koneksi.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM pemain WHERE id_pemain = '$id'";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>
                alert('Pemain berhasil dihapus!');
                window.location.href='../frontend/admin/daftar_pemain_admin.php';
              </script>";
    } else {
        echo "Gagal menghapus: " . mysqli_error($koneksi);
    }
}
