<?php
session_start();
header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT');

header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
      // connection to database file
        require('../db/dbconn.php');


      //sql statement to pull username and password from admin table
        $query = "SELECT * FROM admins"; 
        if ($result = $conn->query($query)) {
          while ($row = $result->fetch_assoc()) {
          $username = $row['username'];
          $password = $row['password'];
        }
      }
        //  fetch json data sent from angular
      $data = json_decode(file_get_contents("php://input"), TRUE);
      $user = $data['username'];
      $pass = $data['password'];


        echo $user;
        echo $username;
     
      //verify that the username and password tally with that in the database
      if($username != $user && $password != $pass){             
        echo "{
          \"success\": false, \"message\": Incorrect username or Password
        }";
          
      
     
      }
      else
      { 
      echo "{\"success\": true, \"message\": signed in}";
        }
      
      ?>