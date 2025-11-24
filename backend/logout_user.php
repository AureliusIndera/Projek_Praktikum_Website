<?php
session_start();
session_unset(); // hapus semua variabel session
session_destroy(); // hancurkan session

echo "<script>
    alert('Logout Berhasil!');
    window.location.href = '../frontend/login.php';
</script>";
?>
