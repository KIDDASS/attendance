<?php
session_start();
include "db.php";

if ($_SESSION["role"] != "admin") {
    die("Access denied!");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = md5($_POST["password"]);
    $role = $_POST["role"];
    $sql = "INSERT INTO users (username, password, role) VALUES ('$username','$password','$role')";
    $conn->query($sql);
}

$users = $conn->query("SELECT * FROM users");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Users</title>
</head>
<body>
<h2>User Management (Admin Only)</h2>
<form method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <select name="role">
        <option value="user">User</option>
        <option value="admin">Admin</option>
    </select>
    <button type="submit">Add User</button>
</form>

<h3>Users List</h3>
<table border="1">
<tr><th>ID</th><th>Username</th><th>Role</th></tr>
<?php while($row = $users->fetch_assoc()): ?>
<tr>
    <td><?php echo $row["id"]; ?></td>
    <td><?php echo $row["username"]; ?></td>
    <td><?php echo $row["role"]; ?></td>
</tr>
<?php endwhile; ?>
</table>
<a href="dashboard.php">Back</a>
</body>
</html>
