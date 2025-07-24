<?php

// session_start();
include('./common/db_conn.php');
$message = $username =$email =$password = "";
$role_id = 1;
$status = 1;

if($_SERVER['REQUEST_METHOD']=="POST"){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];


  $query = "select * from user where email = ? and password = ?";
  $result = $conn->prepare($query);
  $result->bind_param("ss",$email,$password);
  $result->execute();
  $output = $result->get_result();
  if($output->num_rows > 0 ){
    $message = "email is already signup";
  }else {
    $query = "insert into user(name,email,password,role_id,status)values(?,?,?,?,?)";
    $result=$conn->prepare($query);
    $result->bind_param("sssii",$username,$email,$password,$role_id,$status);
    // $result->execute();
    if($result->execute()){
      session_start();
      $userid = $result->insert_id;
      $_SESSION['user_id']=$userid;
      $message = "signup successfully ";
      
      header("Refresh: 0; url=/scammer/index.php");
    }
    

  }
}


$conn->close();

?>



  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signUp</title>
    <?php include("./common/commonfiles.php")?>
   
    <style>
      .col-6 offset-sm-3{

        padding: 10px;
      }
    </style>
</head>
<body>

  <div class="container">
    <h1 style="text-align: center;">SignUp</h1>
<form method="POST" action="/signup.php">
<div class="col-6 offset-sm-3">
  <!-- <label for="username">UserName</label> -->
  <label for="username" class="form-label">UserName</label>
  <input type="text" class="form-control" name="username" id="username" placeholder="">
</div>

<div class="col-6 offset-sm-3">
  <label for="email" class="form-label">Email </label>
  <input type="text" class="form-control" name="email" id="email" placeholder="">
</div>

<div class="col-6 offset-sm-3">
  <label for="password" class="form-label">Password </label>
  <input type="password" class="form-control" name="password" id="password" >
</div>

<div class="col-6 offset-sm-3">
  <span style="color: red;"><?php echo $message;?></span>
</div>

<div class="col-6 offset-sm-3 ">
<button type="submit" class="btn" style="background:blue ;color:white ;margin-top :10px">Submit</button>
</div>


</div>
</form>
</body>
</html>