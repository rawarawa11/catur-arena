<?php
// Database connection details
$host = 'localhost'; // Ganti dengan host database Anda
$username = 'root'; // Ganti dengan username database Anda
$password = ''; // Ganti dengan password database Anda
$database = 'lomba_catur';

// Connect to the database
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die('Database connection failed: ' . $conn->connect_error);
}

// Get form data
$email = $_POST['email'];
$password = $_POST['password'];

// Query to fetch user data
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verify the hashed password
        if (password_verify($password, $user['password'])) {
            // Start a session and store user information
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];

            echo '<script>alert("Login successful!"); window.location.href = "dashboard.php";</script>';
        } else {
            echo '<script>alert("Invalid password. Please try again."); window.history.back();</script>';
        }
    } else {
        echo '<script>alert("No account found with that email. Please sign up."); window.history.back();</script>';
    }

    $stmt->close();
} else {
    echo '<script>alert("Database error. Please try again later."); window.history.back();</script>';
}

// Close the database connection
$conn->close();
?>
