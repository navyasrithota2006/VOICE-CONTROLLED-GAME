<?php
$servername = "localhost";
$username = "root";
$password = "NAVyas@123";  // Use "" if no password is set, or replace it with the correct password if there is one
$dbname = "user_database"; 
$port=3307; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
