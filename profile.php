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




<section style="background-color: #eee ;   width: 80%;">
  <div class="container py-5">
    <div class="row">
     </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
 

<img src="uploads/<?php echo $_SESSION['user']['photo']; ?>" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">



            <h5 class="my-3">
</h5>    
<?php
   echo $_SESSION['user']['name']
  ?>
  </h5>
             <div class="d-flex justify-content-center mb-2">
             </div>
          </div>
        </div>
       </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $_SESSION['user']['name']?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $_SESSION['user']['email']?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Role</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $_SESSION['user']['role']?></p>
              </div>
            </div>
            </div>
        </div>
        <div class="row">
         </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>