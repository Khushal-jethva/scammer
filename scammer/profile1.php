<h1>hello</h1>
<?php session_start();include("./common/db_conn.php");?>
<div class="dropdown">
          <a class="nav-link" href="./user/profile.php"><i class="fas fa-sign-in-alt" ><img height="30px"  src="./common/login-avatar.png" ></i>Admin</a>
          <div class="dropdown-content">
          <img height="50px" src="./common/user.png" alt="">
          <h3 style="color: black;"><?php echo "<h4>" .$profile."</h4>"?></h3>
          <a href="#">Profile</a>
          <a href='./user/myposts.php'>mypost</a>
            <a href="./chnage_password.php">Change Password</a>
            <a href="./logout.php">Logout</a>
            </div>
            </div>
            <button>follow</button>
           <?php $user_id = $_SESSION['user_id']; // Get logged-in user ID
$profile_id = $_GET['id']; // Get the profile ID to display

// Check if user is already following the profile
$stmt = $conn->prepare("SELECT * FROM followers WHERE follower_id = ? AND following_id = ?");
$stmt->bind_param("ii", $user_id, $profile_id);
$stmt->execute();
$result = $stmt->get_result();

// Determine follow button text
$is_following = $result->num_rows > 0 ? true : false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
</head>
<body>
    <h1>Profile of Student #<?php echo $profile_id; ?></h1>
    <p>Some details about the student...</p>

    <!-- Follow/Unfollow Button -->
    <?php if ($is_following): ?>
        <form action="follow.php" method="POST">
            <input type="hidden" name="following_id" value="<?php echo $profile_id; ?>">
            <input type="hidden" name="action" value="unfollow">
            <button type="submit">Unfollow</button>
        </form>
    <?php else: ?>
        <form action="follow.php" method="POST">
            <input type="hidden" name="following_id" value="<?php echo $profile_id; ?>">
            <input type="hidden" name="action" value="follow">
            <button type="submit">Follow</button>
        </form>
    <?php endif; ?>
</body>
</html>