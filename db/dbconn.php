<?php

header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT');

header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");


$servername = "localhost";
$username= "root";
$password ="";
$dbname = "biometric_system";
$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
  die("connection failed: ".$conn->connect_error);
}
echo "connected successfully";
?>