<?php

$servername ="localhost";
$database ="uinsi_2441919054";
$username ="root";
$password = "";

//buat koneksi database
$conn = mysqli_connect($servername,$database,$password,$database);

//cek koneksi

if (!$conn) {
    die("koneksi gagal".mysqli_connect_error());
}

echo "koneksi berhasil!";
?>