<?php
include ('pet911/appointment/home.php');    
include 'database.php';
// session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit();
}


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Account</title>
</head>
<body>
    <h2>Your Account Information</h2>
    <p>User Name: <?= htmlspecialchars($user["Username"]) ?></p>
    <p>User Email: <?= htmlspecialchars($user["Email"]) ?></p>

    <h3>Update Account</h3>
    <form action="updateAccount.php" method="post">
        <!-- Include input fields for updating user information (name, email, password, etc.) -->
        <!-- Use appropriate input types and attributes based on your requirements -->
        
        <!-- USERNAME -->
        <label for="newUsername">New Username:</label>
        <input type="text" name="newUsername" value="<?= htmlspecialchars($user["Username"]) ?>"required> 
        <br>
        <!-- NAME -->
        <label for="newName">New Name:</label>
        <input type="text" name="newName" value="<?= htmlspecialchars($user["Name"]) ?>"required> 
        <br>

        <!-- EMAIL -->
        <label for="newEmail">New Email:</label>
        <input type="email" name="newEmail" value="<?= htmlspecialchars($user["Email"]) ?>"required>
        <br>

        <!-- MOBILE NUMBER -->
        <label for="newMobileNumber">New Mobile Number (Philippines):</label>
        <input type="tel" id="newMobileNumber" name="newMobileNumber" pattern="[0-9]{11}" placeholder="e.g., 09123456789" required maxlength="11" value="<?= htmlspecialchars($user["Mobile Number"]) ?>">
        <small>Format: 09123456789 (11 digits)</small>
        <small id="mNumberError" class="errorMsg"></small>
        <br>
        

        <!-- Add more fields as needed -->

        <input type="submit" value="Update Account">

        </form>

    <h3>Delete Account</h3>
    <form action="deleteAccount.php" method="post">
        <input type="submit" value="Delete Account" onclick="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">

        </form>
    
</body>
</html>
