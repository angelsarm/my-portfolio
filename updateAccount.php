<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: /pet911/appointment/home.php");
    exit();
}
include 'database.php';

// Retrieve user data from the session or database
$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Retrieve new user information from the form
    $newUsername = $_POST["newUsername"];
    $newName = $_POST["newName"];
    $newEmail = $_POST["newEmail"];
    $newMobileNumber = $_POST["newMobileNumber"];

    // // UPDATE TO DATABASE
    //     $stmt = $mysqli->prepare("UPDATE `user` SET Username= ?, 'Name' = ? ,`Email`=?,`Mobile Number`=? WHERE ID = ?");
    //     $stmt->bind_param("ssssi", $newUsername, $newName, $newEmail, $newMobileNumber , $user_id);
        
    $sql = "UPDATE user SET Username = '$newUsername', Name='$newName', Email='$newEmail', `Mobile Number` = '$newMobileNumber' WHERE ID= $user_id";

        if (mysqli_query($mysqli, $sql)) {
            // Update the session variables with the new information
            $_SESSION['Username'] = $newUsername;
        $_SESSION['Email'] = $newEmail;
        $_SESSION['Mobile Number'] = $newMobileNumber;
        $_SESSION['Name'] = $newName;

    header("Location: /pet911/appointment/home.php");
        } else {
            echo "Error updating account: " . mysqli_error($mysqli);
        }
        
        exit;
$sql->close();        
}

    else {
    // Redirect if someone tries to access this script directly
    header("Location: /pet911/appointment/home.php");
    exit();
}
?>
