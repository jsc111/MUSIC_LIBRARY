<?php
// Sample user credentials (replace with your actual authentication logic)
$validUsername = 'user';
$validPassword = 'password';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the submitted credentials
    $enteredUsername = $_POST['username'];
    $enteredPassword = $_POST['password'];

    // Validate credentials
    if ($enteredUsername === $validUsername && $enteredPassword === $validPassword) {
        // Valid credentials, set session variable and redirect to index.php
        session_start();
        $_SESSION['loggedin'] = true;
        header('Location: index.php');
        exit();
    } else {
        // Invalid credentials, redirect back to the login page with an error message
        header('Location: login.php?error=1');
        exit();
    }
} else {
    // If the form is not submitted, redirect to the login page
    header('Location: login.php');
    exit();
}
?>
