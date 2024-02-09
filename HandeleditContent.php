<?php
include 'db.php';

// Check if the post ID is provided
if (isset($_GET['post_id'])) {
    $post_id = $_GET['post_id'];

    // Retrieve the post data from the database
    $sql = "SELECT * FROM posts WHERE id = $post_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $post = $result->fetch_assoc();
    } else {
        echo "Post not found.";
        exit();
    }

    $conn->close();
} else {
    echo "Post ID not provided.";
    exit();
}
 