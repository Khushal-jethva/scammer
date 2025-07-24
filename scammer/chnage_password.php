
<?php 
include('./common/db_conn.php');
session_start();
$message='';
$user_id = $_SESSION['user_id'];
if($_SERVER['REQUEST_METHOD']=='POST'){
    $current_password = $_POST['current_name'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    $sql = "select * from user where id = $user_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $old_password = $row['password'];
    

    
        if($current_password ==null && $new_password ==null && $confirm_password == null){
            $message = "All field is required";
        }else{
            if($old_password == $current_password){
                if($new_password == $confirm_password){
                    $query = "update user set password = $new_password where id = $user_id ";
                    $output = $conn->query($query);
                    if($output){
                        include('./logout.php');
                    }
                    
                    header("Location: /scammer/index.php");

                }else{
                    $message = "new password and confirm password not match ";
                }
            }else {
                $message = "current password is not correct ";
            }
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
    <h1 style="text-align: center;">Change Password</h1>
    <form action="" method="POST">

    
<div class="col-6 offset-sm-3">
  <label for="" class="form-label">Current Password</label>
  <input type="text" name="current_name"  class="form-control" id="current_name" placeholder="">
</div>


<div class="col-6 offset-sm-3">
  <label for="password" class="form-label">New Password</label>
  <input type="password" name="new_password" class="form-control" id="new_password" placeholder="">
</div>

<div class="col-6 offset-sm-3">
  <label for="password" class="form-label">Confirm Password</label>
  <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="">
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