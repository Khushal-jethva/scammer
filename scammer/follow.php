<?php
session_start();
include("./common/db_conn.php"); // database connection file

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    die("Please log in to follow users.");
}

$follower_id = $_SESSION['user_id']; // Get the logged-in user ID
$following_id = $_POST['following_id']; // ID of the student being followed

if ($follower_id == $following_id) {
    die("You cannot follow yourself.");
}

if ($_POST['action'] == 'follow') {
    // Follow the student
    $stmt = $conn->prepare("INSERT INTO followers (follower_id, following_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $follower_id, $following_id);

    if ($stmt->execute()) {
        echo "You are now following the student.";
    } else {
        echo "Error: Could not follow student.";
    }
} elseif ($_POST['action'] == 'unfollow') {
    // Unfollow the student
    $stmt = $conn->prepare("DELETE FROM followers WHERE follower_id = ? AND following_id = ?");
    $stmt->bind_param("ii", $follower_id, $following_id);

    if ($stmt->execute()) {
        echo "You have unfollowed the student.";
    } else {
        echo "Error: Could not unfollow student.";
    }
}
?>
