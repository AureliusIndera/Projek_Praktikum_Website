<?php
include("../../config/koneksi.php");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pemain - Sistem Analisis Basket</title>
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
                        <h2>Daftar Pemain</h2>
                        <a href="../admin/tambah_pemain.php" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>  Tambah Pemain
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead class="table-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pemain</th>
                                            <th>Posisi</th>
                                            <th>Tinggi (cm)</th>
                                            <th>Berat (kg)</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Nomor Punggung</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Andi Wijaya</td>
                                            <td>Point Guard</td>
                                            <td>180</td>
                                            <td>75</td>
                                            <td>1998-05-15</td>
                                            <td>23</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Yakin ingin menghapus?')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Budi Santoso</td>
                                            <td>Shooting Guard</td>
                                            <td>185</td>
                                            <td>78</td>
                                            <td>1999-03-20</td>
                                            <td>24</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Yakin ingin menghapus?')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Citra Dewi</td>
                                            <td>Small Forward</td>
                                            <td>172</td>
                                            <td>65</td>
                                            <td>2000-07-10</td>
                                            <td>25</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-warning" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="#" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Yakin ingin menghapus?')">
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
</body>

</html>