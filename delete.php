<?php
require_once "config.php";
$id = (int)$_GET['id'];

$update = $db->prepare("DELETE FROM residents WHERE ID = :id");
$update->bindParam(':id', $id);
$update->execute();
if($update->execute()){
    // Records deleted successfully. Redirect to landing page
    header("location: residentinfo.php");
    exit();
} else{
    echo "Oops! Something went wrong. Please try again later.";
}

?>