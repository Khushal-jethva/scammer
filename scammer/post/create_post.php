
<?php

 include('../common/db_conn.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
  $scammer = $_POST['scammer'];
  $message = $_POST['message'];
  $category_id = $_POST['category'];
  
  $user_id = $_SESSION['user_id'];

  $query = 'insert into post(user_id,category_id,scammer,message)values(?,?,?,?)';
  $result = $conn->prepare($query);
  $result->bind_param('iiss',$user_id,$category_id,$scammer,$message);
  $result->execute();
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signUp</title>
    <?php include("../common/commonfiles.php")?>
   
    <style>
      .col-6 offset-sm-3{
        margin: 2px;
        padding: 10px;
      }
    </style>
</head>
<body>

  <div class="container">
    <h1 style="text-align: center;">Post Your Scam</h1>
<form method="POST" action="">
<div class="col-6 offset-sm-3">
  <!-- <label for="username">UserName</label> -->
  <label for="username" class="form-label">Scammer</label>
  <input type="text" class="form-control" name="scammer" id="scammer" placeholder="phone no. , email ,etc ">
</div>

<div class="col-6 offset-sm-3">
  <label for="email" class="form-label">Message</label>
  <input type="text" class="form-control" name="message" id="message" placeholder="message">
</div>
<br>
<div class="col-6 offset-sm-3">
  <?php include('../post/category.php')?>
</div>

<div class="col-6 offset-sm-3 ">
<button type="submit" class="btn" style="background:blue ;color:white ;margin-top :10px">Submit</button>
</div>


</div>
</form>
</body>
</html>