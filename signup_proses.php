<?php
include 'conect.php';  // Pastikan file koneksi database sudah benar

// Validasi jika form di-submit menggunakan POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Cek apakah semua field sudah diisi
    if (empty($name) || empty($email) || empty($password)) {
        echo '<script>alert("Please fill in all fields!"); window.history.back();</script>';
        exit;
    }

    // Cek apakah email sudah terdaftar
    $sql_check = "SELECT * FROM users WHERE email = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param('s', $email);
    $stmt_check->execute();
    $result = $stmt_check->get_result();

    if ($result->num_rows > 0) {
        echo '<script>alert("This email is already registered. Please use another email."); window.history.back();</script>';
        $stmt_check->close();
        exit;
    }

    // Hash password untuk keamanan
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Insert data ke dalam tabel users
    $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind parameters dan eksekusi query
        $stmt->bind_param('sss', $name, $email, $hashedPassword);

        if ($stmt->execute()) {
            echo '<script>alert("Sign up successful!"); window.location.href = "login.html";</script>';
        } else {
            echo '<script>alert("Error: Unable to sign up. Please try again."); window.history.back();</script>';
        }

        $stmt->close();
    } else {
        echo '<script>alert("Database error. Please try again later."); window.history.back();</script>';
    }
}

// Tutup koneksi
$conn->close();
?>
