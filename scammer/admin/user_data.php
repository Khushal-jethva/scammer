
<?php 
include('../common/commonfiles.php');
include('./admin_header.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Table</title>
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

        .styled-table .edit-btn, .styled-table .delete-btn {
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

        /* Edit Form Styling */
        .edit-form {
            display: none;
            margin-top: 20px;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .edit-form input {
            padding: 8px;
            margin-bottom: 10px;
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .edit-form button {
            padding: 8px 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .edit-form button:hover {
            background-color: #45a049;
        }

        /* Hide Table while editing */
        .hidden {
            display: none;
        }
    </style>
</head>
<body>

<?php
include('../common/db_conn.php');

// Fetch all user data
$sql = "SELECT * FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='styled-table' id='userTable'>";
    echo "<thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role_id</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
          </thead>
          <tbody>";

    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"]. "</td>
                <td>" . $row["name"]. "</td>
                <td>" . $row["email"]. "</td>
                <td>" . $row["role_id"]. "</td>
                <td>" . $row["status"]. "</td>
                <td>
                    <button class='edit-btn' onclick='editUser(" . $row["id"] . ", `" . $row["email"] . "`, `" . $row["name"] . "`, `" . $row["status"] . "`)'>Edit</button>
                    <button class='delete-btn' onclick='deleteUser(" . $row["id"] . ")'>Delete</button>
                </td>
              </tr>";
    }

    echo "</tbody></table>";
} else {
    echo "0 results";
}
?>

<!-- Edit Form -->
<div class="edit-form" id="editForm">
    <h2>Edit User</h2>
    <form id="editUserForm" method="POST">
        <input type="hidden" name="id" id="editId">
        <input type="text" name="username" id="editUsername" placeholder="Username" required>
        <input type="email" name="email" id="editEmail" placeholder="Email" required>
        <input type="text" name="status" id="editStatus" placeholder="Status" required>
        <button type="submit">Update User</button>
    </form>
</div>

<?php
// Handle form submission for updates
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Fetch and sanitize the POST data
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $status = $_POST['status'];

    // Update query
    $updateSql = "UPDATE user SET name = ?, email = ?, status = ? WHERE id = ?";
    $stmt = $conn->prepare($updateSql);
    $stmt->bind_param("sssi", $username, $email, $status, $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "<script>alert('User updated successfully!'); window.location.reload();</script>";}
    // } else {
    //     echo "<script>alert('Error updating user.');</script>";
    // }
}
?>

<?php
// Handle the delete request
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $deleteSql = "DELETE FROM user WHERE id = ?";
    $stmt = $conn->prepare($deleteSql);
    $stmt->bind_param("i", $delete_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "<script>alert('User deleted successfully!'); window.location.reload();</script>";}
    // } else {
    //     echo "<script>alert('Error deleting user.');</script>";
    // }
}
?>

<!-- JavaScript to handle the Edit action and Delete action -->
<script>
function editUser(id, email, username, status) {
    // Fill the form with the current data
    document.getElementById("editId").value = id;
    document.getElementById("editUsername").value = username;
    document.getElementById("editEmail").value = email;
    document.getElementById("editStatus").value = status;

    // Hide the table
    document.getElementById("userTable").classList.add("hidden");

    // Show the edit form
    document.getElementById("editForm").style.display = "block";
}

function deleteUser(id) {
    if (confirm("Are you sure you want to delete this user?")) {
        window.location.href = "?delete_id=" + id;
    }
}
</script>

</body>
</html>
