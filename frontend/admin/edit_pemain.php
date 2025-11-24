<?php
require("../../backend/auth.php");
requireRole(['admin']);
include("../../config/koneksi.php");
include("../components/sidebar_admin.php");

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "<script>alert('ID pemain tidak ditemukan!');window.location.href = 'daftar_pemain_admin.php';</script>";
    exit;
}

$id = intval($_GET['id']);

// AMBIL DATA PEMAIN
$q = mysqli_query($koneksi, "SELECT * FROM pemain WHERE id_pemain = $id");

if (mysqli_num_rows($q) == 0) {
    echo "<script>alert('Data pemain tidak ditemukan!');window.location.href = 'daftar_pemain_admin.php';</script>";
    exit;
}

$data = mysqli_fetch_assoc($q);
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pemain</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="../components/sidebar.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="d-flex">
        <div class="flex-grow-1 p-4 main-content">
            <h2 class="mb-4">Edit Pemain</h2>

            <div class="card shadow-sm border-0">
                <div class="card-body p-4">

                    <form action="../../backend/ubah_pemain.php" method="POST">

                        <input type="hidden" name="id_pemain" value="<?= $data['id_pemain'] ?>">

                        <div class="mb-3">
                            <label class="form-label">Nama Pemain</label>
                            <input type="text" name="nama_pemain" class="form-control"
                                value="<?= $data['nama_pemain'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Posisi</label>
                            <select name="posisi" class="form-select" required>
                                <option <?= $data['posisi'] == "Point Guard" ? "selected" : "" ?>>Point Guard</option>
                                <option <?= $data['posisi'] == "Shooting Guard" ? "selected" : "" ?>>Shooting Guard</option>
                                <option <?= $data['posisi'] == "Small Forward" ? "selected" : "" ?>>Small Forward</option>
                                <option <?= $data['posisi'] == "Power Forward" ? "selected" : "" ?>>Power Forward</option>
                                <option <?= $data['posisi'] == "Center" ? "selected" : "" ?>>Center</option>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tinggi (cm)</label>
                                <input type="number" name="tinggi_cm" class="form-control"
                                    value="<?= $data['tinggi_cm'] ?>" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Berat (kg)</label>
                                <input type="number" name="berat_kg" class="form-control"
                                    value="<?= $data['berat_kg'] ?>" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control"
                                value="<?= $data['tanggal_lahir'] ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nomor Punggung</label>
                            <input type="number" name="nomor_punggung" class="form-control"
                                value="<?= $data['nomor_punggung'] ?>" required>
                        </div>

                        <button class="btn btn-primary">
                            <i class="fas fa-save me-2"></i> Simpan Perubahan
                        </button>

                        <a href="daftar_pemain_admin.php" class="btn btn-secondary">Kembali</a>

                    </form>

                </div>
            </div>

        </div>
    </div>
</body>

</html>