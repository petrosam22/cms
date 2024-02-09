<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


<?php
include 'db.php';
 include 'sidebar.php';

if ($user['role'] == 'admin') {
    // User is admin, retrieve all posts
    $result = $conn->query("SELECT * FROM contents");
} else {
    // User is not admin, return an error message
    return 'You are not authorized to view this page.';
}

if (!$result) {
    die('Error: ' . $conn->error);
}

// Fetch all posts as an associative array
$posts = $result->fetch_all(MYSQLI_ASSOC);

// Retrieve user information for each post
 
?>

 

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>register</title>


</head>
<body style="display: flex !important;">
 


<table class="table">
  <thead>
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Photo</th>
      <th scope="col">User</th>
      <th scope="col">edit</th>
      <th scope="col">delete</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($posts as $post): ?>
    <tr>
        <th>
            <?php echo $post['title'] ?>
        </th>
        <td>
            <?php echo $post['description'] ?>
        </td>
        <td>
            <img src="uploads/<?php echo $post['photo']; ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
        </td>
        <td>
            <?php
            $user_id = $post['user_id'];
            $user_result = $conn->query("SELECT name FROM users WHERE id = $user_id");
            if ($user_result) {
                $user = $user_result->fetch_assoc();
                echo $user['name'];
            } else {
                echo 'Unknown';
            }
            ?>
         <td>
            <!-- Delete button code -->
 

<button type="button" class="btn btn-primary">
    <a class="text-white text-decoration-none" href="editContent.php?id=<?php echo $post['id']; ?>">edit</a>
</button>
      </td>

      <td>
      <button type="button" class="btn btn-primary">
    <a class="text-white text-decoration-none" href="deleteContent.php?id=<?php echo $post['id']; ?>">Delete</a>
</button>


      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</body>
</html>