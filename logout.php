<?php
session_start();

// Menghancurkan semua sesi untuk logout
session_unset(); // Menghapus semua variabel sesi
session_destroy(); // Menghancurkan sesi

// Mengarahkan pengguna kembali ke halaman login
header("Location: index.html");
exit;
?>
