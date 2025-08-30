<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
<h2>Welcome to Attendance System</h2>
<p>You are logged in as: <?php echo $_SESSION["role"]; ?></p>
<a href="attendance.php">Mark Attendance</a><br>
<?php if ($_SESSION["role"] == "admin"): ?>
    <a href="manage_users.php">Manage Users</a><br>
<?php endif; ?>
<a href="logout.php">Logout</a>
</body>
</html>
