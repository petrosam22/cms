<?php
include 'db.php';

// Check if the ID parameter is provided
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Check if the post exists
    $result = $conn->query("SELECT * FROM users WHERE id = $id");
    if ($result && $result->num_rows > 0) {
        // Delete the post from the database
        $deleteQuery = "DELETE FROM users  WHERE id = $id";
        if ($conn->query($deleteQuery) === TRUE) {
            echo "User deleted successfully.";
        } else {
            echo "Error deleting post: " . $conn->error;
        }
    } else {
        echo "User not found.";
    }
} else {
    echo "Invalid request.";
    exit;
}
?>