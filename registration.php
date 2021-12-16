<?php

include 'configvr2.php';
session_start();
error_reporting(0);

if (!isset($_SESSION["user_id"])) {
    header("Location: rename_index.php");
}

if(isset($_POST["submit"])){
$firstname = mysqli_real_escape_string($conn, $_POST["firstname"]);
$lastname = mysqli_real_escape_string($conn, $_POST["lastname"]);
$middlename = mysqli_real_escape_string($conn, $_POST["middlename"]);
$username = mysqli_real_escape_string($conn, $_POST["username"]);
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$password = mysqli_real_escape_string($conn, md5($_POST["password"]));
$confirmpassword = mysqli_real_escape_string($conn, md5($_POST["confirmpassword"]));

$check_email = mysqli_num_rows(mysqli_query($conn, "SELECT email FROM admins WHERE email='$email'"));
if($password !== $confirmpassword){

    echo '<script>alert("The password did not match!")</script>';
} elseif($check_email > 0){
echo '<script>alert("Email Already Exist")</script>';
}else{
    $sql = "INSERT INTO admins (firstname, lastname, middlename, username, email, password) VALUES ('$firstname','$lastname','$middlename','$username','$email','$password')";
    $result = mysqli_query($conn, $sql);
    if($result){
        $_POST["firstname"] = "";
        $_POST["lastname"] = "";
        $_POST["middlename"] = "";
        $_POST["username"] = "";
        $_POST["email"] = "";
        $_POST["password"] = "";
        $_POST["confirmpassword"] = "";
        echo '<script>alert("Admin Registration Successful")</script>';
    }else{
        echo '<script>alert("Admin Registration Failed")</script>';
    }
}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="post" action="">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" 
                                             name="firstname"  placeholder="First Name" value="<?php echo $_POST["firstname"]; ?>" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" 
                                            name="lastname"  placeholder="Last Name" value="<?php echo $_POST["lastname"]; ?>" required>
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                            name="middlename"  placeholder="Middle Name" value="<?php echo $_POST["middlename"]; ?>" required> 
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" 
                                            name="username"  placeholder="Username" value="<?php echo $_POST["username"]; ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                            
                                    <div class="col-sm-12">
                                        <input type="email" class="form-control form-control-user" 
                                            name="email"  placeholder="Email Address" value="<?php echo $_POST["email"]; ?>" required >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                      <input type="password" class="form-control form-control-user"
                                              name="password"  placeholder="Password" value="<?php echo $_POST["password"]; ?>" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                             name="confirmpassword"   placeholder="Repeat Password" value="<?php echo $_POST["confirmpassword"]; ?>" required>
                                             
                                    </div>
                                </div>
                                	<button type="submit" name="submit"   class="btn btn-primary btn-user btn-block">Add New User</button> 
                                    <a href="index.php"  class="btn btn-google btn-user btn-block">Log-In</a> 
                                    
                                <hr>
                              
                            </form>
                            <hr>
                            <div class="text-center">
                                <h6>Barangay</h6>
                            </div>
                            <div class="text-center">
                                <h6>Resident Information Management System</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <script src="app.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
   

  
</body>

</html>