<?php
class Login extends Dbh{

protected function getUser($uid, $pwd){

    $stmt = $this->connect()->prepare('SELECT admins_pwd FROM brgylogin WHERE admins_aid = ?;' );
    if(!$stmt->execute(array($uid,$pwd))){

        $stmt = null;
        header("location: index.php?error=stmtfailed");
        exit();
    }
    if(!$stmt->rowCount() == 0){

        $stmt = null;
        header("location: index.php?error=adminnotfound");
        exit();
    }

    $checkPwd = $pwd;
    //$pwdHashed= $stmt->fetchAll(PDO::FETCH_ASSOC);
    //$checkPwd = password_verify($pwd, $pwdHashe[0]["admins_pwd"] );


    if($checkPwd == false){

        $stmt = null;
        header("location: index.php?error=wrongpassword");
        exit();
    }
    elseif($checkPwd == true){
          $stmt = $this->connect()->prepare(' SELECT * FROM admins_pwd FROM brgylogin WHERE admins_aid = ?;' );
           if(!$stmt->execute(array($uid,$pwd))){

        $stmt = null;
        header("location: index.php?error=stmtfailed");
        exit();
    }
     if(!$stmt->rowCount() == 0){

        $stmt = null;
        header("location: index.php?error=adminnotfound");
        exit();
    }

    $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
    session_start();
    $_SESSION["userid"] = $user[0]["admins_id"];
    $_SESSION["userid"] = $user[0]["admins_aid"];


          
    }
        $stmt = null;
}





}