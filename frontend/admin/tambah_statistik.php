<?php
include("../../config/koneksi.php");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Statistik - Sistem Analisis Basket</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="../components/sidebar.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="d-flex">
        <?php include("../components/sidebar_admin.php"); ?>

        <!-- Main Content -->
        <div class="flex-grow-1 p-4 main-content">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2>Tambah Statistik Pertandingan</h2>
                </div>
            </div>


            <div class="container-fluid p-4">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <form id="formStatistik" action="../../backend/tambah_statistik.php" method="POST">
                                    <div class="mb-3">
                                        <label for="id_pemain" class="form-label fw-semibold">Pilih Pemain</label>
                                        <select class="form-select" id="id_pemain" name="id_pemain" required>
                                            <option value="">-- Pilih Pemain --</option>
                                            <option value="1">Andi Wijaya</option>
                                            <option value="2">Budi Santoso</option>
                                            <option value="3">Citra Dewi</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="pertandingan" class="form-label fw-semibold">Pertandingan</label>
                                        <input type="text" class="form-control" id="pertandingan" name="pertandingan" required placeholder="Masukkan nama pertandingan">
                                    </div>

                                    <div class="mb-3">
                                        <label for="tanggal" class="form-label fw-semibold">Tanggal Pertandingan</label>
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                                    </div>

                                    <h5 class="mb-3 mt-4">Statistik Pertandingan</h5>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="poin" class="form-label fw-semibold">Poin</label>
                                                <input type="number" class="form-control" id="poin" name="poin" required placeholder="0" min="0">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="assist" class="form-label fw-semibold">Assist</label>
                                                <input type="number" class="form-control" id="assist" name="assist" required placeholder="0" min="0">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="rebound" class="form-label fw-semibold">Rebound</label>
                                                <input type="number" class="form-control" id="rebound" name="rebound" required placeholder="0" min="0">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="steal" class="form-label fw-semibold">Steal</label>
                                                <input type="number" class="form-control" id="steal" name="steal" required placeholder="0" min="0">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="block" class="form-label fw-semibold">Block</label>
                                                <input type="number" class="form-control" id="block" name="block" required placeholder="0" min="0">
                                            </div>
                                        </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="turnover" class="form-label fw-semibold">Turnover</label>
                                                    <input type="number" class="form-control" id="turnover" name="turnover"
                                                        required placeholder="0" min="0">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="fg_made" class="form-label fw-semibold">FG Made</label>
                                                        <input type="number" class="form-control" id="fg_made" name="fg_made"
                                                            required placeholder="0" min="0">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="fg_attempt" class="form-label fw-semibold">FG Attempt</label>
                                                        <input type="number" class="form-control" id="fg_attempt" name="fg_attempt"
                                                            required placeholder="0" min="0">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex gap-2">
                                            <button type="submit" class="btn btn-primary fw-semibold">
                                                <i class="fas fa-save me-2"></i> Simpan Statistik
                                            </button>
                                            <a href="dashboard_admin.php" class="btn btn-secondary fw-semibold">
                                                <i class="fas fa-arrow-left me-2"></i> Kembali
                                            </a>
                                        </div>
                                </form>
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