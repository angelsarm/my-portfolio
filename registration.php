
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <!-- <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script> -->
    <!-- <script src="js/validation.js" defer></script> -->
</head>
<body>

        <h1>Sign Up</h1>

<?php
    // Display error messages if any
    session_start();
    if (isset($_SESSION['errors'])) {
        foreach ($_SESSION['errors'] as $error) {
            echo "<p style='color: red;'>$error</p>";
        } 
          unset($_SESSION['errors']);
    }
    ?>

    <form action="process_Registration.php" method="POST" id="registration" >


        <h4>
            Please fill out this form in order to create an account
            <br>
            <span>*All fields are required*</span>
            

        </h4>
        <div>
            <label for="Username"> <h3>Username: </h3></label>
            <input type="text" id="Username" name="Username" value="<?php echo isset($_SESSION['user_input']['Username']) ? $_SESSION['user_input']['Username'] : ''; ?>" required>
           

        </div>

        <div>
            <!-- fullname -->
            <p>Fullname:</p>
            
                <p>Last Name:</p>
                <input type="text" id="lastName" name="lastName" value="<?php echo isset($_SESSION['user_input']['lastName']) ? $_SESSION['user_input']['lastName'] : ''; ?>" required >
                <p>First Name:</p>
                
                <input type="text" id="firstName" name="firstName" value="<?php echo isset($_SESSION['user_input']['firstName']) ? $_SESSION['user_input']['firstName'] : ''; ?>" required>

                <p>Middle Name:</p>
                <input type="text" id="middleName" name="middleName" value="<?php echo isset($_SESSION['user_input']['middleName']) ? $_SESSION['user_input']['middleName'] : ''; ?>" required><br>
                

            </div>

        <div>
        <!-- email -->
        <label for="Email" class="">Email</label>
        <input type="email" name="Email" id="Email" placeholder="e.g.,juandelacruz@gmail.com" value="<?php echo isset($_SESSION['user_input']['Email']) ? $_SESSION['user_input']['Email'] : ''; ?>" required><br>


        </div>

       
        <div>
            <!-- MOBILE NUMBER -->
            <label for="mobileNumber">Mobile Number (Philippines):</label>

            <input type="tel" id="mobileNumber" name="mobileNumber" pattern="[0-9]{11}" placeholder="e.g., 09123456789" required maxlength="11" value="<?php echo isset($_SESSION['user_input']['mobileNumber']) ? $_SESSION['user_input']['mobileNumber'] : ''; ?>">

            <small>Format: 09123456789 (11 digits)</small>
            <small id="mNumberError" class="errorMsg"></small>

        </div><BR>  

        <div>
        <!-- password and password confirmation -->
        <label for="password" class="">Password:</label>
        <input type="password" name="password" id="password" maxlength="8" required>
        <small>Password must contain atleast 8 characters. Must also contain atleast 1 letter and 1 number</small>
        

        
        <br>
        <label for="ConfirmPassword" class="">Confirm Password:</label>
        <input type="password" name="ConfirmPassword" id="ConfirmPassword" maxlength="8" required><br>

        <label>
        <input type="checkbox" id="showHideCheckbox" > Show Password
    </label>
    </div>
        <!-- submit button -->
        <button class="submit" >SUBMIT</button>

        <p>Already Have an account? <a href="login.php">Click Here</a></p>
</form>

<script>
        
    //     let passwordInput = document.getElementById("password");
    //     let confirmPasswordInput = document.getElementById("ConfirmPassword");
    //     let showHideCheckbox = document.getElementById("showHideCheckbox");
       
    //     function showPass(){
    //     if(passwordInput.type == "password" && confirmPasswordInput.type == "password"){
    //         passwordInput.type = "text"
    //         confirmPasswordInput.type = "text"

    //     }

    //     else{
    //         passwordInput.type === "password"
    //         confirmPasswordInput.type === "password"
    //         showHideCheckbox.textContent = "Show"

    //     }
    // }
      

</script>

    
</body>
</html>