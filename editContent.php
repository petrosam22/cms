
<?php  
include 'db.php';

// Check if the ID parameter is provided
if(isset($_GET['id'])) {
  $id = $_GET['id'];

  // Retrieve the post data based on the ID
  $result = $conn->query("SELECT * FROM contents WHERE id = $id");
  if ($result && $result->num_rows > 0) {
      $post = $result->fetch_assoc();
  } else {
      echo "Post not found.";
      exit;
  }
} else {
  echo "Invalid request.";
  exit;
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="display: flex !important;justify-content: space-between;width: 100% ">

<?php include 'sidebar.php';?>
<section class="vh-100 " style="background-color: #eee; width: 80%" xmlns="http://www.w3.org/1999/html">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Edit Content</p>

                                <form method="POST" action="updateContent.php?id=<?php echo $post['id']; ?>" enctype="multipart/form-data">
                                     <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="form3Example3c">Title</label>

                                            <input type="text" name="title" value="<?php echo $post['title']; ?>"  id="form3Example3c" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="form3Example4c">description</label>

                                            <textarea  name="description" id="form3Example4c" class="form-control">
                                             <?php echo $post['description']; ?>

                                            </textarea>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="form3Example4cd">photo</label>

                                            <input type="file" id="form3Example4cd" name="photo" class="form-control" />
                                        </div>
                                    </div>

                                    <!-- <input type="hidden" id="form3Example4cd" name="user_id" value="<?php echo $user['id']?>" class="form-control" /> -->



                                    <button type="submit" name="submit" value="submit" class="btn btn-primary btn-lg">Register</button>




                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>