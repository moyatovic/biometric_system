<?php
  require('../db/dbconn.php'); 
  session_start();

// fetching encoded json data from angular
  $data = json_decode(file_get_contents("php://input"), TRUE);
  $firstname = mysqli_real_escape_string($conn, trim($data['firstname']));
  $lastname = mysqli_real_escape_string($conn, trim($data['lastname']));
  $middlename = mysqli_real_escape_string($conn, trim($data ['middlename']));
  $dob = date('Y-m-d', strtotime($data['dob']));
  $gender = mysqli_real_escape_string($conn, trim($data['gender']));
  $marital = mysqli_real_escape_string($conn, trim($data['marital']));
  $address = mysqli_real_escape_string($conn, trim($data['address']));
  $phone = "+234".mysqli_real_escape_string($conn, trim($data['phone']));
  $joinedDate = date('Y-m-d', strtotime($data['joinedDate']));
  $department  = mysqli_real_escape_string($conn, trim($data['department']));
  $employmentType = mysqli_real_escape_string($conn, trim($data['employmentType']));
  $pin = mysqli_real_escape_string($conn, trim($data['pin']));
      
        $query = "INSERT INTO employee VALUE (null, '$firstname', '$lastname', '$middlename',' $dob',' $gender','$marital', '$address', '$phone', '$joinedDate', '$department', ' $employmentType', 'pin')" ;
                
           if (mysqli_query($conn, $query)) {                  
                  echo "New record created successfully";mysqli_close($conn);
            } else {
                  echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
                
            
              


?>