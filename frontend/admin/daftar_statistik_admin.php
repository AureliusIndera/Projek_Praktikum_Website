<?php
require("../../backend/auth.php");
requireRole(['admin']);
include("../../config/koneksi.php");
include("../components/sidebar_admin.php");

$query = "
    SELECT s.id_statistik, p.nama_pemain AS nama_pemain, pt.tanggal, pt.lawan, s.poin, 
    s.assist, s.rebound, s.steal, s.block, s.turnover, s.fga, s.fgm
    FROM statistik AS s
    JOIN pemain AS p ON s.id_pemain = p.id_pemain
    JOIN pertandingan AS pt ON s.id_pertandingan = pt.id_pertandingan
    ORDER BY pt.tanggal DESC";
$result = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Statistik Pertandingan</title>
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
                        <h2>Daftar Statistik Pertandingan</h2>
                        <a href="../admin/tambah_statistik.php" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i> Tambah Statistik
                        </a>
                    </div>
                </div>
            </div>
            <div class="mb-3 d-flex align-items-center gap-2">
                <label class="fw-bold">Filter Pemain:</label>
                <select id="filterPemain" class="form-select w-auto">
                    <option value="">Semua Pemain</option>
                    <?php
                    $players = [];
                    mysqli_data_seek($result, 0);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $players[$row['nama_pemain']] = true;
                    }
                    foreach ($players as $pemain => $_) {
                        echo "<option value='$pemain'>$pemain</option>";
                    }
                    mysqli_data_seek($result, 0);
                    ?>
                </select>
            </div>
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-striped text-center">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 30px;">No</th>
                                    <th style="width: 200px;">Nama Pemain</th>
                                    <th style="width: 100px;">Lawan</th>
                                    <th style="width: 120px;">Tanggal</th>
                                    <th style="width: 70px;">Poin</th>
                                    <th style="width: 70px;">Assist</th>
                                    <th style="width: 70px;">Rebound</th>
                                    <th style="width: 70px;">Steal</th>
                                    <th style="width: 70px;">Block</th>
                                    <th style="width: 70px;">Turnover</th>
                                    <th style="width: 70px;">FGA</th>
                                    <th style="width: 70px;">FGM</th>
                                    <th style="width: 70px;">Akurasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $akurasi = ($row['fga'] > 0)
                                        ? number_format(($row['fgm'] / $row['fga']) * 100, 1)
                                        : 0;
                                ?>
                                    <tr data-pemain="<?= strtolower($row['nama_pemain']) ?>">
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['nama_pemain'] ?></td>
                                        <td><?= $row['lawan'] ?></td>
                                        <td><?= $row['tanggal'] ?></td>
                                        <td><span class="badge bg-success"><?= $row['poin'] ?></span></td>
                                        <td><?= $row['assist'] ?></td>
                                        <td><?= $row['rebound'] ?></td>
                                        <td><?= $row['steal'] ?></td>
                                        <td><?= $row['block'] ?></td>
                                        <td><?= $row['turnover'] ?></td>
                                        <td><?= $row['fga'] ?></td>
                                        <td><?= $row['fgm'] ?></td>
                                        <td><span class="badge bg-primary"><?= $akurasi ?>%</span></td>
                                        <td>
                                            <a href="edit_statistik.php?id=<?= $row['id_statistik'] ?>"
                                                class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="../../backend/hapus_statistik.php?id=<?= $row['id_statistik'] ?>"
                                                onclick="return confirm('Yakin ingin menghapus data ini?')"
                                                class="btn btn-danger btn-sm">
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
        const filter = document.getElementById("filterPemain");
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
            const val = filter.value.toLowerCase();
            rows.forEach(row => {
                const pemain = row.getAttribute("data-pemain");
                if (val === "" || pemain === val) {
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
