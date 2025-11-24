<?php
require("../../backend/auth.php");
requireRole(['admin']);
include("../../config/koneksi.php");
include("../components/sidebar_admin.php");

// Ambil pemain
$pemain = mysqli_query($koneksi, "SELECT * FROM pemain ORDER BY nama_pemain ASC");

// Ambil pertandingan
$pertandingan = mysqli_query($koneksi, "SELECT * FROM pertandingan ORDER BY tanggal DESC");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Statistik</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="../components/sidebar.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="d-flex">
        <div class="flex-grow-1 p-4 main-content">
            <h2 class="mb-4">Tambah Statistik Pemain</h2>

            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <form action="../../backend/tambah_statistik.php" method="POST">

                        <!-- Pemain -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Pemain</label>
                            <select class="form-select" name="id_pemain" required>
                                <option value="">-- Pilih Pemain --</option>
                                <?php while ($p = mysqli_fetch_assoc($pemain)) { ?>
                                    <option value="<?= $p['id_pemain'] ?>">
                                        <?= $p['nama_pemain'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <!-- Pertandingan -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Pertandingan</label>
                            <select class="form-select" name="id_pertandingan" required>
                                <option value="">-- Pilih Pertandingan --</option>
                                <?php while ($pt = mysqli_fetch_assoc($pertandingan)) { ?>
                                    <option value="<?= $pt['id_pertandingan'] ?>">
                                        <?= $pt['tanggal'] ?> - vs <?= $pt['lawan'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">Poin</label>
                                <input type="number" class="form-control" name="poin" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Assist</label>
                                <input type="number" class="form-control" name="assist" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Rebound</label>
                                <input type="number" class="form-control" name="rebound" required>
                            </div>
                        </div>

                        <div class="row g-3 mt-2">
                            <div class="col-md-4">
                                <label class="form-label">Steal</label>
                                <input type="number" class="form-control" name="steal" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Block</label>
                                <input type="number" class="form-control" name="block" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Turnover</label>
                                <input type="number" class="form-control" name="turnover" required>
                            </div>
                        </div>

                        <div class="row g-3 mt-2">
                            <div class="col-md-6">
                                <label class="form-label">FGA(Total Percobaan Menembak)</label>
                                <input type="number" class="form-control" name="fga" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">FGM(Total Tembakan Masuk)</label>
                                <input type="number" class="form-control" name="fgm" required>
                            </div>
                        </div>

                        <hr>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="daftar_statistik_admin.php" class="btn btn-secondary">Kembali</a>

                    </form>
                </div>
            </div>

        </div>
    </div>
</body>

</html>