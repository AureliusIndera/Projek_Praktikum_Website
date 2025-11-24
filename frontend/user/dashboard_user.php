<?php
require("../../backend/auth.php");
requireRole(['user']);
include("../../config/koneksi.php");
include("../components/sidebar_user.php");

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
    <title>Dashboard User</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="../components/sidebar.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="d-flex">
        <div class="flex-grow-1 p-4 main-content">
            <nav class="row mb-4">
                <div class="col-12">
                    <h2 class="mb-1">Dashboard User</h2>
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
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0 shadow-sm text-center p-3 h-100">
                            <i class="fas fa-users fa-2x text-success mb-3"></i>
                            <h5>Daftar Pemain</h5>
                            <p class="text-muted small">Lihat semua pemain</p>
                            <a href="daftar_pemain_user.php" class="btn btn-sm btn-success">Akses</a>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0 shadow-sm text-center p-3 h-100">
                            <i class="fas fa-chart-column fa-2x text-primary mb-3"></i>
                            <h5>Daftar Statistik</h5>
                            <p class="text-muted small">Lihat seluruh statistik pertandingan</p>
                            <a href="daftar_statistik_user.php" class="btn btn-sm btn-primary">Akses</a>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div class="card border-0 shadow-sm text-center p-3 h-100">
                            <i class="fas fa-calendar-days fa-2x text-warning mb-3"></i>
                            <h5>Daftar Pertandingan</h5>
                            <p class="text-muted small">Lihat jadwal dan riwayat pertandingan</p>
                            <a href="daftar_pertandingan_user.php" class="btn btn-sm btn-warning">Akses</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>