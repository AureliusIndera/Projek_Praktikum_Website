<?php
require("../../backend/auth.php");
requireRole(['admin']);
include("../../config/koneksi.php");
include("../components/sidebar_admin.php");

if (!isset($_GET['id'])) {
    echo "<script>alert('ID tidak ditemukan'); window.location='daftar_statistik_admin.php'</script>";
    exit;
}

$id = intval($_GET['id']);

// Ambil data statistik
$q = mysqli_query($koneksi, "SELECT * FROM statistik WHERE id_statistik = $id");
$data = mysqli_fetch_assoc($q);

// Ambil list pemain
$pemain = mysqli_query($koneksi, "SELECT * FROM pemain ORDER BY nama_pemain");

// Ambil list pertandingan
$pertandingan = mysqli_query($koneksi, "SELECT * FROM pertandingan ORDER BY tanggal DESC");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Edit Statistik</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="../components/sidebar.css" rel="stylesheet">
</head>

<body>
    <div class="d-flex">
        <div class="flex-grow-1 p-4 main-content">
            <h2 class="mb-4">Edit Statistik</h2>

            <div class="card shadow-sm border-0">
                <div class="card-body p-4">

                    <form action="../../backend/ubah_statistik.php" method="POST">

                        <input type="hidden" name="id_statistik" value="<?= $data['id_statistik'] ?>">

                        <label class="form-label">Pemain</label>
                        <select class="form-select" name="id_pemain" required>
                            <?php while ($p = mysqli_fetch_assoc($pemain)) { ?>
                                <option value="<?= $p['id_pemain'] ?>"
                                    <?= ($p['id_pemain'] == $data['id_pemain']) ? "selected" : "" ?>>
                                    <?= $p['nama_pemain'] ?>
                                </option>
                            <?php } ?>
                        </select>

                        <label class="form-label mt-3">Pertandingan</label>
                        <select class="form-select" name="id_pertandingan" required>
                            <?php while ($pt = mysqli_fetch_assoc($pertandingan)) { ?>
                                <option value="<?= $pt['id_pertandingan'] ?>"
                                    <?= ($pt['id_pertandingan'] == $data['id_pertandingan']) ? "selected" : "" ?>>
                                    <?= $pt['tanggal'] ?> — vs <?= $pt['lawan'] ?>
                                </option>
                            <?php } ?>
                        </select>

                        <div class="row mt-3 g-3">
                            <?php
                            $fields = ["poin", "assist", "rebound", "steal", "block", "turnover", "fga", "fgm"];
                            foreach ($fields as $f) {
                            ?>
                                <div class="col-md-3">
                                    <label class="form-label"><?= ucfirst($f) ?></label>
                                    <input type="number" name="<?= $f ?>" class="form-control"
                                        value="<?= $data[$f] ?>" required>
                                </div>
                            <?php } ?>
                        </div>

                        <hr>

                        <button class="btn btn-primary">
                            <i class="fas fa-save me-2"></i> Simpan Perubahan
                        </button>

                        <a href="daftar_statistik_admin.php" class="btn btn-secondary">Kembali</a>

                    </form>

                </div>
            </div>

        </div>
    </div>
</body>

</html>