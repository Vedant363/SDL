<?php
session_start();

// Check if the user is logged in, if not, redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Welcome message
echo "Welcome, " . $_SESSION['username'] . "!";

// Logout link
echo "<br><a href='logout.php'>Logout</a>";
?>
