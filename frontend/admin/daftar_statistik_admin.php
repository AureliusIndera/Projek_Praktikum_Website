<?php
include("../../config/koneksi.php");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Statistik - Sistem Analisis Basket</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="../components/sidebar.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="d-flex">
        <?php include("../components/sidebar_admin.php"); ?>

        <!-- Main Content -->
        <div class="flex-grow-1 p-4 main-content">
            <div class="row mb-4">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h2>Daftar Statistik Pertandingan</h2>
                        <a href="../admin/tambah_statistik.php" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i> Tambah Statistik
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="tabelStatistik">
                                    <thead class="table-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Pemain</th>
                                            <th>Pertandingan</th>
                                            <th>Tanggal</th>
                                            <th>Poin</th>
                                            <th>Assist</th>
                                            <th>Rebound</th>
                                            <th>Steal</th>
                                            <th>Block</th>
                                            <th>FGA</th>
                                            <th>FGM</th>
                                            <th>Akurasi %</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody id="tableBody">
                                        <tr data-pemain="Andi Wijaya" data-pertandingan="vs Tim A">
                                            <td>1</td>
                                            <td>Andi Wijaya</td>
                                            <td>vs Tim A</td>
                                            <td>2024-01-15</td>
                                            <td><span class="badge bg-success">25</span></td>
                                            <td>8</td>
                                            <td>12</td>
                                            <td>3</td>
                                            <td>1</td>
                                            <td>22</td> <!-- FGA -->
                                            <td>10</td> <!-- FGM -->
                                            <td><span class="badge bg-info">45.5%</span></td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                                <a href="#" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>

                                        <tr data-pemain="Budi Santoso" data-pertandingan="vs Tim B">
                                            <td>2</td>
                                            <td>Budi Santoso</td>
                                            <td>vs Tim B</td>
                                            <td>2024-01-16</td>
                                            <td><span class="badge bg-success">32</span></td>
                                            <td>6</td>
                                            <td>9</td>
                                            <td>2</td>
                                            <td>2</td>
                                            <td>14</td> <!-- FGM -->
                                            <td>27</td> <!-- FGA -->
                                            <td><span class="badge bg-info">52.3%</span></td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                                <a href="#" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>

                                        <tr data-pemain="Citra Dewi" data-pertandingan="vs Tim C">
                                            <td>3</td>
                                            <td>Citra Dewi</td>
                                            <td>vs Tim C</td>
                                            <td>2024-01-17</td>
                                            <td><span class="badge bg-success">18</span></td>
                                            <td>11</td>
                                            <td>15</td>
                                            <td>4</td>
                                            <td>0</td>
                                            <td>7</td> <!-- FGM -->
                                            <td>19</td> <!-- FGA -->
                                            <td><span class="badge bg-info">38.2%</span></td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                                <a href="#" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <!-- Added table filtering JavaScript -->
    <script>
        const filterPemain = document.getElementById('filterPemain');
        const filterPertandingan = document.getElementById('filterPertandingan');
        const tableBody = document.getElementById('tableBody');
        const rows = tableBody.querySelectorAll('tr');

        function applyFilters() {
            const pemainValue = filterPemain.value.toLowerCase();
            const pertandinganValue = filterPertandingan.value.toLowerCase();

            rows.forEach((row, index) => {
                const pemain = row.getAttribute('data-pemain').toLowerCase();
                const pertandingan = row.getAttribute('data-pertandingan').toLowerCase();

                const pemainMatch = pemainValue === '' || pemain.includes(pemainValue);
                const pertandinganMatch = pertandinganValue === '' || pertandingan.includes(pertandinganValue);

                row.style.display = pemainMatch && pertandinganMatch ? '' : 'none';

                // Update nomor urut
                if (row.style.display !== 'none') {
                    row.cells[0].textContent = Array.from(rows)
                        .filter(r => r.style.display !== 'none')
                        .indexOf(row) + 1;
                }
            });
        }

        filterPemain.addEventListener('change', applyFilters);
        filterPertandingan.addEventListener('input', applyFilters);
    </script>
</body>

</html>