<?php
// Database connection settings
$servername = "localhost";
$username = "root";    // Your MySQL username
$password = "root";    // Your MySQL password
$dbname = "test_db";   // The database you want to connect to

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the data from the POST request
$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';

// Check if the fields are not empty
if (!empty($name) && !empty($email)) {
    // Insert data into the users table
    $sql = "INSERT INTO users (name, email) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $name, $email);

    if ($stmt->execute()) {
        // Return a JSON response indicating success
        echo json_encode(['message' => 'User added successfully!']);
    } else {
        // Return an error message if insertion fails
        echo json_encode(['message' => 'Error: ' . $stmt->error]);
    }

    $stmt->close();
} else {
    // Return an error if any field is empty
    echo json_encode(['message' => 'Please fill in all fields.']);
}

// Close the connection
$conn->close();
?>
