<?php


// Database connection
$conn = mysqli_connect("localhost", "root", "", "disease_model");

// Check connection
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

// Check if the username already exists
$checkQuery = "SELECT username FROM users WHERE username = ?";
$stmt = $conn->prepare($checkQuery);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "Username already exists. Please choose another.";
    exit;
}

// Insert new user into the database
$insertQuery = "INSERT INTO users (username, password, name, email, interest, social) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($insertQuery);
$stmt->bind_param("ssssss", $username, $password, $name, $email, $interests, $social);
$success = $stmt->execute();

if ($success) {
    echo "Registration successful! You can now log in.";
    exit;
} else {
    echo "An error occurred. Please try again.";
    exit;
}

// Close connection
$stmt->close();
mysqli_close($conn);


?>