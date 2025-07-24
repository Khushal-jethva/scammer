<link rel="stylesheet" href="../common/commonfiles.php">
<style>
    ul{
      list-style-type: none;
      margin-right: 20px;
      /* width: 50%; */
    }
    
 

  </style>
<!-- <div class="container-fluid">
    <form class="d-flex">
      <input class="form-control" type="search" placeholder="Search" aria-label="Search"> 
      <button class="btn-outline-success" type="submit">Search</button>
      </form>
  </div> -->
  <div class="row">
    <div class="col-7">
      
<?php 

if(isset($_GET['c_id'])){
include('./post/post_bycategory.php');}

else if(isset($_GET['search'])){
  include("./post/search_post.php");}

else{
include('./common/db_conn.php');
$sql = "select * from post";
$result = $conn->query($sql);

foreach($result as $row){
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

</li></ul>";

  
}
}


?>
</div>
<script>
        // JavaScript function to handle the click event
        document.getElementById('viewAllLink').addEventListener('click', function(event) {
            event.preventDefault(); // Prevents the default link behavior (page reload)
            
            // You can replace the URL with the page you want to open
            window.location.href = '/repost.php'; // Open the "view all" page
        });
    </script>


<!-- <div class="col-5">
  <h1>Category</h1>
  

</div></div> -->





