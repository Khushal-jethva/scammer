<?php 

include('./common/db_conn.php');
// session_start();
$user_id = $_SESSION['user_id'];
$sql1 = "select * from user where id = $user_id";
$result1 = $conn->query($sql1);
foreach($result1 as $rows){
  $user_name = $rows['name'];
}


if(isset($_GET['p-id'])){
    $post_id = $_GET['p-id'];

    $sql = "select * from post where id= $post_id";
$result = $conn->query($sql);

foreach($result as $row){
  $scammer = $row['scammer'] ;
  $message = $row['message'];
echo "<ul class='fake'><li class='fakebody'>
<div class='card' >

  <div class='card-body'>
    <h5 class='card-title'>$scammer</h5>
    <h6 class='card-subtitle mb-2 text-muted'>--</h6>
    <p class='card-text'>$message</p>
    <a href='?p_id=$post_id' class='card-link'>Repost</a>
    <p>uploades by <a href='profile1.php'> $user_name</a></p>";
  }
}




$similar_scam="";
echo "<h4>Similar Scam</h4>";
$query = "select * from repost where post_id = $post_id";
$output = $conn->query($query);

if($output->num_rows > 0 ){
foreach($output as $row1){
    $similar_scam = $row1['message'];
    
    
      
       
      echo  "<li class='fakebody'>
    <div class='card' >
    
      <div  class='card-body'>
        
    
        <p class='card-text' >$similar_scam</p>
        ";
    
}

}else {
  echo "no similar scam related this scammer is found yet ";

}

?>
<h1 ></h1>
<p style="width: 20px;"></p>