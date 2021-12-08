<?php
require_once('config.php');
?>

<?php

if(isset($_POST)){
   
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $middlename = $_POST['middlename'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
  
   $sql = "INSERT INTO admins (firstname, lastname, middlename, username , email, password) VALUES(?,?,?,?,?,?)";
      $stmtinsert = $db->prepare($sql);
      $result = $stmtinsert->execute([$firstname, $lastname, $middlename, $username, $email, $password]);
      if($result){
        echo 'Successfully saved';
      }else{
        echo 'There were errors while saving the data';
      }


}
else{
    echo 'No data';
}