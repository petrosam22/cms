<?php
include 'db.php';

// Check if the ID parameter is provided
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Check if the post exists
    $result = $conn->query("SELECT * FROM contents WHERE id = $id");
    if ($result && $result->num_rows > 0) {
        // Delete the post from the database
        $deleteQuery = "DELETE FROM contents WHERE id = $id";
        if ($conn->query($deleteQuery) === TRUE) {
            echo "Post deleted successfully.";
        } else {
            echo "Error deleting post: " . $conn->error;
        }
    } else {
        echo "Post not found.";
    }
} else {
    echo "Invalid request.";
    exit;
}
?>