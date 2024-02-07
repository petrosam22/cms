<?php
include 'db.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
    $role = $_POST['role'];
    $photo = $_FILES['photo']['name']; // Get the name of the uploaded file
    $photo_tmp = $_FILES['photo']['tmp_name']; // Get the temporary file path
    $email = $_POST['email'];

    // Move the uploaded photo to a desired location
    $photo_destination = 'uploads/' . $photo;
    move_uploaded_file($photo_tmp, $photo_destination);

    $sql = "INSERT INTO `users`(`name`, `password`, `role`, `photo`, `email`) VALUES ('$name', '$password', '$role', '$photo', '$email')";
    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo "New record created successfully.";
     } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>