<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: /pet911/registration-login/login.php");
    exit();
}

// Retrieve user data from the session or database
$user_id = $_SESSION['user_id'];
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
   
    $sql = "DELETE FROM `user` WHERE ID = $user_id";
    if (mysqli_query($mysqli, $sql)) {
    // Redirect to the login page after deleting the account
        header("Location: /pet911/appointment/home.php");
        session_destroy();
        exit();


    } else {
        echo "Error deleting account: " . mysqli_error($mysqli);
    }

} else {
    // Redirect if someone tries to access this script directly
    header("Location: account.php");
    exit();
}
?>
