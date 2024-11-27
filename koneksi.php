<?php
// koneksi.php

$host = 'localhost';  // Host
$user = 'root';       // Username
$password = '';       // Password
$dbname = 'lomba_catur'; // Nama database

// Koneksi ke MySQL
$conn = mysqli_connect($host, $user, $password, $dbname);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
