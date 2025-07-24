<?php 
include("./common/db_conn.php");
$search_ch = "";
if($_SERVER["REQUEST_METHOD"]=="GET" ){
    $search_ch = $_GET['search'];
$sql = "select * from post where scammer like '%$search_ch%' ";
$result  = $conn->query($sql);


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

}

?>
<style>
    ul{
        list-style-type: none;
        margin-right: 20px;
    }
</style>