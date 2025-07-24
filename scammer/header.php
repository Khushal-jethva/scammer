
<head>
<style>.dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .profile-icon {
            font-size: 24px;
            cursor: pointer;
        }
    </style>  



<?php
include('./common/db_conn.php');
include("./common/commonfiles.php")?></head>
<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand">ScamCheck</a>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">

      <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./index.php">Home</a>
        </li>

        <?php if(isset($_SESSION['user_id'])){?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./post/create_post.php">Post your scam</a>
        </li>
        <?php }?>

        <?php if(!isset($_SESSION['user_id'])){?> 
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./signup.php">SignUp</a>
        </li>
        <?php }?>
        <li class="nav-item">
          <a class="nav-link" href="./login.php">Login</a>
        </li>

        <?php  if(isset($_SESSION['user_id'])){ $user_id = $_SESSION['user_id'];
$sql = "select name from user where id = $user_id";
$result = $conn->query($sql);
$row =$result->fetch_assoc();
$profile= $row['name'];?> 
        <!-- <li class="nav-item"> -->
        <div class="dropdown">
          <a class="nav-link" href="./user/profile.php"><i class="fas fa-sign-in-alt" ><img height="30px"  src="./common/login-avatar.png" ></i>Admin</a>
          <div class="dropdown-content">
          <img height="50px" src="./common/user.png" alt="">
          <h3 style="color: black;"><?php echo "<h4>" .$profile."</h4>"?></h3>
          <a href="#">Profile</a>
          <a href='./user/myposts.php'>mypost</a>
            <a href="./chnage_password.php">Change Password</a>
            <a href="./logout.php">Logout</a>
            </div>
            </div>
          
          
          
          
          
        <?php }?>
        
        <!-- <?php if(isset($_SESSION['user_id'])){?> 
        <li class="nav-item">
          <a class="nav-link" href="./logout.php">Logout</a>
        </li>
        <?php }?> -->

        </ul>
    </div>
  </div>
</nav>
<?php
;
?>


    
   
    
    
  </div>
</nav>