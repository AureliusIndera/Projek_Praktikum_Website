<?php
require("../../backend/auth.php");
requireRole(['admin']);
include("../../config/koneksi.php");
include("../components/sidebar_admin.php");

if (!isset($_GET['id'])) {
    echo "<script>alert('ID tidak ditemukan'); window.location='daftar_pertandingan_admin.php'</script>";
    exit;
}

$id = intval($_GET['id']);
$data = mysqli_query($koneksi, "SELECT * FROM pertandingan WHERE id_pertandingan = $id");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Pertandingan</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="../components/sidebar.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="d-flex">
    <div class="flex-grow-1 p-4 main-content">
        <h2 class="mb-4">Edit Pertandingan</h2>
        <div class="card shadow-sm border-0 col-lg-12">
            <div class="card-body p-4">
                <form action="../../backend/ubah_pertandingan.php" method="POST">
                    <input type="hidden" name="id_pertandingan" value="<?= $row['id_pertandingan'] ?>">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tanggal Pertandingan</label>
                        <input type="date" class="form-control" name="tanggal" value="<?= $row['tanggal'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Lawan</label>
                        <input type="text" class="form-control" name="lawan" value="<?= $row['lawan'] ?>" required>
                    </div>
                    <div class="d-flex gap-2">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-save me-2"></i> Simpan Perubahan
                        </button>
                        <a href="daftar_pertandingan_admin.php" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
