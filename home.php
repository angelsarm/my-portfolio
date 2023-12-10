<?php
session_start();
if(isset($_SESSION["user_id"] )){
    $mysqli = require __DIR__ . "/pet911/registration-login/database.php";
    $sql = "SELECT * FROM `user` WHERE ID = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">

</head>
<body>
    <h1>HOME</h1>
    
    <?php if(isset($_SESSION["user_id"] )): ?>
        <!-- if user is logged in -->
        <p>Welcome, <?= htmlspecialchars($user["Username"]) ?></p>
        <h2>PET 911</h2>
    <p><a href = "/pet911/registration-login/account.php">Account Details</a></p>

    <p><a href="/pet911/appointment/Appointment.php">Schedule an appointment</a></p>
    


        <p><a href = "/pet911/registration-login/logout.php">Log out</a></P>

    <?php else: ?>
        <!-- if user is not logged in it will redirect -->

        <p><a href="/pet911/registration-login/login.php">Log In</a> or <a href="/pet911/registration-login/registration.php">Register</a></p>
        
    <?php endif?>    
</body>
</html>