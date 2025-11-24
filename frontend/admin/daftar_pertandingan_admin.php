<?php
require("../../backend/auth.php");
requireRole(['admin']);
include("../../config/koneksi.php");
include("../components/sidebar_admin.php");

$result = mysqli_query($koneksi, "SELECT * FROM pertandingan ORDER BY tanggal DESC");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pertandingan</title>
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
                        <h2>Daftar Pertandingan</h2>
                        <a href="../admin/tambah_pertandingan.php" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i> Tambah Pertandingan
                        </a>
                    </div>
                </div>
            </div>

            <!-- FILTER LAWAN -->
            <div class="mb-3 d-flex align-items-center gap-2">
                <label class="fw-bold">Filter Lawan:</label>
                <select id="filterLawan" class="form-select w-auto">
                    <option value="">Semua Lawan</option>

                    <?php
                    // Ambil lawan unik
                    $lawans = [];
                    mysqli_data_seek($result, 0);

                    while ($row = mysqli_fetch_assoc($result)) {
                        $lawans[$row['lawan']] = true;
                    }

                    foreach ($lawans as $lawan => $_) {
                        echo "<option value='$lawan'>$lawan</option>";
                    }

                    mysqli_data_seek($result, 0);
                    ?>
                </select>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered table-hover table-striped text-center">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 20px;">No</th>
                                    <th style="width: 300px;">Tanggal</th>
                                    <th style="width: 500px;">Lawan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr data-lawan="<?= strtolower($row['lawan']) ?>">
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['tanggal'] ?></td>
                                        <td><?= $row['lawan'] ?></td>
                                        <td>
                                            <a href="edit_pertandingan.php?id=<?= $row['id_pertandingan'] ?>" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <a href="../../backend/hapus_pertandingan.php?id=<?= $row['id_pertandingan'] ?>"
                                                onclick="return confirm('Hapus pertandingan ini?')"
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
        const filter = document.getElementById("filterLawan");
        const rows = document.querySelectorAll("tbody tr");

        function updateNumbers() {
            let counter = 1;
            rows.forEach(row => {
                if (row.style.display !== "none") {
                    row.cells[0].textContent = counter++;
                }
            });
        }

        filter.addEventListener("change", () => {
            const value = filter.value.toLowerCase();

            rows.forEach(row => {
                const lawan = row.getAttribute("data-lawan");

                if (value === "" || lawan === value) {
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