<?php
session_start();

function requireRole($allowedRoles = [])
{
    if (!isset($_SESSION['role'])) {
        header('Location: ../login.php');
        exit;
    }

    $userRole = $_SESSION['role'];

    if (!is_array($allowedRoles)) {
        $allowedRoles = [$allowedRoles];
    }

    // Cek apakah role user ada dalam role yg diizinkan
    if (!in_array($userRole, $allowedRoles)) {
        echo "Akses ditolak!";
        exit;
    }
}
?>
