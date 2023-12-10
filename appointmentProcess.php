<?php
// include 'db_connect.php';
include 'home.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['errors']) && count($_SESSION['errors']) > 0) {
        print_r($_SESSION['errors']);
        header("Location: Appointment.php");
        exit();
    }



    // logged in users data from database
    $ownerName = $user["Name"];
    $email = $user["Email"];
    $mobileNumber = $user["Mobile Number"];
    // data from appointment 
    $petName = htmlspecialchars($_POST["petName"]);
    $appointmentDate = htmlspecialchars($_POST["appointmentDate"]);
    $appointmentTime = ($_POST["appointmentTime"]);
    $service = $_POST["Service"];

    $_SESSION['user_input'] = [
        'petName' => $petName,
        'appointmentDate' => $appointmentDate,
        'appointmentTime' => $appointmentTime,
        'Service' => $service,
    ];

    // Validate the input (you can add more specific validations)
    if (empty($petName) || empty($appointmentDate) || empty($appointmentTime) || empty($service)) {
        $_SESSION['errors'][] = "All fields are required.";
    } else {
        // Check if the appointment date is in the future
        $today = date('Y-m-d');
        if ($appointmentDate <= $today) {
            $_SESSION['errors'][] = ("Appointment date cannot be set in the past.");
            header("Location: Appointment.php");

        } 
        else if($appointmentDate > $today) {
            //INSERT INTO DATABASE 
            $sql = "INSERT INTO `appointment`(`Name`, `Email`, `Mobile Number`, `Pet Name`, `Appointment Date`, `Appointment Time`, `Service`) VALUES (?, ?, ?, ?,?,?,?)";
        
            $stmt = $mysqli->stmt_init();

            if ( ! $stmt->prepare($sql)) {
            $_SESSION['errors'][] = ("SQL error: " . $mysqli->error);
            exit;
            }

            $stmt->bind_param("sssssss",
                  $ownerName,
                  $email,
                  $mobileNumber,
                  $petName,
                  $appointmentDate,
                  $appointmentTime,
                  $service);
                  
            if ($stmt->execute()) {
            //appointment successful 
            header("Location: appointmentSuccess.html");
            unset($_SESSION['user_input']);
            unset($_SESSION['errors']);

            exit();
        }
        

            
        }    
    }

}

else {
    // Redirect if someone tries to access this script directly
    header("Location: home.php");
    unset($_SESSION['user_input']);
    unset($_SESSION['errors']);
    exit();

}
 


?>