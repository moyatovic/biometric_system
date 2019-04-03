<?php
function cors() {

   // Allow from any origin
   if (isset($_SERVER['HTTP_ORIGIN'])) {
       // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
       // you want to allow, and if so:
       header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
       header('Access-Control-Allow-Credentials: true');
       header('Access-Control-Max-Age: 86400');    // cache for 1 day
   }

   // Access-Control headers are received during OPTIONS requests
   if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

       if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
           // may also be using PUT, PATCH, HEAD etc
           header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

       if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
           header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

       exit(0);
   }
}

cors();
session_start();

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
          header( "HTTP/1.1 200 OK" );
          echo "{\"success\": true, \"message\": signed in}";
        exit;     
      }
      else{ 
          echo "{
          \"success\": false, \"message\": Incorrect username or Password
        }";
      http_response_code(401);
          exit;
                
              }
      ?>