<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "user_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        die("Passwords do not match. Please try again.");
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert into register_detail table
    $sql = "INSERT INTO register_detail (email, password) VALUES ('$email', '$hashed_password')";
    if ($conn->query($sql) === TRUE) {
        header("Location: second.html"); // Redirect back to login page
        exit;
    } else {
        die("Error inserting data: " . $conn->error);
    }
}

$conn->close();
?>
