<?php
session_start();

// Set session timeout (5 minutes)
$timeout_duration = 300;  // 5 minutes in seconds

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

// Check if session has timed out
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout_duration) {
    session_unset();     // Clear session data
    session_destroy();   // Destroy the session
    header("Location: index.php");
    exit();
}

$_SESSION['last_activity'] = time();  // Update last activity time
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Services</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['user']; ?>!</h2>
    <p>Choose from our services:</p>
    <ul>
        <li><a href="#">Room Service</a></li>
        <li><a href="#">Food Menu</a></li>
        <li><a href="#">Checkout</a></li>
    </ul>
    <a href="logout.php">Disconnect WiFi</a>
</body>
</html>
