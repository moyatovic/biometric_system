<?php
 // connection to database file
        require('../db/dbconn.php');
       

    //  fetch json data sent from angular
      $data = json_decode(file_get_contents("php://input"), TRUE);    
      $user = mysqli_real_escape_string($conn, md5($data['pin']));
       

      //sql statement to pull username and password from employee table
        $sel_query = "SELECT id, pin FROM employee where pin = ?";
        if($stmt = $conn->prepare($sel_query)){
          $stmt->bind_param('i',$user);
          $stmt->execute();
        
         $result = $stmt->get_result();
          if($result->num_rows >0 ){
         echo "No of records : ".$result->num_rows."<br>";
         $row=$result->fetch_object();
       
         header('Location: employee_clock.php?id='.$row->id);
        } else{ 
          echo "{
          \"success\": false, \"message\": Incorrect username or Password
        }";
        header( "HTTP/1.1 401 invalid credentials" );
          exit;
             }    
      }
      else {
        header("HTTP/1.1 404 page not found");
      }
             
      ?>