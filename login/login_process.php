<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate username and password
    if ($username === "admin" && $password === "admin") {
        // Authentication successful, redirect to next page
        header("Location: welcome.php");
        exit();
    } else {
        // Authentication failed, back to login.php
        header("Location: login.php?error=Invalid Username or Password");
        exit();
    }
}
?>