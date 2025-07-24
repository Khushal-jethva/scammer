Scam category<select name="category" id="">
<option value="">select</option>    
<?php
include('./common/db_conn.php');
$sql = "select * from category";
$result = $conn->query($sql);
//$out = $result->fetch_assoc();
//print_r($out);
foreach($result as $row){
    $id = $row['id'];
    $name = $row['title'];
    echo "<option value = $id>$name</option>";
}
?>
</select>