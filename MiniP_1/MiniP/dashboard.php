<?php
// Check if the user is logged in; otherwise, redirect to the login page
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles_dashboard.css">
</head>

<body>
    <div class="dashboard-container">
        <h1>Welcome to the Dashboard</h1>
        <!-- Add your dashboard content here -->
        <a href="song_details.php?song=1">View Song Details</a>

        <p><a href="logout.php">Logout</a></p>
    </div>
</body>

</html>
