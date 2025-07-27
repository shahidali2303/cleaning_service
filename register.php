<?php
// Connect to DB
$conn = new mysqli("localhost", "root", "", "cleaning-service");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form inputs
$email = $_POST['reg_email'];
$password = $_POST['reg_password'];

// Check if email already exists
$check = $conn->prepare("SELECT id FROM user_admin WHERE email = ?");
$check->bind_param("s", $email);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    echo "❌ Email already registered.";
} else {
    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert new user
    $stmt = $conn->prepare("INSERT INTO user_admin (email, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $hashed_password);

    if ($stmt->execute()) {
        echo "✅ Registration successful. <a href='index.html'>Login here</a>";
    } else {
        echo "❌ Error: " . $stmt->error;
    }
}

$conn->close();
?>
