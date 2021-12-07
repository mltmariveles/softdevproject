<?php

class SignupContr extends Signup {

private $uid;
private $pwd;
private $pwdRepeat;
private $lastName;
private $middleName;
private $firstName;
private $email;

public function __construct($uid, $pwd, $pwdRepeat, $lastName, $middleName, $firstName, $email ){
    $this->uid = $uid;
    $this->pwd = $pwd;
    $this->pwdRepeat = $pwdRepeat;
    $this->lastName = $lastName;
    $this->middleName = $middleName;
    $this->firstName = $firstName;
    $this->email = $email;


}
public function signupUser(){
if($this->emptyInput()==false){
    header("location: ../signup.php?error=emptyinput");
    exit();
}
if($this->invalidUid()==false){
    header("location: ../signup.php?error=invalidID");
    exit();
}
if($this->invalidEmail()==false){
    header("location: ../signup.php?error=invalidEmail");
    exit();
}

if($this->uidTakenCheck()==false){
    header("location: ../signup.php?error=usernameemailtaken");
    exit();
}
if($this->pwdMatch()==false){
    header("location: ../signup.php?error=passwordmatch");
    exit();
}

$this ->setUser($this->uid,  $this->pwd,  $this->email, $this->firstName, $this->LastName, $this->middleName );
}

private function emptyInput(){
$result;
if(empty($this->uid) || empty($this->pwd) || empty($this->pwdRepeat) || empty($this->lastName) || empty($this->middleName) || empty($this->firstName) || empty($this->email) ){
$result = false;
}
else{
    $result = true;
}
return $result;
}


private function invalidUid(){
$result;
if(!preg_match("/^[a-zA-Z0-9]*$/", $this->uid))
{
    $result = false;
}
else{
    $result = true;
}
return $result;
}


private function invalidEmail(){
$result;
if(!filter_var($this->email, FILTER_VALIDATE_EMAIL))
{
    $result = false;
}
else{
    $result = true;
}
return $result;
}

private function pwdMatch(){
$result;
if($this->pwd !== $this->pwdRepeat)
{
    $result = false;
}
else{
    $result = true;
}
return $result;
}

private function uidTakenCheck(){
$result;
if(!$this->checkUser( $this->uid, $this->email))
{
    $result = false;
}
else{
    $result = true;
}
return $result;
}




}