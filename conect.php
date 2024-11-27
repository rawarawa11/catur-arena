<?php
// Konfigurasi koneksi database
$host = "localhost";  // Nama host atau IP server database
$username = "root";   // Username MySQL Anda
$password = "";       // Password MySQL Anda
$database = "lomba_catur";  // Nama database Anda

// Koneksi ke database
$conn = new mysqli($host, $username, $password, $database);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
