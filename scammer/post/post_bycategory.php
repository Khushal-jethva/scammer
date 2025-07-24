<?php
include("./common/db_conn.php");
if(isset($_GET['c_id'])){
    $c_id = $_GET['c_id'];
    
    $query = "select * from post where category_id = $c_id";
    $output = $conn->query($query);
    foreach($output as $row){
        $scammer = $row['scammer'] ;
$message = $row['message'];
 $p_id = $row['id'];
echo "<ul class='fake'><li class='fakebody'>
<div class='card' >
<div class='card-body'>
  <h5 class='card-title'>$scammer</h5>
  <h6 class='card-subtitle mb-2 text-muted'>--</h6>
  <p class='card-text'>$message</p>
  
  <a  href='?p-id=$p_id' class='card-link'>view all</a>
  <a href='?p_id=$p_id' class='card-link'>Repost</a>
</div>
</div>
</li></ul>";}
    }  
?>
<style>
    ul{
        list-style-type: none;
        margin-right: 20px;
    }
</style>