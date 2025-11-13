<?php 
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'project_basket';
    $port = '3306';

    $koneksi = new mysqli($host, $username, $password, $db, $port);

    if($koneksi->connect_error){
        die("Maaf Koneksi Gagal : " .$koneksi->connect_error);
    }
?>