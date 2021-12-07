<?php

if(isset($_POST["submit"])){

    $uid=$_POST["uid"];
    $pwd=$_POST["pwd"];
    $pwdRepeat=$_POST["pwdRepeat"];
    $lastName=$_POST["lastName"];
    $middleName=$_POST["middleName"]; 
    $firstName=$_POST["firstName"];
    $email=$_POST["email"];

    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";
    $signup = new SignupContr($uid, $pwd, $pwdRepeat, $lastName, $middleName,$firstName, $email );


    $signup->signupUser();

    header("location: ../index.php?error=none");
    





}