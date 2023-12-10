<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make An Appointment!</title>
    <!-- <link rel = "stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">


</head>
<body>

    <a href="home.php">Home</a>

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

        <h3>Pet Information</h3>
        <form action="appointmentProcess.php" method="post">
        <!-- PET NAME -->
        <p >Pet Name</p>
        <input type="text" id="petName" name="petName" class="input" value="<?php echo isset($_SESSION['user_input']['petName']) ? $_SESSION['user_input']['petName'] : ''; ?>" required>
        
        

        <br>
        
        <h3>Appointment Schedule</h3>
        <br>
        <!-- appointment date -->
        <label for="appointmentDate">Appointment Date:</label>
        <input type="date" name="appointmentDate" id="appointmentDate" value="<?php echo isset($_SESSION['user_input']['appointmentDate']) ? $_SESSION['user_input']['appointmentDate'] : ''; ?>" required>
        

        <br>
        <label for="appointmentTime">Appointment Time</label>
        <select id ="appointmentTime" name="appointmentTime"class="input" value="<?php echo isset($_SESSION['user_input']['appointmentTime']) ? $_SESSION['user_input']['appointmentTime'] : ''; ?>" required>

            <option value=""></option>
            <option value="9:00 am -10:00 am">9:00 am -10:00 am</option>
            <option value="10:00 am- 11:00 am">10:00 am- 11:00 am</option>
            <option value="11:00 am - 12:00 pm">11:00 am - 12:00 pm</option>
            <option value="12:00 pm - 1:00 pm">12:00 pm - 1:00 pm</option>
            <option value="2:00 pm - 3:00 pm">2:00 pm - 3:00 pm</option>
            <option value="3:00 pm - 4:00 pm">3:00 pm - 4:00 pm</option>
            <option value="4:00 pm - 5:00 pm">4:00 pm - 5:00 pm</option>
            <option value="5:00 pm - 6:00 pm">5:00 pm - 6:00 pm</option>
        </select>
        <br>
            <h3>Choose type of service</h3>
        <br>
        <label for="Service">Service</label>
        <select id ="Service" name="Service" class="input" value="<?php echo isset($_SESSION['user_input']['Service']) ? $_SESSION['user_input']['Service'] : ''; ?>" required>
            <option value=""></option>
            <option value="Consultation">Consultation</option>
            <option value="X-ray & Ultrasound">X-ray & Ultrasound</option>
            <option value="Vaccination">Vaccination</option>
            <option value="Deworming">Deworming</option>
            <option value="Soft tissue surgery">Soft tissue surgery</option>
            <option value="Pet Grooming">Pet Grooming</option>
            <option value="Dental Procedure">Dental Procedure</option>
            <option value="Laboratory Tests">Laboratory Tests</option>
            <option value="Check-up">Check-up</option>
            <option value="Follow up Check-up">Follow up Check-up</option>


            </select>
        
            <button onclick="">Submit</button>
        </form>

        <script>
            function validateForm() {
                var appointmentDate = document.getElementById('appointmentDate').value;
                var today = new Date().toISOString().split('T')[0];
    
                if (appointmentDate < today) {
                    alert('Appointment date cannot be set in the past.');
                    return false;
                }
    
                return true;
            }
        </script>

</body>
</html>