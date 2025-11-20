<?php
include("../../config/koneksi.php");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pemain - Sistem Analisis Basket</title>
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
                    <h2>Tambah Pemain</h2>
                </div>
            </div>


            <div class="container-fluid p-4">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <form action="../../backend/tambah_pemain.php" method="POST">
                                    <div class="mb-3">
                                        <label for="nama_pemain" class="form-label fw-semibold">Nama Pemain</label>
                                        <input type="text" class="form-control" id="nama_pemain" name="nama_pemain" required placeholder="Masukkan nama pemain">
                                    </div>

                                    <div class="mb-3">
                                        <label for="posisi" class="form-label fw-semibold">Posisi</label>
                                        <select class="form-select" id="posisi" name="posisi" required>
                                            <option value="">-- Pilih Posisi --</option>
                                            <option value="Point Guard">Point Guard</option>
                                            <option value="Shooting Guard">Shooting Guard</option>
                                            <option value="Small Forward">Small Forward</option>
                                            <option value="Power Forward">Power Forward</option>
                                            <option value="Center">Center</option>
                                        </select>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="tinggi" class="form-label fw-semibold">Tinggi Badan (cm)</label>
                                                <input type="number" class="form-control" id="tinggi" name="tinggi" required placeholder="Contoh: 180">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="berat" class="form-label fw-semibold">Berat Badan (kg)</label>
                                                <input type="number" class="form-control" id="berat" name="berat" required placeholder="Contoh: 75">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="tanggal_lahir" class="form-label fw-semibold">Tanggal Lahir</label>
                                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="nomor_punggung" class="form-label fw-semibold">Nomor Punggung</label>
                                        <input type="number" class="form-control" id="nomor_punggung" name="nomor_punggung" required placeholder="Contoh: 23">
                                    </div>

                                    <hr>

                                    <div class="d-flex gap-2">
                                        <button type="submit" class="btn btn-primary fw-semibold">
                                            <i class="fas fa-save me-2"></i> Simpan Pemain
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