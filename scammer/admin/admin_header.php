<?php 
include('../common/db_conn.php');
session_start();
$user_id = $_SESSION['user_id'];
$sql = "select name from user where id = $user_id";
$result = $conn->query($sql);
$row =$result->fetch_assoc();
$profile= $row['name'];


?>
<style>
.dropdown {
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

<!-- header.php -->

<header>
    <div id="header-container">
    
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
        <a class="navbar-brand">ScamCheck</a>
        
        <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> -->
        <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" style="color:black;" href="./main.php">Home</a></li>


        <div class="dropdown">
        <li class="nav-item"><a class="nav-link" style="color:black;" href="about.php"><i class="fas fa-sign-in-alt" ><img height="30px"  src="../common/login-avatar.png" alt=""></i><?php echo $profile?></a></li>
        <div class="dropdown-content">
            <img height="50px" src="../common/user.png" alt="">
            <h2 style="color: black;"><?php echo $profile?></h2>
            <a href="#">Profile</a>
            <a href="../chnage_password.php">Change Password</a>
            <a href="../logout.php">Logout</a> <!-- Link to your logout page -->
        </div>
    </div>

        <li class="nav-item"><a class="nav-link" style="color:black;" href="services.php">Services</a></li>
        <li class="nav-item"><a class="nav-link" style="color:black;" href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </div>
</header>
