<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: dashboard.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['user'] = $_POST['username'];
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WiFi Login</title>
</head>
<body>
    <h2>Welcome to the Hotel WiFi</h2>
    <form method="POST">
        <label>Enter Your Name:</label>
        <input type="text" name="username" required>
        <button type="submit">Connect</button>
    </form>
</body>
</html>
