<?php
require("auth.php");
requireRole(['admin']);
include("../config/koneksi.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id_statistik= intval($_POST['id_statistik']);
    $id_pemain = intval($_POST['id_pemain']);
    $id_pertandingan = intval($_POST['id_pertandingan']);

    // Ambil semua field angka
    $fields = ['poin', 'assist', 'rebound', 'steal', 'block', 'turnover', 'fga', 'fgm'];
    foreach ($fields as $f) {
        $$f = intval($_POST[$f]);
    }

    // Cek apakah pemain valid
    $cek_pemain = mysqli_query($koneksi, "SELECT id_pemain FROM pemain WHERE id_pemain = $id_pemain");
    if (mysqli_num_rows($cek_pemain) == 0) {
        die("Error: id_pemain tidak ditemukan di tabel pemain!");
    }

    // Cek apakah pertandingan valid
    $cek_pertandingan
    = mysqli_query($koneksi, "SELECT id_pertandingan FROM pertandingan WHERE id_pertandingan = $id_pertandingan");
    if (mysqli_num_rows($cek_pertandingan) == 0) {
        die("Error: id_pertandingan tidak ditemukan di tabel pertandingan!");
    }

    // Query update
    $query = "UPDATE statistik SET
            id_pemain = '$id_pemain',
            id_pertandingan = '$id_pertandingan',
            poin = '$poin',
            assist = '$assist',
            rebound = '$rebound',
            steal = '$steal',
            block = '$block',
            turnover = '$turnover',
            fga = '$fga',
            fgm = '$fgm'
        WHERE id_statistik = '$id_statistik'";
    if (mysqli_query($koneksi, $query)) {
        echo "<script>
    alert('Data statistik berhasil diperbarui!');
    window.location.href='../frontend/admin/daftar_statistik_admin.php';</script>";
    } else {
        echo "Gagal update: " . mysqli_error($koneksi);
    }
}
