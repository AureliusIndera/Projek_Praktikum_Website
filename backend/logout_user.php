<?php
session_start();
session_abort();
echo "<script>alert('Logout Berhasil!');window.locate.href='../frontend/login.php";
?>