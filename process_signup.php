<?php
include 'database.php';  // Include the database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];   // Fetch the submitted username
    $email = $_POST['email'];         // Fetch the submitted email
    $password = $_POST['password'];   // Fetch the submitted password

    // Hash the password before storing it
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and bind the SQL statement to avoid SQL injection
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashedPassword);

    // Execute the query and check if it was successful
    if ($stmt->execute()) {
        header("Location: index.php?log=true");
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
