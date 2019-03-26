<?php
session_start();





// connection to database file
  require('../db/dbconn.php');

 
//sql statement to pull username and password from admin table
  $sql = "SELECT * FROM admin"; 
  if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
    $username = $row['username'];
    $password = $row['password'];
  }
}
  //fetch json data sent from angular
$data = json_decode(file_get_contents("php://input"), TRUE);
$user = $data['username'];
$pass = $data['password'];


      //verify that the username and password tally with that in the database
      if($username = $user && $password = $pass){
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        echo "it works"
         // header("Location: ../dashboard/dashboard.php");
          
      }
      else{
      $error = "Incorrect username or Password";
     // header("Location: ?$error");
    }

   