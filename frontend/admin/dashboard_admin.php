<?php 
include ("../../config/koneksi.php");

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Project Basket</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../frontend/style.css">
  
</head>

<body>
  <div class="d-flex">
    <div class="sidebar">
      <h5 class="px-4 mb-4 fw-bold">Analisi Performa Pemain Basket </h5>

      <p class="px-4 text-uppercase text-muted small">Menu Utama</p>

      <a href="dashboard_admin.php" class="nav-link active">Dashboard</a>
      <a href="../common/daftar_pemain.php" class="nav-link">Daftar Pemain</a>
      <a href="../common/daftar_statistik.php" class="nav-link">Daftar Statistik</a>

      <p class="px-4 mt-4 text-uppercase text-muted small">Aksi Cepat</p>

      <a href="tambah_pemain.php" class="nav-link">Tambah Pemain</a>
      <a href="tambah_statistik.php" class="nav-link">Tambah Statistik</a>

    </div>

    <div class="flex-grow-1">
<div class="topbar d-flex justify-content"></div>
    </div>
  </div>
</body>

</html>