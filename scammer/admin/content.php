
<?php 
include('../common/db_conn.php');
$sql = "select count(*)  as total_user from user where role_id = 1 ";
$result = $conn->query($sql);
$row=$result->fetch_assoc();
$user_count = $row['total_user'];


$query = "select count(*)  as total_post from post";
$output = $conn->query($query);
$row1 = $output->fetch_assoc();
$post_count = $row1['total_post'];
?>







<div class="row">
  <div class="col">
    <div class="card h-50 w-50">
      
      <div class="card-body">
        <h5 class="card-title"><?php echo $user_count?></h5>
        <p class="card-text">Total user</p>
      </div>
      
    </div>
  </div>
  <div class="col">
    <div class="card h-50 w-50">
      
      <div class="card-body">
        <h5 class="card-title"><?php echo $post_count?></h5>
        <p class="card-text">Total post</p>
      </div>
      
    </div>
  </div>
  <div class="col">
    <div class="card h-100 w-50">
      
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      </div>
      
    </div>
  </div>
</div>



