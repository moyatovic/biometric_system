<?php
session_start();
  require('../db/dbconn.php');

  $username =  $password = "";

  $sql = "SELECT * FROM admin";

  
  if ($result = $conn->query($sql)) {
    while ($row = $result->fetch_assoc()) {
    $username = $row['username'];
    $password = $row['password'];
  }
}
  
  if(isset($_POST['submit'])){
    //check that data is being sent across pages
    if(!empty($_POST['username'] && !empty($_POST['password']))){
      //verify that the username and password tally with that in the database
      if($username = $_POST['username'] && $username = $_POST['password']){
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['password'];
          header("Location: dashboard.html");
          
      }
      else{
      $error = "Incorrect username or Password";
      header("Location: ?$error")
    }
    }
    
   
}