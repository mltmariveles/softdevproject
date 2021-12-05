<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    $contact;
    $fname;
    $lname;
    $level;
    $email;


    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- <script src="node_modules/jquery/dist/jquery.min.js"></script> -->
    
</head>
<body>

    <div class="container">


        

        <div class = "d-flex justify-content-center">
            <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
            <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
        </div>

    </div>
    


    <!-- <script src="register.js"></script>
    <script src="node_modules/@popperjs/core/dist/cjs/popper.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script> -->
    
</body>
</html>