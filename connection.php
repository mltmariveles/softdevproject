<?php
define('DB_SERVER', '127.0.0.1:8888');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'h6HGDZsrQLJC');
define('DB_NAME', 'finals');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>