<?php
require("auth.php");
requireRole(['admin']);
include("../config/koneksi.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_pemain = $_POST['id_pemain'];
    $nama   = mysqli_real_escape_string($koneksi, $_POST['nama_pemain']);
    $posisi = mysqli_real_escape_string($koneksi, $_POST['posisi']);
    $tinggi = (int) $_POST['tinggi_cm'];
    $berat  = (int) $_POST['berat_kg'];
    $tanggal_lahir = mysqli_real_escape_string($koneksi, $_POST['tanggal_lahir']);
    $nomor_punggung = (int) $_POST['nomor_punggung'];

    // Cek nomor punggung (kecuali pemain ini)
    $cek = mysqli_query(
        $koneksi,
        "SELECT * FROM pemain 
         WHERE nomor_punggung = '$nomor_punggung'
         AND id_pemain != '$id_pemain'"
    );

    if (mysqli_num_rows($cek) > 0) {
        echo "<script>
                alert('Nomor punggung sudah dipakai pemain lain!');
                history.back();
              </script>";
        exit;
    }

    // UPDATE
    $query = "
        UPDATE pemain 
        SET nama_pemain='$nama', posisi='$posisi', tinggi_cm='$tinggi', berat_kg='$berat',
            tanggal_lahir='$tanggal_lahir', nomor_punggung='$nomor_punggung'
        WHERE id_pemain='$id_pemain'
    ";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>
                alert('Data pemain berhasil diperbarui!');
                window.location.href='../frontend/admin/daftar_pemain_admin.php';
              </script>";
    } else {
        echo "Gagal update: " . mysqli_error($koneksi);
    }
}
