<?php
session_start();
include "db.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION["user_id"];
    $date = date("Y-m-d");
    $status = $_POST["status"];

    $sql = "INSERT INTO attendance (user_id, date, status) VALUES ('$user_id','$date','$status')";
    $conn->query($sql);
    echo "Attendance marked successfully!";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Attendance</title>
</head>
<body>
<h2>Mark Attendance</h2>
<form method="POST">
    <select name="status" required>
        <option value="Present">Present</option>
        <option value="Absent">Absent</option>
    </select>
    <button type="submit">Submit</button>
</form>
<a href="dashboard.php">Back</a>
</body>
</html>
