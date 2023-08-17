<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // User is logged in, destroy the session
    session_destroy();
    
    // Redirect to the login page
    header('Location: home.php');
    exit;
} else {
    // If the user is not logged in, redirect to the login page
    header('Location: home.php');
    exit;
}
?>
