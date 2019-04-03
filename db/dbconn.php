<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header('P3P: CP="CAO PSA OUR"'); // Makes IE to support cookies
header("Content-Type: application/json; charset=utf-8");


$servername = "localhost";
$username= "root";
$password ="";
$dbname = "biometric_system";
$conn =  mysqli_connect($servername, $username, $password, $dbname);
if($conn === false){
  die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>