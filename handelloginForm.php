<?php
session_start(); // Start the session

include 'db.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];
        $name = $row['name'];
        $_SESSION['name'] = $name; // Set user's name in the session

        if (password_verify($password, $hashedPassword)) {
            // Login successful
            // Perform any additional actions after successful login
            header('Location: login.php'); // Redirect to dashboard or any other page
            exit();
        } else {
            echo "Invalid email or password.";
        }
    } else {
        echo "Invalid email or password.";
    }

    $conn->close();
}
?>
