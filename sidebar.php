<!--Main Navigation-->
<?php include 'db.php'; ?>
<?php
session_start();

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    // Avoid displaying the password for security reasons
} else {
    session_destroy();

    // Set the $user variable with a default value
    $user = '';

    // Check if the user is logged in
    if (isset($_SESSION['username'])) {
        // User is logged in, retrieve the username
        $user = $_SESSION['username'];
    }
}
?>

<!-- Rest of the code -->

<!-- Rest of the code -->
<header>
    <!-- Sidebar -->
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
        <div class="position-sticky">

            <div class="list-group list-group-flush mx-3 mt-4">.

                <?php if(!$user): ;?>
                <a href="login.php" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Login</span>
                </a>
                <a href="register.php" class="list-group-item list-group-item-action py-2 ripple">
                <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Register</span>
            </a>
                <?php elseif($user['role'] == 'admin'):?>
                     <a href="adminContent.php" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-chart-area fa-fw me-3"></i><span>Admin Content</span>
                </a>
                <a href="logout.php" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-chart-area fa-fw me-3"></i><span>logout</span>
                </a>

                <a href="createContent.php" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-chart-area fa-fw me-3"></i><span>Create New Content</span>
                </a>
                <a href="profile.php" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-chart-area fa-fw me-3"></i><span>Profile</span>
                </a>
                <a href="Users.php" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Users</span>
                </a>


                <?php else:?>
                    <a href="contents.php" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-chart-area fa-fw me-3"></i><span>Content</span>
                </a>
                <a href="logout.php" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-chart-area fa-fw me-3"></i><span>logout</span>
                </a>

                <a href="createContent.php" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-chart-area fa-fw me-3"></i><span>Create New Content</span>
                </a>
                <a href="profile.php" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-chart-area fa-fw me-3"></i><span>Profile</span>
                </a>
 


                <a href="Users.php" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-tachometer-alt fa-fw me-3"></i>
                    <span>
                        <?php echo $user['name'] ?>
                    </span>
                </a>
                <?php endif;?>
        
 
                

                
                 

              
            </div>
        </div>
    </nav>
    <!-- Sidebar -->

    <!-- Navbar -->
    <!-- Navbar -->
</header>
<!--Main Navigation-->

<!--Main layout-->
<main style="margin-top: 58px;">
    <div class="container pt-4"></div>
</main>
<!--Main layout-->