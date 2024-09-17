<?php
include 'database.php';  // Include the database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];         // Fetch the submitted email
    $password = $_POST['password'];   // Fetch the submitted password

    // Prepare and bind the SQL statement to avoid SQL injection
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch the user data from the database
        $user = $result->fetch_assoc();

        // para login 
        session_start();
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        // Verify the password against the hashed password stored in the database
        if (password_verify($password, $user['password'])) {
            // echo "Login successful!";
            // Redirect the user to a dashboard page here
            header("Location: dashboard.php");
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with this email.";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
