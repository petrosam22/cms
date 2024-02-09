<?php
include 'db.php';
 

$result = $conn->query("SELECT * FROM users");
$users = $result->fetch_all(MYSQLI_ASSOC);

 
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body style="display: flex !important;">
 
<?php include 'sidebar.php';?>


<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Photo</th>
       <th scope="col">edit</th>
      <th scope="col">delete</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($users as $user): ?>
    <tr>
      <th>
        <?php echo $user['name'] ?>
      
      </th>
      <td>
      <?php echo $user['email'] ?>

      </td>
      <td>
        <img src="uploads/<?php echo $user['photo']; ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
      </td>
     

      <td><button type="button" class="btn btn-primary">
    <a class="text-white text-decoration-none" href="editUserForm.php?id=<?php echo $user['id']; ?>">Edit</a>
</button>

      </td>

      <td>

      <?php if( ! $user['id'] == $_SESSION['user']['id']):   ?>
      <button type="button" class="btn btn-primary">
    <a class="text-white text-decoration-none" href="deleteUser.php?id=<?php echo $user['id']?>" >Delete</a>
</button>
<?php endif; ?>


      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</body>
</html>