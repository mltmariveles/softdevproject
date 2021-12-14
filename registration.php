<?php
require_once('config.php');


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
                            <form class="user" method="post" action="registration.php">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" 
                                             name="firstname" id="firstname" placeholder="First Name" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" 
                                            name="lastname" id="lastname" placeholder="Last Name" required>
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                            name="middlename" id="middlename" placeholder="Middle Name" required> 
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" 
                                            name="username" id="username" placeholder="Username" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                            
                                    <div class="col-sm-12">
                                        <input type="email" class="form-control form-control-user" 
                                            name="email" id="email" placeholder="Email Address"required >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                      <input type="password" class="form-control form-control-user"
                                              name="password" id="password" placeholder="Password" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                             name="confirm_password" id="confirm_password"  placeholder="Repeat Password" required>
                                             <h6 style="font-weight: bold; padding-left: 2.5em; padding-top: 1em" id='message'></h6>
                                    </div>
                                </div>
                                	<button type="submit" name="submit" id="submit"  class="btn btn-primary btn-user btn-block">Add New User</button> 
                                    <a href="rename_index.php"  class="btn btn-google btn-user btn-block">Log-In</a> 
                                    
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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script>

  $('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('Password Matching!').css('color', 'green');
  } else 
    $('#message').html('Password Not Matching!').css('color', 'red');
});

        $(function(){
              $('#submit').click(function(e){

            var valid = this.form.checkValidity();
            if(valid){
            var firstname = $('#firstname').val();
            var lastname = $('#lastname').val();
            var middlename = $('#middlename').val();
            var username = $('#username').val();
            var email = $('#email').val();
            var password = $('#password').val();
            
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'process.php',
                    data: { firstname: firstname, lastname: lastname, middlename: middlename, username: username, email: email, 
                         password: password},
                        success: function(data){
                             Swal.fire({
        'title': 'Succesful',
        'text': data,
        'type' : 'success'
    })

                        },
                        error: function(data){
                             Swal.fire({
        'title': 'error',
        'text': 'there were errors while saving the data',
        'type' : 'error'
    })

                        }
                });
                
           
            }else{
            
            }
   
    });
   
    });
    </script>
</body>

</html>