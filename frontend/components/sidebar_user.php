<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<nav class="sidebar bg-primary text-white p-3">
    <div class="mb-3">
        <h4 class="fw-bold">User Panel</h4>
        <small>Manajemen Sistem</small>
    </div>

    <hr class="bg-white">

    <ul class="nav flex-column gap-2">
        <li class="nav-item">
            <a class="nav-link <?= ($current_page == 'dashboard_user.php') ? 'active-link' : '' ?>"
                href="../user/dashboard_user.php">
                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?= ($current_page == 'daftar_pemain_user.php') ? 'active-link' : '' ?>"
                href="../user/daftar_pemain_user.php">
                <i class="fas fa-user me-2"></i> Daftar Pemain
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?= ($current_page == 'daftar_statistik_user.php') ? 'active-link' : '' ?>"
                href="../user/daftar_statistik_user.php">
                <i class="fas fa-chart-column me-2"></i> Daftar Statistik
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?= ($current_page == 'daftar_pertandingan_user.php') ? 'active-link' : ''; ?>"
                href="../user/daftar_pertandingan_user.php">
                <i class="fas fa-basketball-ball me-2"></i> Daftar Pertandingan
            </a>
        </li>
    </ul>

    <hr>

    <a href="../../backend/logout_user.php" class="btn btn-light w-100 fw-semibold">Logout</a>
</nav>