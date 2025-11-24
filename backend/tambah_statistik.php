<?php
require("auth.php");
requireRole(['admin']);
include("../config/koneksi.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id_pemain = intval($_POST['id_pemain']);
    $id_pertandingan = intval($_POST['id_pertandingan']);

    $poin = intval($_POST['poin']);
    $assist = intval($_POST['assist']);
    $rebound = intval($_POST['rebound']);
    $steal = intval($_POST['steal']);
    $block = intval($_POST['block']);
    $turnover = intval($_POST['turnover']);
    $fga = intval($_POST['fga']);
    $fgm = intval($_POST['fgm']);

    $query = "
        INSERT INTO statistik 
        (id_pemain, id_pertandingan, poin, assist, rebound, steal, block, turnover, fga, fgm)
        VALUES
        ('$id_pemain', '$id_pertandingan', '$poin', '$assist', '$rebound', '$steal', '$block', '$turnover', '$fga', '$fgm')
    ";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>
            alert('Statistik berhasil ditambahkan!');
            window.location.href='../frontend/admin/daftar_statistik_admin.php';
        </script>";
        exit;
    } else {
        echo "Gagal menambahkan: " . mysqli_error($koneksi);
    }
}
?>
