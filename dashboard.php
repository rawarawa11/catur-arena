<?php
session_start();

// Mengecek apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    echo '<script>alert("Please login first."); window.location.href = "login.html";</script>';
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Catur Arena</title>
    <link rel="stylesheet" href="dashboardstyle.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">Catur Arena</div>
            <nav>
                <ul>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <div class="dashboard-container">
            <h1>Hallo, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h1>
            <p>Selamat Datang di website Catur Arena!!</p>
            <p><strong>"Jadilah Bagian dari Catur Arena – Tempat Para Juara Berkumpul!"</strong></p>
            <p>Jangan lewatkan kesempatan untuk berkompetisi melawan pemain catur terbaik! Daftar untuk turnamen sekarang dan buktikan bahwa Anda adalah yang terbaik.</p>
            <button onclick="location.href='form.html'">Registrasi</button>
        </div>
    </main>
</body>
</html>
