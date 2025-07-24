<head>
<?php include("../common/commonfiles.php")?>
</head>


<h2 style="text-align: center;">My Post</h2>
<style>
    ul{
      list-style-type: none;
      margin-right: 20px;
    }

  </style>

<?php 

session_start();


$user_id="";
include("../common/db_conn.php");
$user_id = $_SESSION['user_id'];
$sql = "select * from post where user_id = $user_id";
$result=$conn->query($sql);

//$result = $conn->prepare($sql);
//$result->bind_param("s",$user_id);
//$result->execute();
//print_r($result);
foreach($result as $row){
    $scammer = $row['scammer'] ;
    $message = $row['message'];
    echo "<ul class='fake'><li class='fakebody'>
  <div class='card' >
    <div class='card-body'>
      <h5 class='card-title'>$scammer</h5>
      <h6 class='card-subtitle mb-2 text-muted'>--</h6>
      <p class='card-text'>$message</p>
      <a href='#' class='card-link'>search count</a>
      <a href='#' class='card-link'>Repost</a>
    </div>
  </div>
  </li></ul>";}

?>
