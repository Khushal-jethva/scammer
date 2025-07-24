<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./common/style.css">
    <?php include("./common/commonfiles.php")?>

    <style>
        /* General Styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    
}

body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    background-color: #f4f4f4;
    color: #333;
    background-color: rgb(171, 178, 185);
}

/* Container and Grid */
.container {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.row {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.col-sm {
    flex: 1 1 calc(33.333% - 20px);
    /* Ensures 3 columns, with space in between */
}

@media (max-width: 992px) {
    .col-sm {
        flex: 1 1 calc(50% - 20px); /* 2 columns on medium screens */
    }
}

@media (max-width: 768px) {
    .col-sm {
        flex: 1 1 100%; /* 1 column on small screens */
    }
}

/* Card Styles */
.card {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

.card img {
    width: 100%;
    height: auto;
    object-fit: cover;
}

.card-body {
    padding: 15px;
}

.card-title {
    font-size: 1.25rem;
    font-weight: bold;
    margin-bottom: 10px;
}

.card-text {
    font-size: 1rem;
    color: #666;
}

/* Category List Styles */
.category-list {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.category-list ul {
    list-style: none;
    padding: 0;
}

.category-list ul li {
    margin: 10px 0;
    font-size: 1rem;
}

.category-list ul li a {
    text-decoration: none;
    color: #007BFF;
    transition: color 0.3s ease;
}

.category-list ul li a:hover {
    color: #0056b3;
}

/* Searchbox Styles */
.searchbox {
    margin-bottom: 20px;
}

.searchbox input[type="text"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 1rem;
}

.searchbox button {
    padding: 10px 15px;
    background-color: #007BFF;
    border: none;
    color: white;
    font-size: 1rem;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.searchbox button:hover {
    background-color: #0056b3;
}

/* Responsive header and footer */
header, footer {
    background-color: #333;
    color: #fff;
    padding: 15px 0;
    text-align: center;
}

header h1, footer p {
    font-size: 1.5rem;
    margin: 0;
}

    </style>
    
</head>
<body>
    
</body>
<h1>hello</h1>
</html>
<?php
session_start();

include("./header.php");

// include("./post/category_list.php");


// if(isset($_GET["signup"])&& (!isset($_SESSION['user_id']))){
//     include("./signup.php");
//}
//  if(isset($_GET["login"])&& (!isset($_SESSION['user_id']))){
//     include("./login.php");
// }
// else if(isset($_GET["logout"])&& (isset($_SESSION['user_id']))){
//     include("./logout.php");
// }
if (isset($_GET['Post'])&& (isset($_SESSION['user_id']))){
     include("./post/create_post.php");
}
else if (isset($_GET['p_id'])&& (isset($_SESSION['user_id']))){
    include('./post/repost.php');
}
else if (isset($_GET['p-id'])&& (isset($_SESSION['user_id']))){
    include('./post/viewall.php');
}

// else if (isset($_GET['profile'])&& (isset($_SESSION['user_id']))){
//     include("./user/profile.php");

// }

else{
//    include('./post/repost.php');
   include('./post/searchbox.php');
    // include('./post/post.php');
    // include("./post/category_list.php");

    // if(isset($_GET['c_id'])){
    //     include('./post/post_bycategory.php');
    // }else if(isset($_GET['search'])){
    //     include("./post/search_post.php");
    //}
    //else {
        echo "<div class='container'><div class='row'><div class='col'>";
        include("./post/card.php");
        // include("./post/category_list.php");
    //    echo "</div>";

        echo "<div class='col'>";
        // include("./post/card.php");
        include("./post/category_list.php");
        echo "</div>";
    }
 



//}


?>