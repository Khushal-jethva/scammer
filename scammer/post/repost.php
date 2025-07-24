<?php
include('./common/db_conn.php');

$message="";
$status = 0;
if($_SERVER['REQUEST_METHOD']=='POST'){
    $message = $_POST['message'];
    $user_id = $_SESSION['user_id'];

    if(isset($_GET['p_id'])){
        $post_id = $_GET['p_id'];
    }
    $query = "insert into repost (post_id,user_id,message,status)values(?,?,?,?)";
    $result = $conn->prepare($query);
    $result->bind_param('iisi',$post_id,$user_id,$message,$status);
    $result->execute();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
<h1 style="text-align: center;">Repost </h1>
    <form action="" method="POST">

    <div class="col-6 offset-sm-3">
  <label for="" class="form-label">Message</label>
  <input type="text" class="form-control" name="message" id="message" placeholder="message">
</div>

<div class="col-6 offset-sm-3 ">
<button type="submit" class="btn" style="background:blue ;color:white ;margin-top :10px">Submit</button>
</div>
    </form>
</body>
</html>