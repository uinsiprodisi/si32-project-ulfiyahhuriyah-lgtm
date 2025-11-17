<?php
require_once 'config/koneksi.php';

$username ="admin";
$email = "admin@admin.com";
$password = password_hash("23456", PASSWORD_DEFAULT);
$nama_lengkap = "administrator website";

$query = "
            INSERT INTO users (username, email, password, nama_lengkap)
            VALUES ('$username', '$email', '$password', '$nama_lengkap')
        ";

if(mysqli_query($conn, $query)){
    echo "akun berhasilterbuat!";
} else{
    echo "gagal membuat akun: ". mysqli_error($conn);
}

?>