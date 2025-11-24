<?php
require("../../backend/auth.php");
requireRole(['admin']);
include("../../config/koneksi.php");
include("../components/sidebar_admin.php");
$query =  "SELECT DISTINCT posisi FROM pemain ORDER BY posisi ASC";
$posisiQuery = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pemain</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="../components/sidebar.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="d-flex">
        <div class="flex-grow-1 p-4 main-content">
            <div class="mb-4">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h2>Daftar Pemain</h2>
                        <a href="../admin/tambah_pemain.php" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i> Tambah Pemain
                        </a>
                    </div>
                </div>
            </div>
            <div class="mb-3 d-flex align-items-center gap-2">
                <label class="fw-bold">Filter Posisi:</label>
                <select id="filterPosisi" class="form-select w-auto">
                    <option value="">Semua Posisi</option>
                    <?php while ($pos = mysqli_fetch_assoc($posisiQuery)) { ?>
                        <option value="<?= strtolower($pos['posisi']) ?>">
                            <?= $pos['posisi'] ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped text-center ">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 30px;">No</th>
                                    <th style="width: 200px;">Nama Pemain</th>
                                    <th style="width: 150px;">Posisi</th>
                                    <th style="width: 150px;">Tinggi (cm)</th>
                                    <th style="width: 150px;">Berat (kg)</th>
                                    <th style="width: 200px;">Tanggal Lahir</th>
                                    <th style="width: 150px;">No Punggung</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="playerTable">
                                <?php
                                $no = 1;
                                $query = mysqli_query($koneksi, "SELECT * FROM pemain ORDER BY nama_pemain ASC");
                                while ($row = mysqli_fetch_assoc($query)) { ?>
                                    <tr data-posisi="<?= strtolower($row['posisi']) ?>">
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['nama_pemain'] ?></td>
                                        <td><?= $row['posisi'] ?></td>
                                        <td><?= $row['tinggi_cm'] ?></td>
                                        <td><?= $row['berat_kg'] ?></td>
                                        <td><?= $row['tanggal_lahir'] ?></td>
                                        <td><?= $row['nomor_punggung'] ?></td>
                                        <td>
                                            <a href="edit_pemain.php?id=<?= $row['id_pemain'] ?>"
                                                class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="../../backend/hapus_pemain.php?id=<?= $row['id_pemain'] ?>"
                                                onclick="return confirm('Yakin ingin menghapus pemain ini?')"
                                                class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const filter = document.getElementById("filterPosisi");
        const rows = document.querySelectorAll("tbody tr");
        function updateNumbers() {
            let n = 1;
            rows.forEach(r => {
                if (r.style.display !== "none") {
                    r.cells[0].textContent = n++;
                }
            });
        }
        filter.addEventListener("change", () => {
            const val = filter.value;
            rows.forEach(row => {
                const posisi = row.getAttribute("data-posisi");
                if (val === "" || posisi === val) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
            updateNumbers();
        });
        updateNumbers();
    </script>
</body>
</html>