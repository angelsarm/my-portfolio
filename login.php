<?php
session_start();
$is_invalid = false;
if($_SERVER["REQUEST_METHOD"] === "POST"){
$mysqli = require __DIR__ . "/database.php";
    $sql = sprintf("SELECT * FROM `user` WHERE Username = '%s'", $mysqli->real_escape_string($_POST["Username"]));

    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();

if(empty($_POST['Username'])){
    $emailError = "Please enter your email";
}
if(empty($_POST['Password'])){
    $passwordError = "Please enter your password";  
}

    if($user){
        if(password_verify($_POST["Password"], $user["Password_hash"])){
            session_start();
            session_regenerate_id();
            $_SESSION["user_id"] = $user["ID"];
            
            header("Location: /pet911/appointment/home.php");}
        else if(!password_verify($_POST["Password"], $user["Password_hash"])){
    $passwordError = "Wrong Password";  
            
        }
    }
    $is_invalid = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">

</head>
<body>
<style>
        .errorMsg{
            color: red;
        }
    </style>
        <h1>Log In</h1>
        
        <form action="" method="post">
            <div>
                <!-- email -->
                <label for="Username" class="">Username</label>
                <input type="text" name="Username" id="Username" value="<?= htmlspecialchars($_POST["Username"] ?? "") ?>" required>
                <br>
                <small class="errorMsg"><?php if(isset($emailError)) echo $emailError; ?></small>
            </div>

            <div>
                <!-- Password -->
                <label for="Password" class="">Password</label>
                <input type="password" name="Password" id="Password" maxlength="8" required><br>
                <small class="errorMsg"><?php if(isset($passwordError)) echo $passwordError; ?></small>
                <br>
                <label>
                 <input type="checkbox" id="showHideCheckbox" onclick = "showPass()"> Show Password
                </label>
            </div>

            <div>
                <!-- submit button -->
                <button class="submit">SUBMIT</button>
            
            </div>

        <p>Don't Have an account? <a href="registration.php">Click Here</a></p>


        </form>


        <script>
        
        let passwordInput = document.getElementById("Password");
        let showHideCheckbox = document.getElementById("showHideCheckbox");
       
        function showPass(){
        if(passwordInput.type === "password" ){
            passwordInput.type === "text"
            confirmPasswordInput.type === "text"

        }

        else{
            passwordInput.type === "password"
            confirmPasswordInput.type === "password"
            showHideCheckbox.textContent = "Show"

        }
    }
      

</script>
</body>
</html>