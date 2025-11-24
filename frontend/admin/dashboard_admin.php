<?php
require("../../backend/auth.php");
requireRole(['admin']);
include("../../config/koneksi.php");
include("../components/sidebar_admin.php");

// Total Pemain
$pemain = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM pemain");
$jumlahPemain = mysqli_fetch_assoc($pemain)['total'];

// Total Statistik
$stat = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM statistik");
$jumlahStat = mysqli_fetch_assoc($stat)['total'];

// Total Pertandingan
$pt = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM pertandingan");
$jumlahPertandingan = mysqli_fetch_assoc($pt)['total'];
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="../components/sidebar.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="d-flex">
        <div class="flex-grow-1 p-4 main-content">
            <nav class="row mb-4">
                <div class="col-12">
                    <h2 class="mb-1">Dashboard Admin</h2>
                    <p class="text-muted">Kelola data pemain, pertandingan, dan statistik.</p>
                </div>
            </nav>

            <div class="container-fluid p-4">
                <div class="row g-3 mb-4">

                    <!-- Total Pemain -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0 shadow-sm bg-light">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="card-title text-muted">Total Pemain</h6>
                                        <h3 class="text-success fw-bold"><?= $jumlahPemain ?></h3>
                                    </div>
                                    <i class="fas fa-users fa-3x text-success opacity-25"></i>
                                </div>
                            </div>
                        </div>
                    </div>  
                    
                    <!-- Total Statistik -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0 shadow-sm bg-light">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="card-title text-muted">Total Statistik</h6>
                                        <h3 class="text-primary fw-bold"><?= $jumlahStat ?></h3>
                                    </div>
                                    <i class="fas fa-chart-line fa-3x text-primary opacity-25"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Total Pertandingan -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0 shadow-sm bg-light">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="card-title text-muted">Total Pertandingan</h6>
                                        <h3 class="text-warning fw-bold"><?= $jumlahPertandingan ?></h3>
                                    </div>
                                    <i class="fas fa-basketball-ball fa-3x text-warning opacity-25"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- NAVIGASI -->
                <hr class="my-4">
                <h4 class="mb-4">Menu Manajemen</h4>
                <div class="row g-3">

                    <!-- Daftar Pemain -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0 shadow-sm text-center p-3 h-100">
                            <i class="fas fa-user fa-2x text-success mb-3"></i>
                            <h5>Daftar Pemain</h5>
                            <p class="text-muted small">Lihat semua pemain yang terdaftar</p>
                            <a href="daftar_pemain_admin.php" class="btn btn-sm btn-success">Akses</a>
                        </div>
                    </div>

                    <!-- Daftar Statistik -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0 shadow-sm text-center p-3 h-100">
                            <i class="fas fa-chart-column fa-2x text-primary mb-3"></i>
                            <h5>Daftar Statistik</h5>
                            <p class="text-muted small">Lihat seluruh statistik pertandingan</p>
                            <a href="daftar_statistik_admin.php" class="btn btn-sm btn-primary">Akses</a>
                        </div>
                    </div>

                    <!-- Daftar Pertandingan -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0 shadow-sm text-center p-3 h-100">
                            <i class="fas fa-calendar-days fa-2x text-warning mb-3"></i>
                            <h5>Daftar Pertandingan</h5>
                            <p class="text-muted small">Lihat jadwal dan riwayat pertandingan</p>
                            <a href="daftar_pertandingan_admin.php" class="btn btn-sm btn-warning">Akses</a>
                        </div>
                    </div>

                    <!-- Tambah Pemain -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0 shadow-sm text-center p-3 h-100">
                            <i class="fas fa-user-plus fa-2x text-danger mb-3"></i>
                            <h5>Tambah Pemain</h5>
                            <p class="text-muted small">Tambah data pemain baru</p>
                            <a href="tambah_pemain.php" class="btn btn-sm btn-danger">Akses</a>
                        </div>
                    </div>

                    <!-- Tambah Statistik -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0 shadow-sm text-center p-3 h-100">
                            <i class="fas fa-square-plus fa-2x text-info mb-3"></i>
                            <h5>Tambah Statistik</h5>
                            <p class="text-muted small">Tambah data statistik pemain</p>
                            <a href="tambah_statistik.php" class="btn btn-sm btn-info">Akses</a>
                        </div>
                    </div>

                    <!-- Tambah Pertandingan -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0 shadow-sm text-center p-3 h-100">
                            <i class="fas fa-calendar-plus fa-2x text-secondary mb-3"></i>
                            <h5>Tambah Pertandingan</h5>
                            <p class="text-muted small">Tambah jadwal pertandingan baru</p>
                            <a href="tambah_pertandingan.php" class="btn btn-sm btn-secondary">Akses</a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>