<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

echo "Welcome to the dashboard!";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Dashboard</h2>
    <p>Welcome, <?php echo $_SESSION['user_role']; ?>!</p>
    <a href="logout.php">Logout</a>
</body>
</html>
