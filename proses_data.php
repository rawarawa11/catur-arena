<?php
// Koneksi database
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $tanggal_lahir = $_POST['tanggal-lahir'];
    $jenis_kelamin = $_POST['jenis-kelamin'];
    $kategori_lomba = $_POST['kategori-lomba'];
    $metode_pembayaran = $_POST['metode-pembayaran'];
    $status = $_POST['status'];
    $pesan = $_POST['pesan'];

    // Gunakan prepared statements untuk menghindari SQL Injection
    $stmt = $conn->prepare("INSERT INTO pendaftaran (nama, email, telepon, tanggal_lahir, jenis_kelamin, kategori_lomba, metode_pembayaran, status, pesan) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $nama, $email, $telepon, $tanggal_lahir, $jenis_kelamin, $kategori_lomba, $metode_pembayaran, $status, $pesan);

    if ($stmt->execute()) {
        echo "
        <!DOCTYPE html>
        <html>
        <head>
            <title>Pendaftaran Berhasil</title>
            <link rel='stylesheet' href='proses_data.css'>
        </head>
        <body>
            <div class='container'>
                <div class='success'>
                    <h1>Pendaftaran Berhasil!</h1>
                    <p>Terima kasih! Pendaftaran Anda telah berhasil disimpan.</p>
                    <p>Anda dapat kembali ke halaman utama</p> 
                    <button onclick='location.href=\"index.html\"'>Kembali</button>
                </div>
            </div>
        </body>
        </html>
        ";
    } else {
        echo "
        <!DOCTYPE html>
        <html>
        <head>
            <title>Terjadi Kesalahan</title>
            <link rel='stylesheet' href='proses_data.css'>
        </head>
        <body>
            <div class='container'>
                <div class='error'>
                    <h1>Terjadi Kesalahan</h1>
                    <p>Maaf, terjadi kesalahan saat menyimpan data. Silakan coba lagi. Error: " . $stmt->error . "</p>
                    <a href='index.html'>Kembali ke Halaman Utama</a>
                </div>
            </div>
        </body>
        </html>
        ";
    }

    // Tutup koneksi
    $stmt->close();
    mysqli_close($conn);
}
?>
