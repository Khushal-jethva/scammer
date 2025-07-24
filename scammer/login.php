<?php
// session_start();
include("./common/db_conn.php");
$message=$email="";
if($_SERVER["REQUEST_METHOD"]== 'POST'){
  $email= $_POST["email"];
  $password=$_POST["password"];

  $query = "select * from user where email = ? and password = ? ";
  $result = $conn->prepare($query);
  $result->bind_param("ss",$email,$password);
  $result->execute();
  $output = $result->get_result();

  if($output->num_rows > 0 ){
    session_start();
    $user = $output->fetch_assoc();
    $userid = $user['id'];
    
    
    $_SESSION["user_id"]= $user['id'];
    $userRole=$user['role_id'];
    if($userRole==2){
      // header("Location :./admin/main.php");
      // include('./admin/main.php');
      header("Refresh: 0; url=/scammer/admin/main.php");
    }
    else{
    header("Location: /scammer/index.php");}
  }else {
    $message = "username or password are not correct ";
  }
  
  
}



?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <?php include("./common/commonfiles.php")?>
    <style>
      .col-6 offset-sm-3{
        
        padding: 10px;
      }
    </style>
</head>
<body>


  <div class="container">
    <h1 style="text-align: center;">Login</h1>
    <form action="" method="POST">

    
<div class="col-6 offset-sm-3">
  <label for="username" class="form-label">Email</label>
  <input type="text" name="email"  class="form-control" id="email" placeholder="">
</div>


<div class="col-6 offset-sm-3">
  <label for="password" class="form-label">Password </label>
  <input type="password" name="password" class="form-control" id="password" placeholder="">
</div>

<div class="col-6 offset-sm-3">
<span style="color: red;"><?php echo $message ?></span>
</div>

<div class="col-6 offset-sm-3 " >
<button type="submit" class="btn" style="background:blue ;color:white;margin-top :10px ">Submit</button>
</div>
</form>
</div>
</body>
</html>