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
    <title>Tambah Pertandingan</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="../components/sidebar.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="d-flex">
    <div class="flex-grow-1 p-4 main-content">
        <h2 class="mb-4">Tambah Pertandingan</h2>
        <div class="card shadow-sm border-0 col-lg-12">
            <div class="card-body p-4">
                <form action="../../backend/tambah_pertandingan.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal Pertandingan</label>
                        <input type="date" class="form-control" name="tanggal" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Lawan</label>
                        <input type="text" class="form-control" name="lawan" required placeholder="Contoh: Tim A">
                    </div>
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-save me-2"></i> Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
