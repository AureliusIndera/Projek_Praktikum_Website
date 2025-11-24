<?php
require("../../backend/auth.php");
requireRole(['admin']);
include("../../config/koneksi.php");
include("../components/sidebar_admin.php");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pemain</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="../components/sidebar.css" rel="stylesheet">
</head>

<body class="bg-light">
<div class="d-flex">
    <div class="flex-grow-1 p-4 main-content">
        <h2 class="mb-4">Tambah Pemain</h2>

        <div class="card shadow-sm border-0">
            <div class="card-body p-4">

                <form action="../../backend/tambah_pemain.php" method="POST">

                    <div class="mb-3">
                        <label class="form-label">Nama Pemain</label>
                        <input type="text" name="nama_pemain" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Posisi</label>
                        <select name="posisi" class="form-select" required>
                            <option value="">-- Pilih Posisi --</option>
                            <option value="Point Guard">Point Guard</option>
                            <option value="Shooting Guard">Shooting Guard</option>
                            <option value="Small Forward">Small Forward</option>
                            <option value="Power Forward">Power Forward</option>
                            <option value="Center">Center</option>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tinggi (cm)</label>
                            <input type="number" name="tinggi_cm" class="form-control" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Berat (kg)</label>
                            <input type="number" name="berat_kg" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nomor Punggung</label>
                        <input type="number" name="nomor_punggung" class="form-control" required>
                    </div>

                    <button class="btn btn-primary">
                        <i class="fas fa-save me-2"></i> Simpan
                    </button>

                    <a href="daftar_pemain_admin.php" class="btn btn-secondary">Kembali</a>

                </form>

            </div>
        </div>

    </div>
</div>
</body>
</html>
