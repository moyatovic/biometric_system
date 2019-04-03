<?php
session_start();
header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT');

header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
header("Content-Type: application/json; charset=UTF-8");


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


        
      //verify that the username and password tally with that in the database
      if($username == $user && $password == $pass){  
        
          $_SESSION['name'] = $user;
         echo  json_encode($_SESSION['name']);
            http_response_code(200);           

          echo "{\"success\": true, \"message\": signed in}";
        exit;
          
      
     
      }
      else
      { 
                
        echo "{
          \"success\": false, \"message\": Incorrect username or Password
        }";
        if($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
          header( "HTTP/1.1 400 BAD REQUEST" );

          exit;
                }
              }
      ?>