<?php

class Signup extends Dbh  {
  protected function setUser($uid, $email, $pwd, $firstName, $middleName, $lastName){
        $stmt = $this->connect()->prepare('INSERT INTO users (users_uid, users_pwd,users_email, users_firstname, users_lastname, users_middlename) VALUE(?, ?, ?,?,?,?);');
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

        if($stmt->execute(array($uid, $email, $hashedPwd, $firstName, $middleName, $lastName))){
            $stmt = null;
            header("location: ../register.php?error=stmtfailed");
            exit();

        }
       $stmt = null;

    }
    protected function checkUser($uid, $email){
        $stmt = $this->connect()->prepare('SELECT users_uid FROM users WHERE users_uid = ? OR users_email = ?;');
        if($stmt->execute(array($uid, $email))){
            $stmt = null;
            header("location: ../register.php?error=stmtfailed");
            exit();

        }
        $resultCheck;
        if($stmt->rowCount() > 0){
            $resultCheck = false;
        }
        else{
            $resultCheck = false;
        }
        return $resultCheck;

    }
    



}