<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
        .category-list{
            
            width: 100px;
            margin: 2%;
            border: 2px solid black;
           list-style-type: none;
            text-align: center;
            
            
            
        }
        
        /* .content-wrapper{
            
            justify-self: right;
        } */
        .sidebar {
           
    width: 20%;
    margin: 20px;
    background-color: #fff;
    padding: 20px;
   
}.content-wrapper {
    display: flex;
    justify-content: right;
    width: 50%;
    
  
}
.list{
    text-align: justify;
    

}



    </style>
</head>
<body><ul>
   <div class="list"> 
    <h3 style="text-align: center;">Category</h3>
    <?php 
    include("./common/db_conn.php");
    $title = "";
    $sql = "select * from category";
    $result = $conn->query($sql);
    // echo '<h3 >Categories</h3>';
    foreach($result as $row){
        $title = $row['title'];
        $id = $row['id'];
        echo "<div class='content-wrapper'>
        
         <aside class='sidebar'>
         <li class='category-list'><a href='?c_id=$id'>$title</a></li>
          </aside></div>";
        
    }
    
    
    ?>
    </div>

</body>
</html>