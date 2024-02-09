<?php 

include 'db.php';



if(isset($_POST['submit'])){
$title = $_POST['title'];
$description = $_POST['description'];
$photo = $_FILES['photo']['name']; // Get the name of the uploaded file
$photo_tmp = $_FILES['photo']['tmp_name']; // Get the temporary file path
$user_id = $_POST['user_id'];

$photo_destination = 'uploads/' . $photo;

move_uploaded_file($photo_tmp, $photo_destination);
$sql = "INSERT INTO `contents`(`title`, `description`, `photo`, `user_id`) VALUES ('$title', '$description', '$photo', '$user_id')";
$result = $conn->query($sql);

if ($result == TRUE) {
    echo "New record created successfully.";
 } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


}