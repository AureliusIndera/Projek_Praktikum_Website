<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<nav class="sidebar bg-primary text-white p-3">
    <div class="mb-3">
        <h4 class="fw-bold">Admin Panel</h4>
        <small>Manajemen Sistem</small>
    </div>

    <hr class="bg-white">

    <ul class="nav flex-column gap-2">
        <li class="nav-item">
            <a class="nav-link <?= ($current_page == 'dashboard_admin.php') ? 'active-link' : ''; ?>"
                href="../admin/dashboard_admin.php">
                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?= ($current_page == 'daftar_pemain_admin.php') ? 'active-link' : ''; ?>"
                href="../admin/daftar_pemain_admin.php">
                <i class="fas fa-user me-2"></i> Daftar Pemain
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?= ($current_page == 'daftar_statistik_admin.php') ? 'active-link' : ''; ?>"
                href="../admin/daftar_statistik_admin.php">
                <i class="fas fa-chart-column me-2"></i> Daftar Statistik
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?= ($current_page == 'daftar_pertandingan_admin.php') ? 'active-link' : ''; ?>"
                href="../admin/daftar_pertandingan_admin.php">
                <i class="fas fa-basketball-ball me-2"></i> Daftar Pertandingan
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?= ($current_page == 'tambah_pemain.php') ? 'active-link' : ''; ?>"
                href="../admin/tambah_pemain.php">
                <i class="fas fa-user-plus me-2"></i> Tambah Pemain
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?= ($current_page == 'tambah_statistik.php') ? 'active-link' : ''; ?>"
                href="../admin/tambah_statistik.php">
                <i class="fas fa-square-plus me-2"></i> Tambah Statistik
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?= ($current_page == 'tambah_pertandingan.php') ? 'active-link' : ''; ?>"
                href="../admin/tambah_pertandingan.php">
                <i class="fas fa-calendar-plus me-2"></i> Tambah Pertandingan
            </a>
        </li>
    </ul>
    <hr>
    <a href="../../backend/logout_user.php" class="btn btn-light w-100 fw-semibold">Logout</a>
</nav>