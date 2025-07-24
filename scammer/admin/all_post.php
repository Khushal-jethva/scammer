<?php 
include('../common/commonfiles.php');
include('./admin_header.php');?>


<style>
    /* General Page Styling */
       
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}
        #header-container {
    /* background-color: #333; */
    background-color: #f4f4f4;
    color: #fff;
    padding: 10px;
    text-align: center;
}

#header-container h1 {
    margin: 0;
}

nav ul {
    list-style-type: none;
    padding: 0;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

nav ul li a {
    color: white;
    text-decoration: none;
}
    /* Table Styling */
.styled-table {
    width: 100%;
    margin: 20px auto;
    border-collapse: collapse;
    background-color: #fff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.styled-table thead {
    background-color: #4CAF50;
    color: white;
    text-align: left;
}

.styled-table th,
.styled-table td {
    padding: 12px 15px;
    border: 1px solid #ddd;
}

.styled-table tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

.styled-table tbody tr:hover {
    background-color: #ddd;
}

.styled-table th {
    font-size: 16px;
    font-weight: bold;
}

.styled-table td {
    font-size: 14px;
}

.styled-table .edit-btn,
.styled-table .delete-btn {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 6px 10px;
    cursor: pointer;
    border-radius: 5px;
    margin-right: 5px;
}

.styled-table .delete-btn {
    background-color: red;
}

/* Responsive Styling */
@media screen and (max-width: 768px) {
    .styled-table {
        width: 100%;
        border: none;
    }

    .styled-table th,
    .styled-table td {
        padding: 8px;
    }

    .styled-table th {
        font-size: 14px;
    }

    .styled-table td {
        font-size: 12px;
    }
}

</style><?php 
include('../common/db_conn.php');

// Check if delete ID is set
if (isset($_GET['delete_id'])) {
    $postId = $_GET['delete_id'];

    // Step 1: Delete related repost records
    $deleteRepostQuery = "DELETE FROM repost WHERE post_id = ?";
    $stmt = $conn->prepare($deleteRepostQuery);
    $stmt->bind_param("i", $postId);
    $stmt->execute();

    // Step 2: Now delete the post
    $deletePostQuery = "DELETE FROM post WHERE id = ?";
    $stmt = $conn->prepare($deletePostQuery);
    $stmt->bind_param("i", $postId);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "<script>alert('Post deleted successfully!'); window.location.href = 'all_post.php';</script>";
    } else {
        echo "<script>alert('Error deleting post.'); window.location.href = 'all_post.php';</script>";
    }
}

$sql = 'SELECT post.user_id, user.name, user.email, post.id, post.category_id, post.scammer, post.message FROM user INNER JOIN post ON user.id = post.user_id';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='styled-table' id='userTable'>";
    echo "<thead>
            <tr>
                <th>User Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Scammer</th>
                <th>Message</th>
                <th>Post Id</th>
                <th>Category Id</th>
                <th>Actions</th>
            </tr>
          </thead>
          <tbody>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["user_id"] . "</td>
                <td>" . $row["name"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["scammer"] . "</td>
                <td>" . $row["message"] . "</td>
                <td>" . $row["id"] . "</td>
                <td>" . $row["category_id"] . "</td>
                <td>
                    <button class='delete-btn' onclick='deleteUser(" . $row["id"] . ")'>Delete</button>
                </td>
              </tr>";
    }

    echo "</tbody></table>";
} else {
    echo "0 results";
}
?>

<script>
function deleteUser(id) {
    if (confirm("Are you sure you want to delete this post?")) {
        window.location.href = "?delete_id=" + id;
    }
}
</script>
