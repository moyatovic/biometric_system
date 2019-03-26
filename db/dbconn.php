<?php

header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT');

header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");


$servername = "localhost";
$username= "root";
$password ="";
$dbname = "biometric_system";
$conn =  mysqli_connect($servername, $username, $password, $dbname);
if($conn === false){
  die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>