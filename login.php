<?php
// Always place this block at the very top of the file with no space before <?php

// Connect to DB
$conn = new mysqli("localhost", "root", "", "cleaning-service");
if ($conn->connect_error) {
    die("DB connection failed: " . $conn->connect_error);
}

// Get form inputs
$email = $_POST['form_email'];
$password = $_POST['form_password'];

// Fetch user by email only
$sql = "SELECT * FROM user_admin WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // Verify password hash
    if (password_verify($password, $user['password'])) {
        // ✅ Set cookie before any output
        setcookie("user_email", $user['email'], time() + (86400), "/"); // 1 day

        // ✅ Redirect immediately
        header("Location: dashboard.php");
        exit();
    } else {
        // ❌ Do not echo anything if using setcookie()
        header("Location: login.php?error=wrongpass");
        exit();
    }
} else {
    header("Location: login.php?error=usernotfound");
    exit();
}

$conn->close();
?>
