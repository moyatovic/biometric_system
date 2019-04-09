<?php
 // connection to database file
        require('../db/dbconn.php');


        session_start();

     

      //sql statement to pull username and password from employee table
        $query = "SELECT id, pin FROM employee"; 
        if ($result = $conn->query($query)) {
          while ($row = $result->fetch_assoc()) {
          $pin = $row['pin'];
          $user_id = $row['id'];
        }
      }
        //  fetch json data sent from angular
      $data = json_decode(file_get_contents("php://input"), TRUE);
      $user = $data['pin'];
     

       //verify that the username and password tally with that in the database
      if($pin == $user){     
        $session['user_id'] = $user_id;
        header('Location: employee_clock.php') ;             
      }
      else{ 
          echo "{
          \"success\": false, \"message\": Incorrect username or Password
        }";
        header( "HTTP/1.1 401 invalid credentials" );
          exit;
                
              }
      ?>