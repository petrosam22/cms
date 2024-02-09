<?php
include 'db.php';

// Check if the ID parameter is provided
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve the post data based on the ID
    $result = $conn->query("SELECT * FROM users WHERE id = $id");
    if ($result && $result->num_rows > 0) {
        $users = $result->fetch_assoc();
    } else {
        echo "users not found.";
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}

// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Retrieve the form data
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Check if a new photo is uploaded
    if(isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $photo = $_FILES['photo'];
        $photoName = $photo['name'];
        $photoTmpName = $photo['tmp_name'];

        // Move the uploaded photo to a desired directory
        move_uploaded_file($photoTmpName, "uploads/$photoName");

        // Update the photo in the database
        $updateQuery = "UPDATE users SET name = '$name', email = '$email', photo = '$photoName' WHERE id = $id";
    } else {
        // Update the post in the database without changing the photo
        $updateQuery = "UPDATE users SET name = '$name', email = '$email' WHERE id = $id";
    }

    if ($conn->query($updateQuery) === TRUE) {
        echo "user updated successfully.";
        // Redirect to the view page or any other page after successful update
        // header("Location: view.php?id=$id");
        // exit;
    } else {
        echo "Error updating post: " . $conn->error;
    }
}
?>