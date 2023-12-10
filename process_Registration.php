<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_SESSION['errors']) && count($_SESSION['errors']) > 0) {
        print_r($_SESSION['errors']);
        header("Location: registration.php");
        exit();
    }
//list of variables in the reg form
$username = $_POST['Username'];
$lastName = $_POST['lastName'];
$firstName = $_POST['firstName'];
$middleName = $_POST['middleName'];
$email = $_POST['Email'];
$mobileNumber = $_POST['mobileNumber'];


$_SESSION['user_input'] = [
    'Username' => $username,
    'Email' => $email,
    'lastName' => $lastName,
    'firstName' => $firstName,
    'middleName' => $middleName,
    "mobileNumber" => $mobileNumber 

];

//Takes last name, first name, middle name input fields and concatenates them into 1 variable
$fullName = $lastName . ", " . $firstName . " " . $middleName[0] . ".";

// VALIDATION/S
    if(empty($_POST['Username'])){
        $_SESSION['errors'][] = ("Please enter your username");
    header("Location: registration.php");
    exit();


    }

    // checks if names text boxes are empty or not
    if(empty($lastName)){
        $_SESSION['errors'][] =("Please enter complete name");
    header("Location: registration.php");
    // exit();


    }

    if(empty($firstName)){
        $_SESSION['errors'][] =("Please enter complete name");
    header("Location: registration.php");
    // exit();


    }

    if(empty($middleName)){
        $_SESSION['errors'][] =("Please enter complete name");
    header("Location: registration.php");
    // exit();


    }

    



    //VALIDATES IF GIVEN EMAIL IS VALID 
   if ( !filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)) {
    $_SESSION['errors'][] = "Valid Email is required";
    header("Location: registration.php");
    // exit();
  } 

   //validates password: whether or not it has atleast 1 character and a number
    // checks if password has a letter or not
   if( !preg_match("/[a-z]/i", $_POST['password'])){
    $_SESSION['errors'][] = ("PASSWORD MUST CONTAIN ATLEAST 1 LETTER");
    header("Location: registration.php");
    // exit();



   }
    
   // checks if password has a number or not
   if(!preg_match("/[0-9]/", $_POST['password'])){
    $_SESSION['errors'][]  = ("PASSWORD MUST CONTAIN ATLEAST 1 NUMBER");
    header("Location: registration.php");
    // exit();



   }

   //validates if password and password confirmation are the same
    if ($_POST['password'] !== $_POST['ConfirmPassword']) {
    $_SESSION['errors'][] = ("PASSWORDS MUST MATCH");
    header("Location: registration.php");
    exit();

}


   

// turns password into hash values
$passwordToHash = password_hash($_POST['password'], PASSWORD_DEFAULT);




$mysqli = require __DIR__ . "/database.php";
// INSERT DATA TO DATABASE
$sql = "INSERT INTO `user`(`Name`, `Username`, `Email`, `Mobile Number`, `Password_hash`) VALUES (?,?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();   

if (! $stmt->prepare($sql)){
    $_SESSION['errors'][] = ("SQL ERROR: " . $mysqli->error );
}

$stmt->bind_param("sssss", $fullName, $_POST["Username"], $_POST["Email"], $_POST["mobileNumber"], $passwordToHash);

if ($stmt->execute()){
    // registration success! 
    header("Location: registration_success.html");
    unset($_SESSION['user_input']);
    unset($_SESSION['errors']);

exit;
}
if ($mysqli->errno === 1062) {
    $_SESSION['errors'][] = ("email already taken");
    header("Location: registration.php");

    exit();
} 
  

unset($_SESSION['user_input']);
unset($_SESSION['errors']);

}


?>