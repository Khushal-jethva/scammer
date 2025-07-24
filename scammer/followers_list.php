<?php
session_start();
include("./common/db_conn.php");

$user_id = $_SESSION['user_id']; // Get logged-in user ID

// Get list of followers
$stmt = $conn->prepare("SELECT u.username FROM followers f JOIN users u ON f.follower_id = u.id WHERE f.following_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

echo "<h2>Followers</h2><ul>";
while ($row = $result->fetch_assoc()) {
    echo "<li>" . $row['username'] . "</li>";
}
echo "</ul>";

// Get list of following
$stmt = $conn->prepare("SELECT u.username FROM followers f JOIN users u ON f.following_id = u.id WHERE f.follower_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

echo "<h2>Following</h2><ul>";
while ($row = $result->fetch_assoc()) {
    echo "<li>" . $row['username'] . "</li>";
}
echo "</ul>";
?>
