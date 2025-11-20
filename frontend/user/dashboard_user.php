<?php
include("../../config/koneksi.php");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User - Sistem Analisis Basket</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="../components/sidebar.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="d-flex">
        <?php include("../components/sidebar_user.php"); ?>

        <!-- Main Content -->
        <div class="flex-grow-1 p-4 main-content">
            <nav class="row mb-4">
                <div class="col-12">
                    <h2 class="mb-1">Dashboard User</h2>
                    <p class="text-muted">Lihat data performa pemain disini</p>
                </div>
            </nav>

            <div class="container-fluid p-4">
                
                <div class="row g-3 mb-4">
                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0 shadow-sm bg-light">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="card-title text-muted">Total Pemain</h6>
                                        <h3 class="text-primary fw-bold">24</h3>
                                    </div>
                                    <i class="fas fa-users fa-3x text-primary opacity-25"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0 shadow-sm bg-light">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="card-title text-muted">Total Pertandingan</h6>
                                        <h3 class="text-success fw-bold">12</h3>
                                    </div>
                                    <i class="fas fa-basketball fa-3x text-success opacity-25"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0 shadow-sm bg-light">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="card-title text-muted">Total Statistik</h6>
                                        <h3 class="text-info fw-bold">156</h3>
                                    </div>
                                    <i class="fas fa-chart-bar fa-3x text-info opacity-25"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0 shadow-sm bg-light">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="card-title text-muted">Rating Rata-rata</h6>
                                        <h3 class="text-warning fw-bold">8.5/10</h3>
                                    </div>
                                    <i class="fas fa-star fa-3x text-warning opacity-25"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-4">

                <h4 class="mb-3">Menu Manajemen</h4>
                <div class="row g-3">


                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-list fa-2x text-success mb-3"></i>
                                <h5 class="card-title">Daftar Pemain</h5>
                                <p class="card-text text-muted small">Lihat dan kelola semua pemain</p>
                                <a href="../common/daftar_pemain.php" class="btn btn-sm btn-success">Akses</a>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body text-center">
                                <i class="fas fa-table fa-2x text-warning mb-3"></i>
                                <h5 class="card-title">Daftar Statistik</h5>
                                <p class="card-text text-muted small">Lihat semua data statistik</p>
                                <a href="../common/daftar_statistik.php" class="btn btn-sm btn-warning">Akses</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>